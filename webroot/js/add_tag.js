$(function(){
  'use strict';

  console.log('ok');

  $(document).on('click', '.add-tag-button', function(){
    console.log('tag');
    var report_id         = $(this).siblings('.add-tag-report_id').val();
    var body              = $(this).siblings('.add-tag-body').val();
    var to_user_id        = $(this).siblings('.add-tag-user_id').val();
    var tag_report_id     = $(this).siblings('.add-tag-report_id').val();

    // Validation
    var tagsLength = $('#' + report_id).children('.tag-box').children('.tag-body').length;
    var tags       = [];
    for (var i = 0; i < tagsLength; i++) {
      tags.push($('#' + report_id).children('.tag-box').children('.tag-body').eq(i).text());
    }
    if ( $.inArray(body, tags) !== -1 ) {
      console.log('atta yo');
      $(this).siblings('.error-msg-tag').text('既に登録されています');
      preventDefault(); //　処理を終了させたい
    }

    // Ajax
    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/reports/add_tag",
      timeout : 10000,
      data : {
        'user_id' : user_id,
        'report_id' : report_id,
        'body' : body,

        'to_user_id' : to_user_id,
        'tag_report_id' : tag_report_id,
      },
      dataType : "text",
      success : function(data, status, xhr){
        console.log('success');
      },
      error : function(XMLHttpRequest, textStatus, errorThrown){
        console.log('error');
      }
    }).done(function(data, textStatus, jqXHR){
      // btn change
      $(".tags-box").append(data);
    }).fail(function(data){
      console.log('xxxx');

    });

    $(this).siblings('.error-msg-tag').text('登録しました'); // doneの後に書いたらエラー。－＞deferred 並列処理ができない！！

  });

  // $('.add-tag-button').click(function(){
  //   console.log('tag');
  //   var report_id         = $(this).siblings('.add-tag-report_id').val();
  //   var body              = $(this).siblings('.add-tag-body').val();
  //   var to_user_id        = $(this).siblings('.add-tag-user_id').val();
  //   var tag_report_id     = $(this).siblings('.add-tag-report_id').val();
  //
  //   // Validation
  //   var tagsLength = $('#' + report_id).children('.tag-box').children('.tag-body').length;
  //   var tags       = [];
  //   for (var i = 0; i < tagsLength; i++) {
  //     tags.push($('#' + report_id).children('.tag-box').children('.tag-body').eq(i).text());
  //   }
  //   if ( $.inArray(body, tags) !== -1 ) {
  //     console.log('atta yo');
  //     $(this).siblings('.error-msg-tag').text('既に登録されています');
  //     preventDefault(); //　処理を終了させたい
  //   }
  //
  //   // Ajax
  //   $.ajax({
  //     type : "POST",
  //     url : "http://localhost/r9rand6/reports/add_tag",
  //     timeout : 10000,
  //     data : {
  //       'user_id' : user_id,
  //       'report_id' : report_id,
  //       'body' : body,
  //
  //       'to_user_id' : to_user_id,
  //       'tag_report_id' : tag_report_id,
  //     },
  //     dataType : "text",
  //     success : function(data, status, xhr){
  //       console.log('success');
  //     },
  //     error : function(XMLHttpRequest, textStatus, errorThrown){
  //       console.log('error');
  //     }
  //   }).done(function(data, textStatus, jqXHR){
  //     // btn change
  //     $(".tags-box").append(data);
  //   }).fail(function(data){
  //     console.log('xxxx');
  //
  //   });
  //
  //   $(this).siblings('.error-msg-tag').text('登録しました'); // doneの後に書いたらエラー。－＞deferred 並列処理ができない！！
  //
  // });


});
