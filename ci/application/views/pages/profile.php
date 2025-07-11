<section class="page-wrapper shadow border bg-light">
	<div class="page-app">
		<div
		class="header-app d-flex align-items-center justify-content-start py-1 px-3"
		>
		<a class="btn fs-22px" href="<?php echo base_url('/history');?>"
			><i class="icon bi bi-arrow-left"></i
			></a>
			<div
			class="header-app-title text-center w-75 text-dark fw-800 ls-sm fs-20px text-capitalize"
			>
			Informasi Pribadi
		</div>
	</div>
	<div class="content mt-5 has-header">
		<div class="col-10 m-auto">

			<?php
			if (!isset($data['profile']) || empty($data['profile']) || is_null($data['profile'])){ 
				$this->load->view('./layout/empty', ['is_text' => 'Data profil tidak tersedia']);
			} else {
				$profile = $data['profile'];
				?>
				<div class="container p-0">
					<div class="text-center">
						<div class="box-image">
							<img
							class="md"
							src="<?php echo base_url('/assets/images/user.png');?>"
							/>
						</div>
					</div>
				</div>
				<div class="container mt-4 p-0">
					<form id="formLogin">
						<div class="form-group mb-3">
							<label
							class="form-label text-dark fw-600 fs-14px"
							>Nama</label
							>
							<div
							class="input-group bg-lighter rounded-lg"
							>
							<input
							value="<?php echo $profile['username'];?>"
							name="name"
							type="text"
							required
							placeholder="Nama Pengguna"
							class="form-control form-control-lg"
							/>
							<div class="input-group-append">
								<span
								class="input-group-text bg-transparent border-0 text-secondary"
								><i
								class="icon bi bi-person-fill"
								></i
								></span>
							</div>
						</div>
					</div>
					<div class="form-group mb-3">
						<label
						class="form-label text-dark fw-600 fs-14px"
						>Nomor Telepon</label
						>
						<div
						class="input-group bg-lighter rounded-lg"
						>
						<input
						value="<?php echo $profile['userphone'];?>"
						name="phone"
						type="text"
						required
						placeholder="628xxxxxxxx"
						class="form-control form-control-lg"
						/>
						<div class="input-group-append">
							<span
							class="input-group-text bg-transparent border-0 text-secondary"
							><i
							class="icon bi bi-telephone-fill"
							></i
							></span>
						</div>
					</div>
				</div>
				<div class="form-group mb-3">
					<label
					class="form-label text-dark fw-600 fs-14px"
					>Alamat Email</label
					>
					<div
					class="input-group bg-lighter rounded-lg"
					>
					<input
					value="<?php echo $profile['useremail'];?>"
					name="email"
					type="email"
					required
					placeholder="user@mail.com"
					class="form-control form-control-lg"
					/>
					<div class="input-group-append">
						<span
						class="input-group-text bg-transparent border-0 text-secondary"
						><i
						class="icon bi bi-envelope-fill"
						></i
						></span>
					</div>
				</div>
			</div>

			<div class="form-group mb-3">
				<label
				class="form-label text-dark fw-600 fs-14px"
				>Jenis Kelamin</label
				>
				<select
				name="gender"
				required
				class="bg-lighter rounded-lg form-control form-select form-control-lg"
				>
				<option>Laki-Laki</option>
				<option>Perempuan</option>
			</select>
		</div>
		<div class="form-group mb-3">
			<label
			class="form-label text-dark fw-600 fs-14px"
			>Password Baru</label
			>
			<div class="input-group bg-lighter rounded-lg">
				<input
				id="password"
				type="password"
				required
				placeholder="Masukkan password"
				class="form-control form-control-lg"
				name="password"
				/>
				<div class="input-group-append">
					<a
					data-target="#password"
					class="input-group-text bg-transparent border-0 text-secondary toggle-password"
					><i class="icon bi bi-eye-slash-fill"></i
					></a>
				</div>
			</div>
		</div>
		<div class="form-group mb-3 mt-5">
			<div class="mt-5">
				<button
				type="submit"
				class="btn btn-lg bg-app ls-sm fw-bold text-white w-100 text-uppercase rounded-xl"
				>
				Simpan Perubahan
			</button>
		</div>
	</div>
</form>
</div>
<?php
} 
?>
</div>
</div>
</div>
</section>