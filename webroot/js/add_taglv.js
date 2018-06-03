$(function(){
  'use strict';

  console.log('add_taglv_ok');

  $('body').on('click', '.tag-lv-box > .add-lv-btn', function(){
    console.log('taglv');
    var tag_id         = $(this).siblings('.add-lv-tag_id').val();
    var to_user_id     = $(this).siblings('.add-lv-user_id').val();
    var lv_tag_id      = $(this).siblings('.add-lv-tag_id').val();

    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/reports/add_taglv",
      timeout : 10000,
      data : {
        'user_id' : user_id,
        'tag_id' : tag_id,

        'to_user_id' : to_user_id,
        'lv_tag_id' : lv_tag_id
      },
      dataType : "text",
      success : function(data, status, xhr){
        console.log('success');
      },
      error : function(XMLHttpRequest, textStatus, errorThrown){
        console.log('error');
      }
    }).done(function(data, textStatus, jqXHR){
      $(".tags-box").append(data);
    }).fail(function(data){
      console.log('xxxx');
    });

  });


  // $('.tag-lv-box > .add-lv-btn').click(function(){
  //   console.log('taglv');
  //   var tag_id         = $(this).siblings('.add-lv-tag_id').val();
  //   var to_user_id     = $(this).siblings('.add-lv-user_id').val();
  //   var lv_tag_id      = $(this).siblings('.add-lv-tag_id').val();
  //
  //   $.ajax({
  //     type : "POST",
  //     url : "http://localhost/r9rand6/reports/add_taglv",
  //     timeout : 10000,
  //     data : {
  //       'user_id' : user_id,
  //       'tag_id' : tag_id,
  //
  //       'to_user_id' : to_user_id,
  //       'lv_tag_id' : lv_tag_id
  //     },
  //     dataType : "text",
  //     success : function(data, status, xhr){
  //       console.log('success');
  //     },
  //     error : function(XMLHttpRequest, textStatus, errorThrown){
  //       console.log('error');
  //     }
  //   }).done(function(data, textStatus, jqXHR){
  //     $(".tags-box").append(data);
  //   }).fail(function(data){
  //     console.log('xxxx');
  //   });
  //
  // });


});
