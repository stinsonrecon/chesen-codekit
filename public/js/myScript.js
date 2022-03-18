document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('banner')) {
        new Splide('#banner', {
            perPage: 1,
            height: '100vh',
            type: 'loop',
            cover: true,
            autoplay: true,
            pauseOnHover: false,
        }).mount();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementsByClassName('product-slider')[0]) {
        new Splide('.product-slider', {
            perPage: 3,
            type: 'loop',
            autoplay: true,
            pauseOnHover: false,
        }).mount();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementsByClassName('product-slider-mobile')[0]) {
        new Splide('.product-slider-mobile', {
            perPage: 1,
            type: 'loop',
            autoplay: true,
            pauseOnHover: false,
        }).mount();
    }
});