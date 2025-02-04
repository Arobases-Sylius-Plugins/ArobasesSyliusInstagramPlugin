/*********INSTA list************/
var swiper_insta = new Swiper('.swiper-insta', {
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
$(".swiper-insta").hover(function(){
    swiper_insta.stopAutoplay();
}, function(){
    swiper_insta.startAutoplay();
});
var changed = false;
$(".next-insta").on('click', function () {
    if (changed === true) {
        changed = false;
        swiper_insta.slideTo(0);
    }
    if (swiper_insta.isEnd) changed = true;
})

/*********INSTA list************/
var swiper_avis = new Swiper('.swiper-avis', {
    nextButton: '.next-avis',
    prevButton: '.prev-avis',
    pagination: '.swiper-pagination-avis',
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
$(".swiper-avis").hover(function(){
    swiper_avis.stopAutoplay();
}, function(){
    swiper_avis.startAutoplay();
});
var changed = false;
$(".next-avis").on('click', function () {
    if (changed === true) {
        changed = false;
        swiper_avis.slideTo(0);
    }
    if (swiper_avis.isEnd) changed = true;
})


