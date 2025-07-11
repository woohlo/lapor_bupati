<section class="page-wrapper shadow border bg-light">
	<div class="page-app">
		<div
		class="header-app d-flex align-items-center justify-content-between py-1 px-3"
		>
		<div class="box-image">
			<a class="btn" href="<?php echo base_url('/');?>"
				><img
				class="xs"
				src="<?php echo base_url('/assets/images/logo.png');?>"
				/></a>
			</div>
			<div
			class="header-app-title text-dark fw-800 ls-sm fs-20px"
			>
			Riwayat
		</div>
		<div
		class="header-app-action d-inline-flex align-items-center"
		>
		<a class="btn fs-22px" href="#"
		><i class="icon bi bi-search"></i
		></a>
		<a
		class="btn fs-22px"
		id="clearHistory"
		href="javascript:void(0)"
		><i class="icon bi bi-trash"></i
		></a>
	</div>
</div>
<div class="content mb-5 mt-4 has-header has-menu">
	<div class="col-11 m-auto">

		<?php
		if (!isset($data['reports']) || empty($data['reports'])){ 
			$this->load->view('./layout/empty', ['is_text' => 'Belum ada data riwayat laporan']);
		} else {
			?>
			<div class="row">
				<?php 
				foreach ($data['reports'] as $report) 
				{
					?>
					<a href="<?php echo base_url('/report-detail/' . $report['idreport']);?>">
						<div class="card bg-lighter rounded-md border-0 mb-3">
							<div class="card-body d-flex justify-content-between align-items-center">
								<div>
									<div class="history-title ellipsis-single fw-600 fs-14px mb-1">
										<?php echo (!empty($report['title'])) ? $report['title'] : 'Tanpa Judul';?>
									</div>
									<div class="text-muted fs-12px">
										<?php echo date('d M Y', strtotime($report['reportcreate'])) . '-' . date('H:i', strtotime($report['reportcreate'])) . 'WIB';?>
									</div>
								</div>
								<i class="bi bi-chevron-right fs-5 text-muted"></i>
							</div>
						</div>
					</a>
					<?php
				}
				?>
			</div>
			<?php
		} 
		?>
	</div>
</div>

<?php $this->load->view('./layout/menu', ['is_menu' => 'history']);?>
</div>
</section>