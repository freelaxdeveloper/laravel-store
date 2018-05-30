const dcmsx = {
    loaderShow: function(selector) {
        $( selector ).append( '\
            <div class="cssload-fond">\
                <div class="cssload-container-general">\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_1"> </div></div>\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_2"> </div></div>\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_3"> </div></div>\
                    <div class="cssload-internal"><div class="cssload-ballcolor cssload-ball_4"> </div></div>\
                </div>\
            </div>\
        ' );
    },
    loaderHide: function() {
        $( '.cssload-fond' ).remove();
    }

}
