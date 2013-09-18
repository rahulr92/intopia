 </br>
   <?php      
   if ($this->session->userdata('username') === "admin@intopia.com")
        $insur_url = base_url('index.php/user_forms/admin/nec'); 
    else        
         $insur_url = base_url('index.php/user_forms/nec'); 
        echo "<a href='$insur_url'>Back to NEC Agreement listing page</a>";
        $date = date('D, M j Y g:i A', strtotime($form->timestamp ));
?>
<div>
<h1>NEC Form H6N</h1>
<span>Submitted on <?php echo $date; ?></span>
</br></br>
<table border="1" cellpadding="5">
  <tr>
    <form method="POST" id="nec_frm" onsubmit="return validate_nec_frm();" action="<?php echo base_url('index.php/user_forms/submit_nec_frm') ?>" >
<table border="1" cellpadding="5">
    <td>Current Period<font style="color:red;">*</font>:</td>
    <td>Q<?php echo $form->current_period_id; ?></td>
  </tr>
  <tr>
    <td>Period to Execute:</td>
    <td><?php echo($form->exe_period_id==0)?"Now": "Q$form->exe_period_id"; ?></td>
  </tr>
  <tr>
    <td>Seller Company:</td>
    <td>98</td>
  </tr>
  <tr>
    <td>Buyer Company:</td>
    <td><?php echo $this->Model->get_teamname($form->user_id); ?></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Area goods transferred FROM<font style="color:red;">*</font>:</td>
    <td><?php   
    $area_sending = array('1' => "US (1)",'2'=>"EC (2)", '3' => "BR (3)" );
    echo $area_sending[$form->area_from_id] ?>
  </td>
  </tr>
  <tr>
    <td>Area goods transferred TO<font style="color:red;">*</font>:</td>
    <td>
     <?php   
    $area_sending = array('1' => "US (1)",'2'=>"EC (2)", '3' => "BR (3)" );
    echo $area_sending[$form->area_to_id] 
    ?> 
    </td>
  </tr>
  <tr>
    <td>Product Sold (X or Y)<font style="color:red;">*</font>:</td>
    <td>
    <?php
    echo $form->prod_sold;
    ?>
  </td>
  </tr>
  <tr>
    <td>Seller's Grade Number<font style="color:red;">*</font>:</td>
    <td>    
      <?php
    echo "Grade $form->seller_grade_id";
    ?></td>
  </tr>
  <tr>
    <td>Units Transferred <b>(in 000s)</b> <font style="color:red;">*</font>:</td>
    <td>
    <?php
    echo $form->unit_quantity;
    ?>
    </td>
  </tr>
  <tr>
    <td>Currency:</td>
    <td>
      <?php
      $currency = array('1' => "Dollars (1)", '2' => "Euros (2)", '3' => "Reais (3)", '4' => "Francs (4)" );
      echo $currency[$form->currency_id];

    ?>
  </td>
  </tr>
  <tr>
    <td>Unit Price<font style="color:red;">*</font>:</td>
    <td>
    <?php
    echo $form->unit_price;
    ?>
    </td>
  </tr>
  <tr>
    <td colspan="2"><b>Amount of Payment</b>: </td>
  </tr>
  <tr>
    <td style="text-align:right;">Cash<font style="color:red;">*</font>:</td>
    <td>    
      <?php
    echo $form->cash_payment;
    ?>%</td>
  </tr>
  <tr>
    <td style="text-align:right;">A/P1:</td>
    <td>
      <?php
    echo $form->ap1_amt;
    ?>
    %</td>
  </tr>
  <tr>
    <td style="text-align:right;">A/P2:</td>
    <td>    
      <?php
    echo $form->ap2_amt;
    ?>
    %</td>
  </tr>
  <tr>
    <td>Conversion of Cash Part:</td>
    <td>
    <?php
    echo ($form->conversion == 1)?"Yes":"No";
    ?>
  </td>
  </tr>
  <tr>
    <td>Air (A) or Surface (S) Freight:</td>
    <td>
     <?php
    echo $form->freight_type;
    ?>
  </td>
  </tr>
</table>


<br /><br />


<table border="1" cellpadding="5">
  <tr>
    <td><b>If this order is to be delivered by air freight, the difference between<br />air freight and surface must be added to the NIPPON price.</b></td>
  </tr>
</table><br /><br />

</div>

