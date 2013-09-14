<table class="table table-hover">
    <tbody>
        <?php
        $insur_detail_url = base_url('index.php/user_forms/view_insurance/'); 
        $user_id = $this->session->userdata('user_id');

        if(is_array($forms)){
            echo "<h1>Insurance Form List</h1>";
        foreach ($forms as $form ) {
            $date = date('D, M j Y g:i A', strtotime($form->timestamp ));
            $insurance_id = $form->insurance_id;
            echo "<tr";
            echo "><td><a href='$insur_detail_url/$insurance_id'>View form</a></td>
            <td>$date</td>";
            echo "</tr>";
        }
    }
        ?>
        </tbody></table>

<div>

<h1>Submit Insurance Form</h1>
<h2>Imperial Insurance Co.</h2>

<b>Note: All Payments in 000s and <font style="color:red">*</font> = required</b><br><br>
<form method="POST" id="insurance_frm" onsubmit="return validate_insurance_frm();" action="<?php echo base_url('index.php/user_forms/submit_insurance_frm') ?>" >
<table border="1" cellpadding="5">
  <tbody><tr>
    <td>Period<font style="color:red">*</font>:</td>
    <td><select name="period">
    		<option value="Q1" selected="">Q1</option>
    		<option value="Q2">Q2</option>
    		<option value="Q3">Q3</option>
    		<option value="Q4">Q4</option>
    		<option value="Q5">Q5</option>
    		<option value="Q6">Q6</option>
    		<option value="Q7">Q7</option>
    		<option value="Q8">Q8</option>
    		<option value="Q9">Q9</option>
    		<option value="Q10">Q10</option>
    		<option value="Q11">Q11</option>
    		<option value="Q12">Q12</option>
        </select></td>
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
    <td><select name="area-sending">
    		<option value="4" selected="">Home Office (4)</option>
    		<option value="1">US (1)</option>
    		<option value="2">EC (2)</option>
    		<option value="3">BR (3)</option>
        </select></td>
  </tr>
  <tr>
    <td nowrap="">Payment Currency in<font style="color:red">*</font>:</td>
    <td><select name="currency-no">
    		<option value="4" selected="">Francs (4)</option>
    		<option value="1">Dollars (1)</option>
    		<option value="2">Euros (2)</option>
    		<option value="3">Reais (3)</option>
        </select></td>
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
    <td><select name="inventory-sf-value-us" class="inventory_val">
    		<option value="0" selected="">Select Amount</option>
    		<option value="500">500</option>
    		<option value="750">750</option>
    		<option value="1000">1000</option>
    		<option value="1250">1250</option>
    		<option value="1500">1500</option>
    		<option value="1750">1750</option>
    		<option value="2000">2000</option>
    		<option value="2250">2250</option>
    		<option value="2500">2500</option>
    		<option value="2750">2750</option>
    		<option value="3000">3000</option>
    		<option value="3250">3250</option>
    		<option value="3500">3500</option>
    		<option value="3750">3750</option>
    		<option value="4000">4000</option>
    		<option value="4250">4250</option>
    		<option value="4500">4500</option>
    		<option value="4750">4750</option>
    		<option value="5000">5000</option>
    		<option value="5250">5250</option>
    		<option value="5500">5500</option>
    		<option value="5750">5750</option>
    		<option value="6000">6000</option>
        </select></td>
    <td class="rates_val">.02</td>
   <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>2 - EC</td>
    <td>Inventory</td>
    <td><select name="inventory-sf-value-ec" class="inventory_val">
    		<option value="0" selected="">Select Amount</option>
    		<option value="500">500</option>
    		<option value="750">750</option>
    		<option value="1000">1000</option>
    		<option value="1250">1250</option>
    		<option value="1500">1500</option>
    		<option value="1750">1750</option>
    		<option value="2000">2000</option>
    		<option value="2250">2250</option>
    		<option value="2500">2500</option>
    		<option value="2750">2750</option>
    		<option value="3000">3000</option>
    		<option value="3250">3250</option>
    		<option value="3500">3500</option>
    		<option value="3750">3750</option>
    		<option value="4000">4000</option>
    		<option value="4250">4250</option>
    		<option value="4500">4500</option>
    		<option value="4750">4750</option>
    		<option value="5000">5000</option>
    		<option value="5250">5250</option>
    		<option value="5500">5500</option>
    		<option value="5750">5750</option>
    		<option value="6000">6000</option>
        </select></td>
    <td class="rates_val">.02</td>
   <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>3 - BR</td>
    <td>Inventory</td>
    <td><select name="inventory-sf-value-br" class="inventory_val">
    		<option value="0" selected="">Select Amount</option>
    		<option value="500">500</option>
    		<option value="750">750</option>
    		<option value="1000">1000</option>
    		<option value="1250">1250</option>
    		<option value="1500">1500</option>
    		<option value="1750">1750</option>
    		<option value="2000">2000</option>
    		<option value="2250">2250</option>
    		<option value="2500">2500</option>
    		<option value="2750">2750</option>
    		<option value="3000">3000</option>
    		<option value="3250">3250</option>
    		<option value="3500">3500</option>
    		<option value="3750">3750</option>
    		<option value="4000">4000</option>
    		<option value="4250">4250</option>
    		<option value="4500">4500</option>
    		<option value="4750">4750</option>
    		<option value="5000">5000</option>
    		<option value="5250">5250</option>
    		<option value="5500">5500</option>
    		<option value="5750">5750</option>
    		<option value="6000">6000</option>
        </select></td>
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
    <td><select name="chip-plants-us" class ="plant_no">
    		<option value="0" selected="">Select Amount</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>
    		<option value="8">8</option>
    		<option value="9">9</option>
    		<option value="10">10</option>
    		<option value="11">11</option>
    		<option value="12">12</option>
    		<option value="13">13</option>
    		<option value="14">14</option>
    		<option value="15">15</option>
    		<option value="16">16</option>
    		<option value="17">17</option>
    		<option value="18">18</option>
        </select></td>
    <td class ="rates_val">120</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>2 - EC</td>
    <td>Chip Plant</td>
    <td><select name="chip-plants-ec" class ="plant_no">
    		<option value="0" selected="">Select Amount</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>
    		<option value="8">8</option>
    		<option value="9">9</option>
    		<option value="10">10</option>
    		<option value="11">11</option>
    		<option value="12">12</option>
    		<option value="13">13</option>
    		<option value="14">14</option>
    		<option value="15">15</option>
    		<option value="16">16</option>
    		<option value="17">17</option>
    		<option value="18">18</option>
        </select></td>
    <td  class ="rates_val">100</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>3 - BR</td>
    <td>Chip Plant</td>
    <td><select name="chip-plants-br" class ="plant_no">
    		<option value="0" selected="">Select Amount</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>
    		<option value="8">8</option>
    		<option value="9">9</option>
    		<option value="10">10</option>
    		<option value="11">11</option>
    		<option value="12">12</option>
    		<option value="13">13</option>
    		<option value="14">14</option>
    		<option value="15">15</option>
    		<option value="16">16</option>
    		<option value="17">17</option>
    		<option value="18">18</option>
        </select></td>
    <td  class ="rates_val">50</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>1 - US</td>
    <td>PC Plant</td>
    <td><select name="pc-plants-us" class ="plant_no">
    		<option value="0" selected="">Select Amount</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>
    		<option value="8">8</option>
    		<option value="9">9</option>
    		<option value="10">10</option>
    		<option value="11">11</option>
    		<option value="12">12</option>
    		<option value="13">13</option>
    		<option value="14">14</option>
    		<option value="15">15</option>
    		<option value="16">16</option>
    		<option value="17">17</option>
    		<option value="18">18</option>
        </select></td>
    <td  class ="rates_val">100</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>2 - EC</td>
    <td>PC Plant</td>
    <td><select name="pc-plants-ec" class ="plant_no">
    		<option value="0" selected="">Select Amount</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>
    		<option value="8">8</option>
    		<option value="9">9</option>
    		<option value="10">10</option>
    		<option value="11">11</option>
    		<option value="12">12</option>
    		<option value="13">13</option>
    		<option value="14">14</option>
    		<option value="15">15</option>
    		<option value="16">16</option>
    		<option value="17">17</option>
    		<option value="18">18</option>
        </select></td>
    <td  class ="rates_val">90</td>
    <td class ="premium_val">0</td>
  </tr>
  <tr>
    <td>3 - BR</td>
    <td>PC Plant</td>
    <td><select name="pc-plants-br" class ="plant_no">
    		<option value="0" selected="">Select Amount</option>
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    		<option value="4">4</option>
    		<option value="5">5</option>
    		<option value="6">6</option>
    		<option value="7">7</option>
    		<option value="8">8</option>
    		<option value="9">9</option>
    		<option value="10">10</option>
    		<option value="11">11</option>
    		<option value="12">12</option>
    		<option value="13">13</option>
    		<option value="14">14</option>
    		<option value="15">15</option>
    		<option value="16">16</option>
    		<option value="17">17</option>
    		<option value="18">18</option>
        </select></td>
    <td  class ="rates_val">60</td>
    <td class ="premium_val">0</td>
  </tr>
</tbody></table><br><br>


<table border="1" cellpadding="5">
  <tbody><tr>
    <td>
    
    Imperial Insurance agrees to provide indemnity of 80% of the balance sheet value lost due to fire, theft, or water damage for an 

annual premium of 2% of the amount insured.  Coverage is available only in multiples of SF 250,000 beginning at SF 500,000.  

Insurance coverage is for 1 year.  In case of loss, payment will be made TO THE AFFECTED AREA IN SWISS FRANCS.  The 

undersigned herewith insures inventory(ies) of the value indicated above.<br><br>

Imperial Insurance agrees to provide indemnity of 80% of the DEPRECIATED plant value in case of total destruction, or PRO 

RATA indemnity  for partial destruction due to fire, flood, rain, or wind damage.  Insurance for partial destruction is paid only

if actual repair to bring the plant to maximum possible effectiveness is undertaken and paid for by the insured company.  Losses 

due to civil riot and/or acts of God are not insurable.   Business interruption insurance is not available.  Plant losses for factories 

under construction are covered by contractors.  Insurance coverage is fore 1 year.  Renewal notices will NOT be sent.  In case 

of loss, payment will be made TO THE AFFECTED AREA IN SWISS FRANCS.  The undersigned herewith insures the above 

factory(ies).
    
    </td>
  </tr>
</tbody></table><br><br>

<table border="1" cellpadding="5">
  <tbody><tr>
    <td>Check box to electronically sign this insurance form as the <?php echo $this->session->userdata('teamname'); ?>'s President<font style="color:red">*</font>:</td>
    <td><input type="checkbox" id="esign" name="e-signature"></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" class="btn btn-default" value="Submit Insurance Purchase Agreement"></td>
  </tr>
</tbody></table>
</form>
</div>
