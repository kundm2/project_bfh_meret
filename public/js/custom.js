/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


$( document ).ready(function() {

    // Scroll to next question
    $("[name^=question]").each(function() {
        $(this).on( "click", function() {
            var num = parseInt($( this ).attr('id').replace(/\D/g,'')) + 1;
            var position = $('#question-block' + num).offset().top - 25;

            $("body, html").animate({
                scrollTop: position
            }, 800 );
        });
    });
});

