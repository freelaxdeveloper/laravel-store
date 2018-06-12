$(function(){
    // Remove Spoiler Tag Name
    $("spoiler").contents().unwrap();
    // Bind Spoiler Click
    $(".spoiler-head").click(function(){
        $this = $(this);
        if ( $this.hasClass("expanded") ) {
            $this.removeClass("expanded");
            $this.addClass("collapsed");
            $this.next().slideUp("fast");
        } else {
            $this.removeClass("collapsed");
            $this.addClass("expanded");
            $this.next().slideDown("fast");
        }
    });
});