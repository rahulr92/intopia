 </br>
   <?php 
//echo $form->w1s_id." receiving =to=".$form->area_to_id." sending=from=".$form->area_from_id     ;
   if ($this->session->userdata('username') === "admin@intopia.com")
        $insur_url = base_url('index.php/user_forms/admin/w1s'); 
    else        
         $insur_url = base_url('index.php/user_forms/w1s'); 
        echo "<a href='$insur_url'>Back to W1s Form listing page</a>";
        $date = date('D, M j Y g:i A', strtotime($form->timestamp ));
?>
<div>
<h1>Q<?php echo $form->period_id; ?> W1s Form</h1>
<span>Submitted on <?php echo $date; ?></span>
<table border="1" cellpadding="5">
  <tbody><tr>
    <td>Period:</td>
    <td>Q<?php echo $form->period_id; ?>
       </td>
  </tr>
  <tr>
    <td nowrap="">Company Receiving:</td>
    <td><?php echo $this->Model->get_teamname($form->user_id).' ('.$form->user_id.')'; ?></td>

  </tr>
  <tr>
    <td nowrap="">Area Receiving:</td>
      <td>
      <?php
      $area_sending = array('1' => "US (1)",'2'=>"EC (2)", '3' => "BR (3)", '4' => "Home Office (4)" );
      echo @$area_sending[$form->area_to_id];
      ?>
    </td>
  </tr>
  <tr>
    <td nowrap="">Company Sending:</td>
    <td><?php echo $this->Model->get_teamname($form->sending_user_id).' ('.$form->sending_user_id.')'; ?></td>
  </tr>
  <tr>
    <td nowrap="">Area Sending:</td>
    <td>
      <?php
      
      echo @$area_sending[$form->area_from_id];
      ?>
    </td>
  </tr>
  <tr>
    <td nowrap="">Currency:</td>
    <td>  
      <?php
      $currency = array('1' => "Dollars (1)", '2' => "Euros (2)", '3' => "Reais (3)", '4' => "Francs (4)" );
       echo @$currency[$form->currency_id];
      ?>
     </td>
  </tr>
  <tr>
    <td nowrap="">Amount:</td>
    <td><?php  echo $form->amount; ?></td>
  </tr>
      <tr>
    <td>Special Instructions</td>
    <td><textarea name="special_ins" rows="3" column="10"><?php
      
      echo $form->special_ins;
      ?></textarea></td>
  </tr>
</tbody></table>

<table border="1" cellpadding="5">
  <tbody>
</tbody></table><br><br>
</div>