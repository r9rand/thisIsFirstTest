$(function(){
  'use strict';

  console.log('follow_ok');

  $(document).on('click', '.follow-btn', function(){
    console.log('follow');
    var follower_id = user_id;
    var tag_body    = $('.tag-status-body').text();
    console.log(follower_id);
    console.log(tag_body);

    // Ajax
    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/users/follow_tag",
      timeout : 10000,
      data : {
        'follower_id' : follower_id,
        'tag_body' : tag_body,
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
      console.log('OOOO');
      $(".follow-btn").remove();
      $('.tag-status-bar').append(data);

    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log("XMLHttpRequest : " + jqXHR.status);
      console.log("textStatus : " + textStatus);
      console.log("errorThrown : " + errorThrown);
    });
  });
});
