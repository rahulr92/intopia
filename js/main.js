$(function() {
     $('.reply_frm').hide();
     $('.desc').hide();

    });

$('.reply_btn').click( function(){
  $(this).siblings('.reply_frm').toggle();
});
$('.desc_btn').click( function(){
  $(this).siblings('.desc').toggle();
});
$('.for_sale').click( function(){
  $(this).siblings('.type1').toggle();
});
$('.wanted').click( function(){
  $(this).siblings('.type2').toggle();
});
$('.all_btn').click( function(){
  $(this).siblings('.type1').show();
  $(this).siblings('.type2').show();
});



$(function() {
     $('.hide_closed').click(function(){
 		$('.Closed').toggle();
     });
    });

$(function() {
     $('.type-select').click(function(){
    var type1 = $(this).val();
    console.log(type1);
    var quar =   $(this).data('quarter');
        console.log($('.post_row[data-quarter="'+quar+'"][data-type="'+type1+'"]').length);
        if(type1=='All'){
          $('.post_row[data-quarter="'+quar+'"]').show();
        } else{
     $('.post_row[data-quarter="'+quar+'"][data-type="'+type1+'"]').show();
    $('.post_row[data-quarter="'+quar+'"][data-type!="'+type1+'"]').hide();
        }
           
    // $('.post_row[data-quarter="'+quar+'"]:not[data-type="'+type1+'"]').hide();
     });
    });

$(function() {
     $('.status-select').click(function(){
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
     $('.post_row').click(function(){
      //console.log(window.user_id);
      var post_id= $(this).data('postid');
      var post_user_id= $(this).data('postuserid');
      var post_desc =  desc[post_id];
      var post_title = $(this).data('title');
       $('#modal-title').html(post_title);
          $('#modal-desc').html(post_desc);
          $('#user_id').val(window.user_id);
          $('#post_user_id').val(post_user_id);
           $('#post_id').val(post_id);
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