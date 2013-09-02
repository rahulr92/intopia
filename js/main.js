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



function reply_sent(){
	alert("Reply sent successfully!");
}