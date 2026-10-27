/*********INSTA list************/
(function () {
    var container = document.querySelector('.swiper-insta');

    if (container === null || typeof Swiper === 'undefined') {
        return;
    }

    var swiper_insta = new Swiper(container, {
        nextButton: '.next-insta',
        prevButton: '.prev-insta',
        pagination: '.swiper-pagination-insta',
        paginationClickable: true,
        slidesPerView: 3,
        spaceBetween: 25,
        loop: false,
        autoplay: 2500,
        speed: 900,
        breakpoints: {
            340: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1200: {
                spaceBetween: 20
            },

        }
    });

    container.addEventListener('mouseenter', function () {
        swiper_insta.stopAutoplay();
    });
    container.addEventListener('mouseleave', function () {
        swiper_insta.startAutoplay();
    });

    var changed = false;
    document.querySelectorAll('.next-insta').forEach(function (button) {
        button.addEventListener('click', function () {
            if (changed === true) {
                changed = false;
                swiper_insta.slideTo(0);
            }
            if (swiper_insta.isEnd) changed = true;
        });
    });
})();
