$("#house_images_slider").slick({
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 950,
            settings: {
                slidesToShow: 5,
            },
        },
        {
            breakpoint: 450,
            settings: {
                slidesToShow: 3,
            },
        },
    ],
});