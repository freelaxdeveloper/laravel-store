const dcmsx = {
    loaderShow: function (selector, customClass = 'cssloadDefault') {
        $( selector ).after( '\
            <div class="cssload-fond ' + customClass + '">\
                <div class="cssload-container-general">\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_1"> </div></div>\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_2"> </div></div>\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_3"> </div></div>\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_4"> </div></div>\
                </div>\
            </div>\
        ' );
    },
    loaderHide: function (customClass = 'cssloadDefault') {
        $( '.' + customClass ).remove();
    },

    timer: function (selector, seconds, callback, className = 'timerDefault') {
        className = className + Math.floor(Math.random() * (9999 - 1111)) + 1111;
        $( selector ).after('<span class="seconds ' + className + '">' + seconds + '</span>');

        var _Seconds = $('.' + className).text(), int;
        int = setInterval(function() { // запускаем интервал
            if (_Seconds > 0) {
                _Seconds--; // вычитаем 1
                $('.' + className).text(_Seconds); // выводим получившееся значение в блок
            } else {
                clearInterval(int); // очищаем интервал, чтобы он не продолжал работу при _Seconds = 0
                // console.log('remove', className);
                $('.seconds').remove();
                // $('.' . className).remove();
                callback();
            }
        }, 1000);
    },

    msg: function (selector, message) {
        this.clearMsg();
        $( selector ).after('<span class="success">[' + message + ']</span>');
    },

    err: function (selector, message) {
        this.clearMsg();
        $( selector ).after('<span class="error">[' + message + ']</span>');
    },

    clearMsg: function () {
        $('.error, .success').remove();
    }

}
