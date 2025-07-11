<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiceLibrary {

	protected $CI;

	public function __construct()
    {
        $this->CI =& get_instance();
    }

	/*
        *helper_respone
    */

    public function resSuccess($message = 'Berhasil memproses permintaan.', $data = [], $code = 200)
    {
        return $this->setRespond([
            'success' => true,
            'type'    => 'success',
            'message' => $message,
            'data'    => $data
        ], $code);
    }

    public function resError($message = 'Gagal memproses permintaan.', $data = [], $code = 400)
    {
        return $this->setRespond([
            'success' => false,
            'type'    => 'error',
            'message' => $message,
            'data'    => $data
        ], $code);
    }

    protected function setRespond($response, $code = 200)
    {
        return $this->CI->output
            ->set_status_header($code)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    /*
        *helper_validation
    */

    public function isExistData($value)
    {
        if(!is_array($value)){
            $value = trim($value);
        }

        return ($value && !empty($value) && !is_null($value)) ? true : false;
    }
    public function isExist($value)
    {
        if(!is_array($value)){
            $value = trim($value);
        }
        
        return ($value && !empty($value) && !is_null($value)) ? true : false;
    }
    public function existStrLen($value)
    {
        $value = trim($value);
        return (strlen($value) > 0) ? true : false;
    }

    public function isString($value) {
        $value = trim($value);
        return is_string($value);
    }

    public function isInteger($value) {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public function isBoolean($value) {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== null;
    }

    public function isEmail($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isUrl($value) {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    public function isDate($value, $format = 'Y-m-d') {
        $date = \DateTime::createFromFormat($format, $value);
        return $date && $date->format($format) === $value;
    }

    public function isArray($value) {
        return is_array($value);
    }

    public function isJson($value) {
        json_decode($value);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function isNumeric($value) {
        return is_numeric($value);
    }

    public function isAlphaNumeric($value) {
        return ctype_alnum($value);
    }

    public function isSlug($value) {
        return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value);
    }

    public function isUsername($value) {
        return preg_match('/^[a-zA-Z0-9_]{5,20}$/', $value);
    }

    public function isName($value)
    {
        $value = trim($value);
        return preg_match('/^[a-zA-Z\s]+$/', $value);
    }

    public function isNames($value)
    {
        $value = trim($value);
        return preg_match('/^[a-zA-Z0-9\s\(\)_\-\&\.,\'"]+$/', $value);
    }

    public function isPhone($value) {
        return preg_match('/^[0-9]{10,14}$/', $value);
    }

    public function isStatus($value) {
        return in_array($value, [0, 1]);
    }

    public function isNik($value) {
        return preg_match('/^[0-9]{16}$/', $value);
    }

    public function isPassword($value) {
        $trimmedPassword = trim($value);
        if (empty($trimmedPassword)) {
            return ['success'=>false,'msg'=>"The password cannot be empty or contain only spaces."];
        }

        if (strlen($trimmedPassword) < 5) {
            return ['success'=>false, 'msg'=>"The password must have a minimum of 5 characters."];
        }

        if (!preg_match('/[A-Za-z0-9]{5,}/', $trimmedPassword)) {
            return ['success'=>false, 'msg'=>"The password must contain a minimum of 5 letters or numbers."];
        }

        return ['success'=>true, 'msg'=>"Password valid"]; 
    }

    public function formatPhoneStandart($nomor) {
        $nomor = preg_replace('/[^0-9+]/', '', $nomor);

        if (substr($nomor, 0, 1) == '0') {
            $nomor = '62' . substr($nomor, 1);
        } elseif (substr($nomor, 0, 1) == '+') {
            $nomor = '62' . substr($nomor, 1);
        } elseif (substr($nomor, 0, 2) != '62' && strlen($nomor) > 2) {
            $nomor = '62' . $nomor;
        }

        return $nomor;
    }

    public function formatPhone($nomor)
    {
        $nomor = preg_replace('/[^0-9+]/', '', $nomor);

        $kode_negara = [
            '62', // Indonesia
            '60', // Malaysia
            '65', // Singapore
            '66', // Thailand
            '63', // Philippines
            '84', // Vietnam
            '673', // Brunei
            '95', // Myanmar
            '856', // Laos
        ];

        // Jika dimulai dari +, hapus + saja
        if (substr($nomor, 0, 1) == '+') {
            $nomor = substr($nomor, 1);
        }

        // Jika dimulai dari 0, asumsikan Indonesia
        if (substr($nomor, 0, 1) == '0') {
            $nomor = '62' . substr($nomor, 1);
        }

        // Cek apakah sudah pakai kode negara yang valid
        $isValidPrefix = false;
        foreach ($kode_negara as $kode) {
            if (substr($nomor, 0, strlen($kode)) == $kode) {
                $isValidPrefix = true;
                break;
            }
        }

        // Jika belum pakai kode negara, anggap Indonesia
        if (!$isValidPrefix) {
            $nomor = '62' . ltrim($nomor, '0');
        }

        return $nomor;
    }

    public function isGender($gender, $is_char = true)
    {
        $gender = strtolower(trim($gender));
        if(in_array($gender, ['laki-laki','male','m','l','1'])){
            return $is_char ? 'm' : 1;
        }else if(in_array($gender, ['perempuan','female','f','p','0'])){
            return $is_char ? 'f' : 0;
        }
        return null;
    }

    public function isExistString($string) {
        $trimmedString = trim($string);
        
        if (empty($trimmedString)) {
            return false;
        }
        
        if (strlen($trimmedString) < 3) {
            return false;
        }

        if (!preg_match('/[a-zA-Z0-9]/', $trimmedString)) {
            return false;
        }
        
        return true;
    }

    public function isMessage($string) {
        $trimmedString = trim($string);
        
        if (empty($trimmedString)) {
            return false;
        }
        
        if (strlen($trimmedString) < 20) {
            return false;
        }

        if (!preg_match('/[a-zA-Z0-9]/', $trimmedString)) {
            return false;
        }
        
        return true;
    }

    public function isAge($age) {
        if (is_numeric($age) && $age >= 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isYear($year) {
        return is_numeric($year) && $year >= 1000 && $year <= 9999;
    }

    public function isValidate($value, $pattern) {
        return preg_match($pattern, $value);
    }


    /*
        *helper_generate
    */

    public function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    public function generateSecret($length = 32) {
        if (function_exists('random_bytes')) {
            return bin2hex(random_bytes($length));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            return bin2hex(openssl_random_pseudo_bytes($length));
        } else {
            throw new Exception('No secure random byte generator available.');
        }
    }

    public function createSlug($string){
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace('/[^A-Za-z0-9-]+/', ' ', $string);

        $string = strtolower($string);
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/-+/', '-', $string);
        $string = trim($string, '-');
        $string = substr($string, 0, 50);
        return $string;
    }

    public function generateCode($id, $space = ''){
        $timestamp = time();
        $code = $id . $space . $timestamp;
        return $code;
    }

    public function generateDigit($digit = 1){
        $min = pow(10, $digit - 1);
        $max = pow(10, $digit) - 1;
        return rand($min, $max);
    }

    public function generateTimeCodeV1(){
        $microtime = microtime(true);
        $formattedTime = date('YmdHis', $microtime);
        $code = substr($formattedTime, 0, 15);

        return $code;
    }

    public function generateTimeCode()
    {
        $now = microtime(true);
        $timePart = date('YmdHis', (int)$now);
        $micro = (int)(($now - floor($now)) * 10000);
        $rand = random_int(100, 999);
        return $timePart . str_pad($micro, 4, '0', STR_PAD_LEFT) . $rand;
    }

    public function newlineToEol($string) {
        $normalizedString = preg_replace('/\r\n|\r|\n/', PHP_EOL, $string);
        return $normalizedString;
    }

    public function dobToAge($dob) {
        $timestampDob = strtotime($dob);
        $timestampToday = time();
        $age = date('Y', $timestampToday) - date('Y', $timestampDob);
        if (date('md', $timestampToday) < date('md', $timestampDob)) {
            $age--;
        }
        
        return $age;
    }

    public function betweenNumber($value, $min, $max) {
        return is_numeric($value) && $value >= $min && $value <= $max;
    }


    /*
        *helper_data
    */

    public function isStatusData($value) {
        return in_array($value, ['active', 'draft', 'pending', 'process', 'done','cancel','return','approved']);
    }

    public function isStatusInvoice($value) {
        return in_array($value, ['active', 'draft', 'pending', 'process', 'done','cancel','return','approved']);
    }

    public function isDiscountType($value) {
        return in_array($value, ['percent', 'value']);
    }

    public function isDiscountMethod($value) {
        return in_array($value, ['item', 'order', 'level']);
    }

    public function isCommissionType($value) {
        return in_array($value, ['percent', 'value']);
    }

    public function isCommissionMethod($value) {
        return in_array($value, ['item', 'order', 'level']);
    }

    public function isSkillLevel($value) {
        return in_array($value, ['low', 'middle', 'high', 'professional']);
    }

    public function isPeriodType($value) {
        return in_array($value, ['day', 'week', 'month', 'year']);
    }

    public function isPaymentType($value) {
        return in_array($value, ['cash', 'credit']);
    }

    public function generateCodeData($title) {
        $title = trim($title);
        if (strlen($title) <= 5) {
            return strtoupper($title);
        }

        $words = explode(' ', $title);
        $code = '';
        foreach ($words as $word) {
            $code .= strtoupper($word[0]);
        }

        return $code;
    }

    public function getIndexByKey($value, $array, $key) {
        $keys = array_column($array, $key);
        $index = array_search($value, $keys);
        return ($index !== false) ? $index : -1;
    }

    public function sortArrayByColumn(&$array, $column, $order = 'ASC') {
        $order = strtoupper($order);
        usort($array, function ($a, $b) use ($column, $order) {
            if (!isset($a[$column]) || !isset($b[$column])) {
                return 0;
            }

            if ($order === 'ASC') {
                return strcmp($a[$column], $b[$column]);
            } elseif ($order === 'DESC') {
                return strcmp($b[$column], $a[$column]);
            }

            return 0;
        });
    }

    public function getDatesOnMonth($year, $month) {
        $daysInMonth = date('t', strtotime("$year-$month-01"));
        $dates = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $dates[] = sprintf('%04d-%02d-%02d', $year, $month, $day);
        }
        return $dates;
    }

    public function getDaysCurrentMonth() {
        $daysInMonth = date('t');
        return range(1, $daysInMonth);
    }

    public function getMonthsOfYear($year) {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[] = sprintf('%04d-%02d-%02d', $year, $i, 1);
        }
        return $months;
    }

    public function checkMaxString($string, $maxLength = 255) {
        return isset($string) && is_string($string) && strlen(trim($string)) <= $maxLength;
    }

//=========== ENDLINE ===============//
}