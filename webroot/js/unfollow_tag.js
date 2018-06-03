$(function(){
  'use strict';

  console.log('unfollow_ok');

  $(document).on('click', '.unfollow-btn', function(){
    console.log('unfollow');
    var follower_id = user_id;
    var tag_body    = $('.tag-status-body').text();
    console.log(follower_id);
    console.log(tag_body);

    // Ajax
    $.ajax({
      type : "POST",
      url : "http://localhost/r9rand6/users/unfollow_tag",
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
      $(".unfollow-btn").remove();
      $('.tag-status-bar').append(data);

    }).fail(function(jqXHR, textStatus, errorThrown) {
      console.log("XMLHttpRequest : " + jqXHR.status);
      console.log("textStatus : " + textStatus);
      console.log("errorThrown : " + errorThrown);
    });
  });
});
