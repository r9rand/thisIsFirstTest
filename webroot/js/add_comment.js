$(function(){
  'use strict';

  console.log('comment_ok');

  $('.add-comment-btn').click(function(){
    console.log('comment');
    var report_id         = $(this).siblings('.add-comment-report_id').val();
    var body              = $(this).siblings('.add-comment-body').val();
    var to_user_id        = $(this).siblings('.add-comment-user_id').val();
    var comment_report_id = $(this).siblings('.add-comment-report_id').val();

    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/reports/add_comment",
      timeout : 10000,
      data : {
        'user_id' : user_id,
        'report_id' : report_id,
        'body' : body,

        'to_user_id' : to_user_id,
        'comment_report_id' : comment_report_id,
      },
      dataType : "text",
      success : function(data, status, xhr){
        console.log('success');
      },
      error : function(XMLHttpRequest, textStatus, errorThrown){
        console.log('error');
      }
    }).done(function(data, textStatus, jqXHR){
      $(".comments-box").append(data);
    }).fail(function(data){
      console.log('xxxx');
    });

  });


});
