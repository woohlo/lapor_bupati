<?php
$menuActived = 'home';
if(isset($is_menu) && !empty($is_menu)){
  $menuActived = $is_menu;
}

$menus = [
  [
    'code' => 'home',
    'label' => 'Lapor',
    'link' => '/',
    'icon' => 'chat-dots',
    'actived' => $menuActived == 'home'
  ],
  [
    'code' => 'instantion',
    'label' => 'Instansi',
    'link' => '/instantion',
    'icon' => 'grid',
    'actived' => $menuActived == 'instantion'
  ],
  [
    'code' => 'history',
    'label' => 'Riwayat',
    'link' => '/history',
    'icon' => 'clock',
    'actived' => $menuActived == 'history'
  ],
  [
    'code' => 'account',
    'label' => 'Akun',
    'link' => '/account',
    'icon' => 'person',
    'actived' => $menuActived == 'account'
  ]
];
?>
<div
class="menu-app d-flex align-items-center justify-content-between py-1 px-5 border-top shadow-top"
>
<?php
foreach ($menus as $mn => $menu) {
 ?>
 <a href="<?php echo base_url('/');?>" class="btn btn-md <?php echo ($menu['actived']) ? 'text-app' : 'text-gray';?> fs-24px lh-normal"
  ><i class="icon bi bi-<?php echo ($menu['actived']) ? $menu['icon'] . '-fill' : $menu['icon'];?>"></i>
  <span class="d-block fs-12px <?php echo ($menu['actived']) ? 'text-app' : 'text-gray';?> fw-600"><?php echo $menu['label'];?></span>
</a>
<?php
}
?>
</div>