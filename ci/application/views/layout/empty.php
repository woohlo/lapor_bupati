<?php 
$is_empty_title = 'Kosong';
$is_empty_text = 'Belum ada data tersedia.';

if(isset($is_title) && !empty($is_title)){
  $is_empty_title = $is_title;
}
if(isset($is_text) && !empty($is_text)){
  $is_empty_text = $is_text;
}
$is_empty_text = $is_empty_text . ' (mungkin karena data belum tersedia, sesi login kadaluarsa atau Anda perlu login ulang)';

?>

<div class="container p-0">
	<div class="text-center">
		<div class="box-image mb-2">
			<img
			class="md"
			src="assets/images/empty.png"
			/>
		</div>
		<h3 class="text-dark"><?php echo $is_empty_title;?></h3>
		<p class="text-secondary fs-16px"><?php echo $is_empty_text;?></p>
	</div>
</div>