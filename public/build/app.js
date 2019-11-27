(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app"],{

/***/ "./assets/css/app.scss":
/*!*****************************!*\
  !*** ./assets/css/app.scss ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/js/app.js":
/*!**************************!*\
  !*** ./assets/js/app.js ***!
  \**************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you require will output into a single css file (app.css in this case)
__webpack_require__(/*! ../css/app.scss */ "./assets/css/app.scss"); // Need jQuery? Install it with "yarn add jquery", then uncomment to require it.


var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js"); // require('email_verification');


$(document).ready(function () {
  $('.email').on('change', function () {
    //ajax request
    $.ajax({
      url: "registration/emailcheck",
      data: {
        'email': $('.email').val()
      },
      dataType: 'json',
      success: function success(data) {
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

/***/ })

},[["./assets/js/app.js","runtime","vendors~app"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvY3NzL2FwcC5zY3NzIiwid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hcHAuanMiXSwibmFtZXMiOlsicmVxdWlyZSIsIiQiLCJkb2N1bWVudCIsInJlYWR5Iiwib24iLCJhamF4IiwidXJsIiwiZGF0YSIsInZhbCIsImRhdGFUeXBlIiwic3VjY2VzcyIsInJlbW92ZUF0dHIiLCJhdHRyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQSx1Qzs7Ozs7Ozs7Ozs7QUNBQTs7Ozs7O0FBT0E7QUFDQUEsbUJBQU8sQ0FBQyw4Q0FBRCxDQUFQLEMsQ0FFQTs7O0FBQ0EsSUFBTUMsQ0FBQyxHQUFHRCxtQkFBTyxDQUFDLG9EQUFELENBQWpCOztBQUNBQSxtQkFBTyxDQUFDLGdFQUFELENBQVAsQyxDQUNBOzs7QUFDQUMsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFZO0FBQzFCRixHQUFDLENBQUMsUUFBRCxDQUFELENBQVlHLEVBQVosQ0FBZSxRQUFmLEVBQXlCLFlBQVk7QUFDakM7QUFDQUgsS0FBQyxDQUFDSSxJQUFGLENBQU87QUFDSEMsU0FBRyxFQUFFLHlCQURGO0FBRUhDLFVBQUksRUFBRTtBQUNGLGlCQUFTTixDQUFDLENBQUMsUUFBRCxDQUFELENBQVlPLEdBQVo7QUFEUCxPQUZIO0FBS0hDLGNBQVEsRUFBRSxNQUxQO0FBTUhDLGFBQU8sRUFBRSxpQkFBVUgsSUFBVixFQUFnQjtBQUNyQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBSUEsSUFBSSxLQUFLLElBQWIsRUFBbUI7QUFDZk4sV0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQlUsVUFBaEIsQ0FBMkIsUUFBM0I7QUFDSCxTQUZELE1BRU87QUFDSFYsV0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQlcsSUFBaEIsQ0FBcUIsUUFBckIsRUFBK0IsSUFBL0I7QUFDSDtBQUNKO0FBakJFLEtBQVA7QUFtQkgsR0FyQkQ7QUFzQkgsQ0F2QkQsRSIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW4iLCIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cblxuLy8gYW55IENTUyB5b3UgcmVxdWlyZSB3aWxsIG91dHB1dCBpbnRvIGEgc2luZ2xlIGNzcyBmaWxlIChhcHAuY3NzIGluIHRoaXMgY2FzZSlcbnJlcXVpcmUoJy4uL2Nzcy9hcHAuc2NzcycpO1xuXG4vLyBOZWVkIGpRdWVyeT8gSW5zdGFsbCBpdCB3aXRoIFwieWFybiBhZGQganF1ZXJ5XCIsIHRoZW4gdW5jb21tZW50IHRvIHJlcXVpcmUgaXQuXG5jb25zdCAkID0gcmVxdWlyZSgnanF1ZXJ5Jyk7XG5yZXF1aXJlKCdib290c3RyYXAnKTtcbi8vIHJlcXVpcmUoJ2VtYWlsX3ZlcmlmaWNhdGlvbicpO1xuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoJy5lbWFpbCcpLm9uKCdjaGFuZ2UnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIC8vYWpheCByZXF1ZXN0XG4gICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICB1cmw6IFwicmVnaXN0cmF0aW9uL2VtYWlsY2hlY2tcIixcbiAgICAgICAgICAgIGRhdGE6IHtcbiAgICAgICAgICAgICAgICAnZW1haWwnOiAkKCcuZW1haWwnKS52YWwoKVxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIGRhdGFUeXBlOiAnanNvbicsXG4gICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgIC8vIGlmIChkYXRhID09PSAnZmFpbCcpIHtcbiAgICAgICAgICAgICAgICAvLyAgICAgJCgnLm1ldGhvZC1mYWlsICcpLnJlbW92ZUF0dHIoJ2hpZGRlbicpO1xuICAgICAgICAgICAgICAgIC8vIH1lbHNlIHtcbiAgICAgICAgICAgICAgICAvLyAgICAgJCgnLm1ldGhvZC1mYWlsJykuYXR0cignaGlkZGVuJywgdHJ1ZSk7XG4gICAgICAgICAgICAgICAgLy8gfVxuICAgICAgICAgICAgICAgIGlmIChkYXRhID09PSB0cnVlKSB7XG4gICAgICAgICAgICAgICAgICAgICQoJy5lbWFpbC1tc2cnKS5yZW1vdmVBdHRyKCdoaWRkZW4nKTtcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgICAgICAkKCcuZW1haWwtbXNnJykuYXR0cignaGlkZGVuJywgdHJ1ZSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICB9KTtcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=