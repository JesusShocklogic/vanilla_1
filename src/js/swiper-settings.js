var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 15,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    breakpoints: {
        481: {
            slidesPerView: 2,
        },
        769: {
            slidesPerView: 3,
        },
        1201: {
            spaceBetween: 20,
            slidesPerView: 4,
        },
        1401: {
            spaceBetween: 30,
            slidesPerView: 5,
        },
    },
});