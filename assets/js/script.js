

$(document).ready(function(){
    $('.menu li').on('click', function(){
        $(this).siblings().removeClass('menu-active');
        $(this).addClass('menu-active');
    });
});