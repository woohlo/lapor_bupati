<section class="page-wrapper shadow border bg-light">
	<div class="page-app">
		<div
		class="header-app d-flex align-items-start justify-content-between py-1 px-3"
		>
		<a class="btn fs-22px" href="<?php echo base_url('/');?>"
		><i class="icon bi bi-arrow-left"></i
		></a>
	</div>
	<div class="content mt-3 has-header">
		<div class="col-10 m-auto">
			<div class="container p-0">
				<h3 class="text-dark fw-700">Daftar Akun</h3>
				<p class="mt-3">
					Masukkan email dan password baru untuk membuat akun
				</p>
			</div>
			<div class="container mt-4 p-0">
				<form id="formRegister">
					<div class="form-group mb-3">
						<label class="form-label text-dark fw-600 fs-14px"
						>Alamat Email</label
						>
						<div class="input-group bg-lighter rounded-lg">
							<input
							type="email"
							required
							placeholder="johndoe@gmail.com"
							class="form-control form-control-lg"
							/>
							<div class="input-group-append">
								<span
								class="input-group-text bg-transparent border-0 text-secondary"
								><i class="icon bi bi-envelope-fill"></i
								></span>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<label class="form-label text-dark fw-600 fs-14px"
						>Password</label
						>
						<div class="input-group bg-lighter rounded-lg">
							<input
							type="password"
							required
							placeholder="Masukkan password"
							class="form-control form-control-lg"
							/>
							<div class="input-group-append">
								<span
								class="input-group-text bg-transparent border-0 text-secondary"
								><i class="icon bi bi-eye-slash-fill"></i
								></span>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<div class="form-check">
							<input
							class="form-check-input"
							type="checkbox"
							value=""
							id="aggreementCheck"
							/>
							<label
							class="form-check-label text-dark fw-600 fs-14px"
							for="aggreementCheck"
							>
							Saya tekah menyetujui
							<a href="#" class="text-app">Syarat dan Ketentuan</a>
							&
							<a href="#" class="text-app">Kebijakan Privasi</a>
							Lapor Bupati Kuburaya
						</label>
					</div>
				</div>
				<div class="form-group mb-3 mt-5">
					<div class="text-center">
						<p class="fs-14px text-secondary">
							Sudah punya akun?
							<a href="<?php echo base_url('/login');?>" class="text-app fw-600 fs-14px"
							>Masuk</a
							>
						</p>
					</div>
					<div class="mt-5">
						<button
						type="submit"
						class="btn btn-lg bg-app ls-sm fw-bold text-white w-100 text-uppercase rounded-xl"
						>
						Daftar Sekarang
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>
</section>

<div
class="modal fade"
id="modalRegisterSuccess"
tabindex="-1"
aria-hidden="true"
>
<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-body">
			<div class="box-image">
				<img src="assets/images/img-login-success.png" />
			</div>
			<div class="text-center mt-2">
				<div class="text-app fw-600 fs-15px mb-2">
					Daftar akun berhasil!
				</div>
				<p class="m-0 p-0">Mohon tunggu sebentar...</p>
				<p class="m-0 p-0">Kamu akan diarahkan ke halaman utama.</p>
				<div class="box-image mt-3">
					<img class="sm" src="assets/images/loading.png" />
				</div>
			</div>
		</div>
	</div>
</div>
</div>