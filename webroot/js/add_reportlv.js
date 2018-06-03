$(function(){
  'use strict';
  console.log(user_id);
  console.log('reportlv');

  $('body').on('click', '.report-lv-box > .add-lv-btn', function(){
    console.log('lv');
    var report_id         = $(this).siblings('.add-lv-report_id').val();
    var to_user_id        = $(this).siblings('.add-lv-user_id').val();
    var lv_report_id      = $(this).siblings('.add-lv-report_id').val();

    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/reports/add_reportlv",
      timeout : 10000,
      data : {
        'user_id' : user_id,
        'report_id' : report_id,

        'to_user_id' : to_user_id,
        'lv_report_id' : lv_report_id,
      },
      dataType : "text",
      success : function(data, status, xhr){
        console.log('success');
      },
      error : function(XMLHttpRequest, textStatus, errorThrown){
        console.log('error');
      }
    }).done(function(){
      console.log('success');
    }).fail(function(data){
      console.log('xxxx');
    });

    $(this).addClass("pushed-btn"); // 並列処理していないことが怖い
    $(this).css('color', 'red');
  });


  // $('.report-lv-box > .add-lv-btn').click(function(){
  //   console.log('lv');
  //   var report_id         = $(this).siblings('.add-lv-report_id').val();
  //   var to_user_id        = $(this).siblings('.add-lv-user_id').val();
  //   var lv_report_id      = $(this).siblings('.add-lv-report_id').val();
  //
  //   $.ajax({
  //     type : "POST",
  //     url : "http://localhost/r9rand6/reports/add_reportlv",
  //     timeout : 10000,
  //     data : {
  //       'user_id' : user_id,
  //       'report_id' : report_id,
  //
  //       'to_user_id' : to_user_id,
  //       'lv_report_id' : lv_report_id,
  //     },
  //     dataType : "text",
  //     success : function(data, status, xhr){
  //       console.log('success');
  //     },
  //     error : function(XMLHttpRequest, textStatus, errorThrown){
  //       console.log('error');
  //     }
  //   }).done(function(){
  //     console.log('success');
  //   }).fail(function(data){
  //     console.log('xxxx');
  //   });
  //
  //   $(this).addClass("pushed-btn"); // 並列処理していないことが怖い
  //   $(this).css('color', 'red');
  // });


});
