$(function(){


    var currentFeed = function(){
        return $('.container .feed:visible');
    };

    var prevArrow = $('.container').find('.prev').on('click', function(){
        currentFeed().hide().prev().show();
        checkArrows();
    });

    var nextArrow = $('.container').find('.next').on('click', function(){
        currentFeed().hide().next().show();
        checkArrows();
    });

    var checkArrows = function () {
        if ($('.container .feed').last().is(':visible')) {
            nextArrow.hide();
        } else {
            nextArrow.show();
        }

        if ($('.container .feed').first().is(':visible')) {
            prevArrow.hide();
        } else {
            prevArrow.show();
        }
    }

    checkArrows();
});