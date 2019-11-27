/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('bootstrap');
// require('email_verification');
$(document).ready(function () {
    $('.email').on('change', function () {
        //ajax request
        $.ajax({
            url: "registration/emailcheck",
            data: {
                'email': $('.email').val()
            },
            dataType: 'json',
            success: function (data) {
                // if (data === 'fail') {
                //     $('.method-fail ').removeAttr('hidden');
                // }else {
                //     $('.method-fail').attr('hidden', true);
                // }
                if (data === true) {
                    $('.email-msg').removeAttr('hidden');
                } else {
                    $('.email-msg').attr('hidden', true);
                }
            }
        });
    });
});