<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiLibrary
{
    protected $CI;
    protected $base_url = 'http://apilapor.nettacode.com';
    protected $headers;
    protected $token;

    public function __construct($config = [])
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');

        if ($this->CI->session->userdata('token')) {
            $this->token = $this->CI->session->userdata('token');
        }

        // Konfigurasi default
        $this->base_url = isset($config['base_url']) ? rtrim($config['base_url'], '/') : $this->base_url;
        $this->headers  = isset($config['headers']) ? $config['headers'] : [
            'Content-Type: application/json',
            'Accept: application/json'
        ];
    }

    public function setBaseUrl($url)
    {
        $this->base_url = rtrim($url, '/');
    }

    public function setHeaders($headers = [])
    {
        $this->headers = $headers;
    }

    public function setToken($token)
    {
        $this->token = trim($token);
    }

    public function get($endpoint, $params = [])
    {
        $url = $this->buildUrl($endpoint, $params);
        return $this->request('GET', $url);
    }

    public function post($endpoint, $data = [], $asFormData = true)
    {
        $data['token'] = $this->token;
        $url = $this->buildUrl($endpoint);

        if ($asFormData) {
            $headers = ['Content-Type: application/x-www-form-urlencoded'];
            return $this->request('POST', $url, http_build_query($data), $headers);
        }

        return $this->request('POST', $url, json_encode($data));
    }

    public function put($endpoint, $data = [])
    {
        $url = $this->buildUrl($endpoint);
        return $this->request('PUT', $url, json_encode($data));
    }

    public function delete($endpoint, $data = [])
    {
        $url = $this->buildUrl($endpoint);
        return $this->request('DELETE', $url, json_encode($data));
    }

    protected function buildUrl($endpoint, $params = [])
    {
        $url = $this->base_url . '/' . ltrim($endpoint, '/');
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        return $url;
    }

    protected function request($method, $url, $body = null, $customHeaders = null)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        $headers = $customHeaders ?? $this->headers;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($method !== 'GET' && !empty($body)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($error) {
            return [
                'success' => false,
                'status'   => 'error',
                'message' => 'Gagal memproses permintaan.',
                'data' => null,
            ];
        }

        $data = json_decode($response, true);
        if(is_array($data) && !empty($data)){
            if(isset($data['status']) && !$data['status']){
                return [
                    'success' => false,
                    'status'   => $data['status'],
                    'message' => (isset($data['message'])) ? $data['message'] : 'Gagal memproses permintaan.',
                    'data' => null,
                ];
            }
        }

        return [
            'success' => true,
            'status'  => $httpcode,
            'message' => 'Berhasil memproses permintaan',
            'data'    => json_decode($response, true)
        ];
    }

}
