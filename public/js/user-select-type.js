$(document).on('click','#employer_select', function(){
  var url      = window.location.href;
  var pathArray = window.location.pathname.split( '/' );
  var user_id = pathArray[3];
   //console.log(pathArray[3]);
 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
$.ajax({
    url: APP_URL +'/admin/userclient/'+ user_id +'/add-employer',
    type: "GET", 
    success: function(data){
      $data = $(data);
       // console.log(data.view);
      $(".content").fadeOut().html(data.view).fadeIn();   
      $(".box-body").css({"background":"rgba(135, 184, 218, 0.65)"});
      // $('.next-form').attr('action', 'http://uri-for-button1.com'); 
      }
  });
});

$(document).on('click','#individual_select', function(){
  var url      = window.location.href;
  var pathArray = window.location.pathname.split( '/' );
  var user_id = pathArray[3];

  //location.reload();
$.ajax({
    url: APP_URL + '/admin/userclient/'+user_id+'/add_client',
    type: "GET", 
    success: function(data){
      $data = $(data); 
      console.log(data);
      $('body').html('');
      // $('.content').html($(data).find('.content').html());
      // $( ".content" ).load( ".content" );
      $('body').fadeOut().html(data).fadeIn();  
      $(".box-body").css({"background":"rgba(77, 78, 78, 0.56)","color":"#fff"});
      }
  });
});