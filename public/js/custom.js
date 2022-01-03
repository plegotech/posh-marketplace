$(function () {
    $(".datepicker").each(function () {
        $(this).datepicker()
    })

    // $(".tabs").tabs();

    $('.calendar').each(function () {
        $(this).on('click', function () {
            $(this).closest('.datepicker').click();
        })
    })

});

$(document).ready(function () {

    $('.button-left').click(function () {
        $('.sidebar').toggleClass('fliph');
    });

    $('.more-opt').on('click', function () {
        $(this).each(function () {
            $(this).siblings('ul').show()
        })
    })

    $('.cst-slct ul li').on('click', function () {
        $(this).each(function () {
            $(this).parent('ul').hide()
        })
    })

    $('.sub-menu').each(function () {
        $(this).on('click', function () {
            if ($(this).hasClass('active_')) {
                $(this).children().children('ul').slideUp();
                $(this).removeClass('active_');
                $(this).children().find('.arrow').attr('src', '/img/menu-icons/arrow-down.png')
            } else {
                $(this).children().children('ul').slideDown();
                $(this).addClass('active_');
                $(this).children().find('.arrow').attr('src', '/img/menu-icons/arrow-up.png')
            }
        })
    })

    $('.pdf-down').on('click', function () {
        $(this).each(function () {
            alert('File has been downloaded!');
        })
    })

});

