const baseUrl = "/lapor_bupati/ci";

function goTo(link, delay = 0) {
	if (typeof link === "string" && link.trim() !== "") {
		setTimeout(() => {
			window.location.href = `${baseUrl}/${link}`;
		}, delay);
	} else {
		console.warn("Link tidak valid:", link);
	}
}

function removeInitScript(el) {
	const isElement = document.querySelector(`#${el}`);
	if (isElement) {
		setTimeout(() => {
			isElement.remove();
		}, 2000);
	}
}

$(document).on("click", ".toggle-password", function (e) {
	e.preventDefault();

	const targetSelector = $(this).data("target");
	const $input = $(targetSelector);
	const $icon = $(this).find("i");

	if ($input.length) {
		const isPassword = $input.attr("type") === "password";
		$input.attr("type", isPassword ? "text" : "password");
		$icon
			.toggleClass("bi-eye-fill", isPassword)
			.toggleClass("bi-eye-slash-fill", !isPassword);
	}
});

async function initSwiper(el) {
	const swiperElement = document.querySelector(`.${el}`);
	if (swiperElement) {
		const swiper = new Swiper(`.${el}`, {
			loop: true,
			pagination: {
				el: ".swiper-pagination",
				type: "progressbar",
			},
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			autoplay: {
				delay: 3000,
				disableOnInteraction: false,
			},
		});
	} else {
		console.warn("Element swiper tidak ditemukan!");
	}
}

$(document).on("submit", "#formLogin", async function (e) {
	e.preventDefault();

	const formData = new FormData(this);

	Swal.fire({
		title: "Mohon tunggu...",
		text: "Sedang memproses login",
		allowOutsideClick: false,
		didOpen: () => {
			Swal.showLoading();
		},
	});

	try {
		const response = await fetch(`${baseUrl}/process-login`, {
			method: "POST",
			body: formData,
		});

		const result = await response.json();
		Swal.close();

		if (!result.success) {
			Swal.fire({
				icon: "error",
				title: "Login Gagal",
				text: result.message || "Terjadi kesalahan saat login.",
			});
			return;
		}

		const myModal = new bootstrap.Modal(
			document.getElementById("modalLoginSuccess"),
		);
		myModal.show();
		goTo("/", 2000);
	} catch (error) {
		Swal.close();
		Swal.fire({
			icon: "error",
			title: "Terjadi Kesalahan",
			text: "Gagal memproses permintaan.",
		});
	}
});

$(document).on("submit", "#formRegister", async function () {
	e.preventDefault();
	const myModal = new bootstrap.Modal(
		document.getElementById("modalRegisterSuccess"),
	);
	myModal.show();
	goTo("login?is_login=1", 2000);
});

$(document).on("submit", "#formReport", async function () {
	e.preventDefault();
	const myModal = new bootstrap.Modal(
		document.getElementById("modalReportSuccess"),
	);
	myModal.show();
	setTimeout(() => {
		location.reload();
	}, 2000);
});

$(document).on("click", "#logoutBtn", async function () {
	e.preventDefault();

	Swal.fire({
		title: "Keluar",
		text: "Apakah Anda yakin ingin keluar akun?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#d33",
		cancelButtonColor: "#6c757d",
		confirmButtonText: "Ya, Keluar",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			goTo("logout");
		}
	});
});

$(document).on("click", "#clearHistory", async function () {
	e.preventDefault();

	Swal.fire({
		title: "Hapus Riwayat",
		text: "Apakah Anda yakin ingin menghapus semua riwayat pelaporan?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#d33",
		cancelButtonColor: "#6c757d",
		confirmButtonText: "Ya, Hapus Semua",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				title: "Riwayat berhasil dihapus!",
				icon: "success",
				timer: 1500,
				showConfirmButton: false,
			}).then(() => {
				setTimeout(() => {
					location.reload();
				}, 2000);
			});
		}
	});
});
