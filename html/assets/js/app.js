function goTo(link, delay = 0) {
	if (typeof link === "string" && link.trim() !== "") {
		setTimeout(() => {
			window.location.href = link;
		}, delay);
	} else {
		console.warn("Link tidak valid:", link);
	}
}

document.addEventListener("DOMContentLoaded", function () {
	const swiperElement = document.querySelector(".mySwiper");
	if (swiperElement) {
		const swiper = new Swiper(".mySwiper", {
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
		console.warn("Element .mySwiper tidak ditemukan!");
	}

	const formLogin = document.querySelector("#formLogin");

	if (formLogin) {
		document
			.getElementById("formLogin")
			.addEventListener("submit", function (e) {
				e.preventDefault();

				// Lakukan validasi atau proses form di sini jika perlu

				const myModal = new bootstrap.Modal(
					document.getElementById("modalLoginSuccess"),
				);
				myModal.show();
				goTo("index.html", 2000);
			});
	}

	const formRegister = document.querySelector("#formRegister");

	if (formRegister) {
		document
			.getElementById("formRegister")
			.addEventListener("submit", function (e) {
				e.preventDefault();

				// Lakukan validasi atau proses form di sini jika perlu

				const myModal = new bootstrap.Modal(
					document.getElementById("modalRegisterSuccess"),
				);
				myModal.show();
				goTo("index.html", 2000);
			});
	}

	const formReport = document.querySelector("#formReport");

	if (formReport) {
		document
			.getElementById("formReport")
			.addEventListener("submit", function (e) {
				e.preventDefault();

				// Lakukan validasi atau proses form di sini jika perlu

				const myModal = new bootstrap.Modal(
					document.getElementById("modalReportSuccess"),
				);
				myModal.show();
				goTo("report.html", 2000);
			});
	}

	const logoutBtn = document.querySelector("#logoutBtn");
	if (logoutBtn) {
		document
			.getElementById("logoutBtn")
			.addEventListener("click", function () {
				Swal.fire({
					title: "Keluar",
					text: "Apakah Anda yakin ingin keluar akun?",
					icon: "warning",
					showCancelButton: true,
					confirmButtonColor: "#d33",
					cancelButtonColor: "#6c757d",
					confirmButtonText: "Ya, Keluar!",
					cancelButtonText: "Batal",
				}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire({
							title: "Berhasil logout!",
							icon: "success",
							timer: 1500,
							showConfirmButton: false,
						}).then(() => {
							// Ganti dengan redirect/logout kamu
							window.location.href = "login.html";
						});
					}
				});
			});
	}
});
