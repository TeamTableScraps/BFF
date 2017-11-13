$(document).ready(function () {
    $.colorbox.settings.close = "&#10006;";
    $.colorbox.settings.onOpen = function(){
        $("#cboxTopLeft").hide();
        $("#cboxTopRight").hide();
        $("#cboxBottomLeft").hide();
        $("#cboxBottomRight").hide();
        $("#cboxMiddleLeft").hide();
        $("#cboxMiddleRight").hide();
        $("#cboxTopCenter").hide();
        $("#cboxBottomCenter").hide();
        $("#cboxContent").addClass("whiteBorder");
        $("#cboxOverlay").addClass("cboxOverlay_black30");
    };
    $.colorbox.settings.onComplete = function(){
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE");
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer
        {
            $.colorbox.resize({
                width: window.innerWidth > parseInt('960px') ? '500px' : '95%',
                height: window.innerHeight > parseInt('960px') ? '500px' : '95%'
            });
            $.colorbox.resize();
        }
    };

    $(".popup").colorbox({
        maxWidth:"90%",
        maxHeight:"90%"
    });
});