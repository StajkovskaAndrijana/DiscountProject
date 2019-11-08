// List View and Grid View
$('button').on('click', function (e) {
    if ($(this).hasClass('grid-btn')) {
        $('.discount').removeClass('col-md-12').addClass('col-md-4');
        $('.discount').removeClass('col-md-12').addClass('col-sm-6');
        $(".fa-th").css("color", "#FCD232");
        $(".fa-list").css("color", "white");
        $('.thumbnail').removeClass('thumbnail-list').addClass('thumbnail-grid');
        $('.thumbnail-logo').removeClass('thumbnail-logo-list').addClass('thumbnail-logo-grid');
        $('.thumbnail .caption').removeClass('caption_list_view').addClass('caption_grid_view');
        $('.thumbnail .body').removeClass('body_list_view').addClass('body_grid_view');
    } else if ($(this).hasClass('list-btn')) {
        $('.discount').removeClass('col-md-4').addClass('col-md-12');
        $('.discount').removeClass('col-sm-6').addClass('col-md-12');
        $(".fa-list").css("color", "#FCD232");
        $(".fa-th").css("color", "white");
        $('.thumbnail').removeClass('thumbnail-grid').addClass('thumbnail-list');
        $('.thumbnail-logo').removeClass('thumbnail-logo-grid').addClass('thumbnail-logo-list');
        $('.thumbnail .caption').removeClass('caption_grid_view').addClass('caption_list_view');
        $('.thumbnail .body').removeClass('body_grid_view').addClass('body_list_view');
    }
});


// Input Search
$('#search').on('keyup', function (e) {
    e.preventDefault();
    $value = $(this).val();

    $.ajax({
        url: "/inputSearch",
        method: 'GET',
        data: {
            'search': $value,
        },

        success: function (data) {
            $('.cards .container .row').html(data);
        }
    });
});


// Select Search
$('.search_category').on('change', function (e) {
    e.preventDefault();
    var categoryID = $(this).val();

    $.ajax({
        url: "/selectSearch/" + categoryID,
        method: 'GET',

        success: function (data) {
            $('.cards .container .row').html(data.deals);
        }
    });
});


// Thumbnail Image to be shown after upload
var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('.thumbnail_upload').css('visibility', 'visible');
};


// Carousel
$('#myCarousel').carousel({
    interval: 10000
})

$('.carousel .item').each(function () {
    var next = $(this).next();
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (width > 960) {
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        if (next.next().length > 0) {
            next.next().children(':first-child').clone().appendTo($(this));
        } else {
            $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
        }
    }
});


// Left carousel control to be shown when the right carousel control is clicked
$('.carousel-control.right').on('click', function (e) {
    e.preventDefault();
    $('.carousel-control.left').css('visibility', 'visible');
})


// On click image to be shown in another <div>
$('.carousel-img').on('click', function (e) {
    e.preventDefault();
    var src = $('.carousel-img img').attr('src');
    $('.one-img').attr('src', src);
})
