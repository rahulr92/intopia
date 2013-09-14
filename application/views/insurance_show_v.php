<?php
?>
<div>

<h1>Imperial Insurance Co.</h1>

<b>Note: All Payments in 000s and <font style="color:red">*</font> = required</b><br><br>
<form method="POST" action="<?php echo base_url('index.php/user_forms/submit_insurance_frm') ?>" >
<table border="1" cellpadding="5">
  <tbody><tr>
    <td>Period<font style="color:red">*</font>:</td>
    <td>Q<?php echo $form->period_id; ?>
       </td>
  </tr>
  <tr>
    <td nowrap="">Company Receiving Cash:</td>
    <td><input type="text" name="company-receiving-cash" value="98" disabled=""></td>
  </tr>
  <tr>
    <td nowrap="">Area Receiving:</td>
    <td><input type="text" name="area-receiving" value="H" disabled=""></td>
  </tr>
  <tr>
    <td nowrap="">Company Sending Cash:</td>
    <td><input type="text" name="company-sending-cash" value="<?php echo $this->session->userdata('teamname'); ?>" disabled=""></td>
  </tr>
  <tr>
    <td nowrap="">Area Sending Money from<font style="color:red">*</font>:</td>
    <td>
      <?php
      $area_sending = array('1' => "US (1)",'2'=>">EC (2)", '3' => "BR (3)", '4' => "Home Office (4)" );
      echo $area_sending[$form->money_area_id];
      ?>
    </td>
  </tr>
  <tr>
    <td nowrap="">Payment Currency in<font style="color:red">*</font>:</td>
    <td>  
      <?php
      $currency = array('1' => "Dollars (1)", '2' => "Euros (2)", '3' => "Reais (3)", '4' => "Francs (4)" );
      echo $currency[$form->payment_currency_id];
      ?>
     </td>
  </tr>
  <tr>
    <td nowrap="">Amount of Payment <b>(in 000s)</b>: </td>
    <td><input type="text" name="amount-of-payment" value="0" id="total_premium" disabled=""></td>
  </tr>
</tbody></table>


<br><br>


<table border="1" cellpadding="5">
  <tbody><tr>
    <td colspan="5">Inventory Insurance Contract</td>
  </tr>
  <tr >
    <td>Area</td>
    <td>Item</td>
    <td>Value in SF <b>(in 000s)</b></td>
    <td>Rate</td>
    <td>Premium</td>
  </tr>
  <tr class="permium_row">
    <td>1 - US</td>
    <td>Inventory</td>
    <td class="inventory_sval">
    		<?php echo $form->us_inventory_sf; ?>          
       </td>
    <td class="rates_val">.02</td>
   <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>2 - EC</td>
    <td>Inventory</td>
    <td class="inventory_sval">
    		<?php echo $form->ec_inventory_sf; ?>
    		</td>
    <td class="rates_val">.02</td>
   <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>3 - BR</td>
    <td>Inventory</td>
    <td class="inventory_sval">
    		<?php echo $form->br_inventory_sf; ?> </td>
    <td class="rates_val">.02</td>
   <td class ="premium_val">0</td>
  </tr>
</tbody></table>



<br><br>



<table border="1" cellpadding="5">
  <tbody><tr>
    <td colspan="5">Plant Insurance Contract</td>
  </tr>
  <tr>
    <td>Area</td>
    <td>Item</td>
    <td># of Plants</td>
    <td nowrap="">Rate <b>(in 000s)</b></td>
    <td>Premium</td>
  </tr>
  <tr>
    <td>1 - US</td>
    <td>Chip Plant</td>
    <td class ="plant_sno">
    		<?php echo $form->us_chip_no; ?>
    	</td>
    <td class ="rates_val">120</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>2 - EC</td>
    <td>Chip Plant</td>
    <td class ="plant_sno">
    		<?php echo $form->ec_chip_no; ?>
    		</td>
    <td  class ="rates_val">100</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>3 - BR</td>
    <td>Chip Plant</td>
    <td class ="plant_sno">
    		<?php echo $form->us_chip_no; ?>
    		</td>
    <td  class ="rates_val">50</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>1 - US</td>
    <td>PC Plant</td>
    <td class ="plant_sno">
    		<?php echo $form->us_pc_no; ?>
    		</td>
    <td  class ="rates_val">100</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>2 - EC</td>
    <td>PC Plant</td>
    <td class ="plant_sno">
    		<?php echo $form->ec_pc_no; ?>
    		</td>
    <td  class ="rates_val">90</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>3 - BR</td>
    <td>PC Plant</td>
    <td class ="plant_sno">
    		<?php echo $form->br_pc_no; ?>
    	</td>
    <td  class ="rates_val">60</td>
    <td class ="premium_val">0</td>
  </tr>
</tbody></table><br><br>


<table border="1" cellpadding="5">
  <tbody>
</tbody></table><br><br>
</form>
</div>
