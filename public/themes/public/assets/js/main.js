$(window).scroll(function() {
    if ($(window).scrollTop() >= 50) {
        $("body").addClass("body-scrolled");
    } else {
        $("body").removeClass("body-scrolled");
    }
});
$(document).ready(function() {
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // var config = {
    //     '.chosen-select': {
    //         disable_search_threshold: 100,
    //         width: "100%"
    //     },
    // };
    // for (var selector in config) {
    //     if (config.hasOwnProperty(selector)) {
    //         $(selector).chosen(config[selector]);
    //     }
    // }
    if ($('#trending-slider').length) {
        $("#trending-slider").owlCarousel({
            autoPlay: 5000, //Set AutoPlay to 3 seconds
            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [991, 2],
            itemsMobile: [650, 1],
            navigation: true,
            pagination: false,
            navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
    }
    $('.wpc-star-rate').raty({
        number: 5,
        half: false,
        starOff: 'fa fa-star-o',
        starOn: 'fa fa-star rated',
        score: function() {
            return $(this).attr('data-score');
        }
    })
    $("#branding-slider").owlCarousel({
        autoPlay: true,
        items: 6, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 4], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
        pagination: false,
        navigation: false,
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
});
$('.top-right-menu').find('.fa-search').on('click', function(e) {
    $('.search-box').fadeIn(250);
    e.stopPropagation();
});
$('.search-box').on('click', function(e) {
    e.stopPropagation();
});
$('body, .top-right-menu .fa-times').on('click', function() {
    $('.search-box').fadeOut(250);
});

toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-bottom-left",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };