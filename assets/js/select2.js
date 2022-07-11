$(function() {
  'use strict'
  $("#selectCity").select2();

  // if ($(".js-example-basic-single").length) {
  //   $("#selectCity").select2();
  // }
  if ($(".js-example-basic-multiple").length) {
    $(".js-example-basic-multiple").select2();
  }
});