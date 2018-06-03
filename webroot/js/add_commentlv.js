$(function(){
  'use strict';

  console.log('add_commentlv_ok');

  $('body').on('click', '.comment-lv-box > .add-lv-btn', function(){
    console.log('commentlv');
    $(this).addClass('pushed-btn');

    var comment_id         = $(this).siblings('.add-lv-comment_id').val();
    var to_user_id         = $(this).siblings('.add-lv-user_id').val();
    var lv_comment_id      = $(this).siblings('.add-lv-comment_id').val();

    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/reports/add_commentlv",
      timeout : 10000,
      data : {
        'user_id' : user_id,
        'comment_id' : comment_id,

        'to_user_id' : to_user_id,
        'lv_comment_id' : lv_comment_id
      },
      dataType : "text",
      success : function(data, status, xhr){
        console.log('success');
      },
      error : function(XMLHttpRequest, textStatus, errorThrown){
        console.log('error');
      }
    }).done(function(data, textStatus, jqXHR){
      console.log(comment_id);
      console.log(to_user_id);
      console.log(lv_comment_id);
    }).fail(function(data){
      console.log('xxxx');
    });

  });


  // $('.comment-lv-box > .add-lv-btn').click(function(){
  //   console.log('commentlv');
  //   $(this).addClass('pushed-btn');
  //
  //   var comment_id         = $(this).siblings('.add-lv-comment_id').val();
  //   var to_user_id         = $(this).siblings('.add-lv-user_id').val();
  //   var lv_comment_id      = $(this).siblings('.add-lv-comment_id').val();
  //
  //   $.ajax({
  //     type : "POST",
  //     url : "http://localhost/r9rand6/reports/add_commentlv",
  //     timeout : 10000,
  //     data : {
  //       'user_id' : user_id,
  //       'comment_id' : comment_id,
  //
  //       'to_user_id' : to_user_id,
  //       'lv_comment_id' : lv_comment_id
  //     },
  //     dataType : "text",
  //     success : function(data, status, xhr){
  //       console.log('success');
  //     },
  //     error : function(XMLHttpRequest, textStatus, errorThrown){
  //       console.log('error');
  //     }
  //   }).done(function(data, textStatus, jqXHR){
  //     console.log(comment_id);
  //     console.log(to_user_id);
  //     console.log(lv_comment_id);
  //   }).fail(function(data){
  //     console.log('xxxx');
  //   });
  //
  // });


});
