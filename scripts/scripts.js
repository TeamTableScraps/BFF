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

    $(".popup").colorbox({
        maxWidth:"90%",
        maxHeight:"90%"
    });

    $(".popupForm").submit(function() {
        $.post(
            $(this).attr("action"),
            $(this).serialize(),
            function(data) {
                $.colorbox({
                    html:data,
                    maxWidth:"90%",
                    maxHeight:"90%",
                    onClosed: function(){
                        window.location = window.location.href;
                    }
                });
            },
            'html'
        );
        return false;
    });
});