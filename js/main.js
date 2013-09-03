$(function() {
     $('.reply_frm').hide();
     $('.desc1').hide();
    });

$('.reply_btn').click( function(){
  $(this).siblings('.reply_frm').toggle();
});
$('.desc_btn').click( function(){
  $(this).siblings('.desc').toggle();
});


function reply_sent(){
	alert("Reply sent successfully!");
}