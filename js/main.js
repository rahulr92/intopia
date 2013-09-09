$(function() {
     $('.reply_frm').hide();
     $('.desc').hide();

    });


$('.for_sale').change( function(){
  $(this).siblings('.type1').toggle();
});
$('.wanted').change( function(){
  $(this).siblings('.type2').toggle();
});
$('.all_btn').change( function(){
  $(this).siblings('.type1').show();
  $(this).siblings('.type2').show();
});



$(function() {
     $('.hide_closed').click(function(){
 		$('.Closed').toggle();
     });
    });

$(function() {
     $('.type-select').change(function(){
    var type1 = $(this).val();
    console.log(type1);
    var quar =   $(this).data('quarter');
        if(type1=='All'){
          $('.post_row[data-quarter="'+quar+'"]').removeClass('hide');
        } else{
     $('.post_row[data-quarter="'+quar+'"][data-type="'+type1+'"]').removeClass('hide');
    $('.post_row[data-quarter="'+quar+'"][data-type!="'+type1+'"]').addClass('hide');
        }
           
    // $('.post_row[data-quarter="'+quar+'"]:not[data-type="'+type1+'"]').hide();
     });
    });

$(function() {
     $('.status-select').change(function(){
    var status = $(this).val();
    var quar =   $(this).data('quarter');
        console.log($('.post_row[data-quarter="'+quar+'"][data-status="'+status+'"]').length);
        if(status=='All'){
          $('.post_row[data-quarter="'+quar+'"]').show();
        } else{
     $('.post_row[data-quarter="'+quar+'"][data-status="'+status+'"]').show();
    $('.post_row[data-quarter="'+quar+'"][data-status!="'+status+'"]').hide();
        }
           
    // $('.post_row[data-quarter="'+quar+'"]:not[data-type="'+type1+'"]').hide();
     });
    });




$(function() {
     $('.post_title').click(function(){
      //console.log(window.user_id);
      var post_id= $(this).data('postid');
      var post_user_id= $(this).data('postuserid');
      var post_desc =  window.desc[post_id];
      var post_title = $(this).html();
       $('#modal-title').html(post_title);
          $('#modal-desc').html(post_desc);
          $('#user_id').val(window.user_id);
          $('#post_user_id').val(post_user_id);
           $('.post_id').val(post_id);
           if($(this).data('status')=='Closed')
           {
            $('#status_btn').val('Reopen post');
            $('#status_toggle_flag').val('1');
           }
           if(window.user_id == post_user_id)
           {
            $('.non_owner').hide();
            $('.owner').show();
           }
           else{
            $('.non_owner').show();
            $('.owner').hide();
           }
    $('#myModal').modal('show');
     });
    });

function reply_sent(){
	alert("Reply sent successfully!");
}

function timestamp_to_date(arg){
 var t = arg.split(/[- :]/);
  var d = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
return d;}

$(function() {
$("#register_frm").submit(function() {
    if ($('#password').val()!=$('#cpassword').val()) {
         alert("Passwords dont match!"); 
          $('#password').val("");
          $('#cpassword').val("");
          return false;
         
        }
    });
});


$(function() {
$("#delete_post_frm").submit(function() {
    if (!confirm("Are you sure you want to delete this post?")) {
          return false;
    }
});
    });


$(function() {

   $("#title").popover({ title: 'Step1', content: 'Enter a relevent title' , trigger:'focus'});
   $("#desc").popover({ title: 'Step2', content: 'Enter a brief description', trigger:'focus' });
      $("#post_type").popover({ title: 'Step3', content: 'Select the type of post', trigger:'focus' });
         $("#post_period").popover({ title: 'Step4', content: 'Select the quarter to which you want to post', trigger:'focus' });
            $("#post_visib").popover({ title: 'Step5', content: 'Choose your post visibility', trigger:'hover' });
$("#post_period").blur(function(){
  $('#post_visib').popover('show');
});
 $("#title").focus();


  
});


$('#anony_flag').click(function(){
 if($('#anony_flag').is(':checked')){
      $('.team_check').attr('checked', false);
  $("input[name=full_visibility]").attr('checked', false);
 }
});

$('.team_check').click(function(){
 if($(this).is(':checked')){
 $('#anony_flag').attr('checked', false);
  $('input[name=full_visibility]').attr('checked', false);
}
});

$('input[name=full_visibility]').click(function(){
 if($(this).is(':checked')){
 $('#anony_flag').attr('checked', false);
   $('.team_check').attr('checked', false);
}
});