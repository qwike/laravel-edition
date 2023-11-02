$(document).ready(function() {
    $("#tour_slider").slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: "#tour_prev_arrow",
        nextArrow: "#tour_next_arrow",
    });
    $("#event_slider").slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: "#event_prev_arrow",
        nextArrow: "#event_next_arrow",
        responsive: [
            {
                breakpoint: 950,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ],
    });
});
