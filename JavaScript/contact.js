/*global $, alert, console */

$(function () {

    'use strict';

    var userError    = true,
        emailError   = true,
        mobileError  = true,
        messageError = true;

    $('.username').blur(function () {
        if ($(this).val().length < 4) {
           $(this).css('backgroundColor','#fbb6b6');
           $(this).parent().find('.custom-alert').fadeIn(500);
           $(this).parent().find('.asterisx').fadeIn(100);

           userError = true;
        }else {
            $(this).css('backgroundColor','#a5ffa5');
            $(this).parent().find('.custom-alert').fadeOut(500);
            $(this).parent().find('.asterisx').fadeOut(100);

            userError = false;
        }
    });

    $('.email').blur(function () {
        if ($(this).val().length < 6) {
           $(this).css('backgroundColor','#fbb6b6');
           $(this).parent().find('.custom-alert').fadeIn(500);
           $(this).parent().find('.asterisx').fadeIn(100);

           emailError = true;
        }else {
            $(this).css('backgroundColor','#a5ffa5','!important');
            $(this).parent().find('.custom-alert').fadeOut(500);
            $(this).parent().find('.asterisx').fadeOut(100);

            emailError = false;
        }
    });

    $('.mobile').blur(function () {
        if ($(this).val().length != 11) {
           $(this).css('backgroundColor','#fbb6b6','!important');
           $(this).parent().find('.custom-alert').fadeIn(500);
           $(this).parent().find('.asterisx').fadeIn(100);

           mobileError = true;
        }else {
            $(this).css('backgroundColor','#a5ffa5');
            $(this).parent().find('.custom-alert').fadeOut(500);
            $(this).parent().find('.asterisx').fadeOut(100);

            mobileError = false;
        }
    });

    $('.message').blur(function () {
        if ($(this).val().length < 20) {
           $(this).css('backgroundColor','#fbb6b6');
           $(this).parent().find('.custom-alert').fadeIn(500);
           $(this).parent().find('.asterisx').fadeIn(100);

           messageError = true;
        }else {
            $(this).css('backgroundColor','#a5ffa5');
            $(this).parent().find('.custom-alert').fadeOut(500);
            $(this).parent().find('.asterisx').fadeOut(100);

            messageError = false;
        }
    });

    $('.contact-form').submit(function(e) {
        if (userError === true || emailError === true || mobileError === true || messageError === true) {
            
            e.preventDefault();

            $('.username, .email, .mobile, .message').blur();

        }
    });
});