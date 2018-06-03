$(function(){
  'use strict';

  console.log('add_taghv_ok');

  $(document).on('click', '.tag-hv-box > .add-hv-btn', function(){
    console.log('taghv');
    var tag_id         = $(this).siblings('.add-hv-tag_id').val();
    var to_user_id     = $(this).siblings('.add-hv-user_id').val();
    var hv_tag_id      = $(this).siblings('.add-hv-tag_id').val();

    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/reports/add_taghv",
      timeout : 10000,
      data : {
        'user_id' : user_id,
        'tag_id' : tag_id,

        'to_user_id' : to_user_id,
        'hv_tag_id' : hv_tag_id
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


});
