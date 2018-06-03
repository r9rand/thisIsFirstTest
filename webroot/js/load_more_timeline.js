$(function() {
  console.log('moreTimelineTest');
  console.log('page is' + page);

  function more() {
    console.log(user_id);
    console.log(page);
    $.ajax({
      type : "GET",
      url: "http://localhost/r9rand6/reports/more_timeline",
      data : {
        'page' : page,
        'user_id' : user_id,
      },
      dataType : "text",
    }).done(function(data, textStatus, jqXHR){
      page++;
      console.log('NOW　page is' + page);
      $("#hoge").append(data).hide().fadeIn(800);
      // $('#hoge').remove();
    });
  }

  $(window).scroll(function() {
    if ($(window).scrollTop() + window.innerHeight == $(document).height()) {
    // if ($(window).scrollTop()+$(window).height() == $("#hoge").offset().top) {
      console.log('load_more_timeline!');
      more();
    }
  });


  // $('#more_list').click(function(){
  //   var user_id = 9;
  //
  //   });

});
