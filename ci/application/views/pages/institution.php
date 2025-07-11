<section class="page-wrapper shadow border bg-light">
	<div class="page-app">
		<div
		class="header-app d-flex align-items-center justify-content-start py-1 px-3"
		>
		<div class="box-image">
			<a class="btn" href="<?php echo base_url('/');?>"
				><img
				class="xs"
				src="assets/images/logo.png"
				/></a>
			</div>
			<div
			class="header-app-title text-center w-75 text-dark fw-800 ls-sm fs-20px"
			>
			Pilih Instansi
		</div>
	</div>
	<div class="content mb-5 mt-4 has-header">
		<div class="col-11 m-auto">

			<?php
			if (!isset($data['institutions']) || empty($data['institutions'])){ 
				$this->load->view('./layout/empty', ['is_text' => 'Belum ada data instansi']);
			} else {
				?>
				<div class="row">
					<?php 
					foreach ($data['institutions'] as $instansi) 
					{
						?>
						<div class="col-3 mb-3">
							<a href="<?php echo base_url('/report/' . $instansi['idcategory'] . '?title=' . $instansi['category']);?>" class="btn btn-lg w-100 h-100 bg-lighter rounded-md lh-normal">
								<div class="box-image mb-1">
									<img class="sm" src="<?php echo (!empty($instansi['imgcat'])) ? $instansi['imgcat'] : 'assets/images/institution.png';?>"/>
								</div>
								<div class="fs-13px text-dark fw-600"><?php echo $instansi['category'];?></div>
							</a>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			} 
			?>
		</div>
	</div>

	<?php $this->load->view('./layout/menu', ['is_menu' => 'institution']);?>

</div>
</section>