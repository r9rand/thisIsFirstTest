$(function(){
  'use strict';

  console.log('dress_tags');
  $('.tag-box').each(function(){
    var lv_count     = parseInt($(this).find('.tag-lv-counter').text(), 10) + 1;
    var hv_count     = parseInt($(this).find('.tag-hv-counter').text(), 10) + 1;
    console.dir(lv_count);
    console.log(lv_count);

    if (1 < lv_count && lv_count <= 3) {
      $(this).css({'background-color': 'red', 'font-size': '50px'});
    } else if (lv_count > 3) {
      $(this).css({'background-color': 'green', 'font-size': '100px'});
    } else if (lv_count > 20) {
      $(this).css({'background-color': 'blue', 'font-size': '70px'});
    }

    console.dir('gogo');
  });

  // $('body').on('ready', '.tag-box', function(){
  //   // console.log('taglv');
  //   // var lv_count     = parseInt($(this).find('.tag-lv-counter').text(), 10);
  //   // var hv_count     = parseInt($(this).find('.tag-hv-counter').text(), 10);
  //   // console.dir(lv_count);
  //   // console.log(lv_count);
  //   // console.dir('gogo');
  // });
  console.log('dress.DONE.');


});
