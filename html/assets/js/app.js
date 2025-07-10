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
});
