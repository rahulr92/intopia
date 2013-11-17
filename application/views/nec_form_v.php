<br/>
<button class="btn btn-default" id="apply_nec_btn">Submit an  NEC Purchase Agreement</button>
<div id="apply_nec_frm" class="">
<h1>NEC Form H6N</h1>

<b>Note: <font style="color:red;">*</font> = required</b><br /><br />
<table border="1" cellpadding="5">
  <tr>
    <form method="POST" id="nec_frm" onsubmit="return validate_nec_frm();" action="<?php echo base_url('index.php/user_forms/submit_nec_frm') ?>" >
<table border="1" cellpadding="5">
    <td>Current Period<font style="color:red;">*</font>:</td>
    <td><select name="period">
        <option value="left blank" selected="selected">Select Period</option>
           <option value="1">Q1</option>
        <option value="2">Q2</option>
        <option value="3">Q3</option>
        <option value="4">Q4</option>
        <option value="5">Q5</option>
        <option value="6">Q6</option>
        <option value="7">Q7</option>
        <option value="8">Q8</option>
        <option value="9">Q9</option>
        <option value="10">Q10</option>
        <option value="11">Q11</option>
        <option value="12">Q12</option>
        </select></td>
  </tr>
  <tr  class="hidden">
    <td>Period to Execute:</td>
    <td><select name="period-executed">
        <option value="0" selected="selected">now</option>
           <option value="1">Q1</option>
        <option value="2">Q2</option>
        <option value="3">Q3</option>
        <option value="4">Q4</option>
        <option value="5">Q5</option>
        <option value="6">Q6</option>
        <option value="7">Q7</option>
        <option value="8">Q8</option>
        <option value="9">Q9</option>
        <option value="10">Q10</option>
        <option value="11">Q11</option>
        <option value="12">Q12</option>
        </select></td>
  </tr>
  <tr>
    <td>Seller Company:</td>
    <td>98</td>
  </tr>
  <tr>
    <td>Buyer Company:</td>
    <td><?php echo $this->session->userdata('teamname').' ('.$this->session->userdata('teamno').')'; ?></td>
  </tr>
  <tr>
    <td nowrap="nowrap">Area goods transferred FROM<font style="color:red;">*</font>:</td>
    <td><select name="area-from">
        <option value="left blank" selected="selected">Select Area</option>
        <option value="1">US (1)</option>
        <option value="2">EC (2)</option>
        <option value="3">BR (3)</option>
        </select></td>
  </tr>
  <tr>
    <td>Area goods transferred TO<font style="color:red;">*</font>:</td>
    <td><select name="area-to">
        <option value="left blank" selected="selected">Select Area</option>
        <option value="1">US (1)</option>
        <option value="2">EC (2)</option>
        <option value="3">BR (3)</option>
        </select></td>
  </tr>
  <tr>
    <td>Product Sold (X or Y)<font style="color:red;">*</font>:</td>
    <td><select name="product-sold">
        <option value="left blank" selected="selected">Select One</option>
        <option value="X">X</option>
        <option value="Y">Y</option>
        </select></td>
  </tr>
  <tr>
    <td>Seller's Grade Number<font style="color:red;">*</font>:</td>
    <td><select name="grade-number">
        <option value="left blank" selected="selected">Select One</option>
        <option value="0">Grade 0</option>
        <option value="1">Grade 1</option>
        <option value="2">Grade 2</option>
        <option value="3">Grade 3</option>
        <option value="4">Grade 4</option>
        <option value="5">Grade 5</option>
        <option value="6">Grade 6</option>
        <option value="7">Grade 7</option>
        <option value="8">Grade 8</option>
        <option value="9">Grade 9</option>
        </select></td>
  </tr>
  <tr>
    <td>Units Transferred <b>(in 000s)</b> <font style="color:red;">*</font>:</td>
    <td><input type="text" name="unit-quantity" style="width:50px;" /></td>
  </tr>
  <tr>
    <td>Currency:</td>
    <td><select name="nec-currency-no">
        <option value="4" selected="selected">Francs (4)</option>
        <option value="1">Dollars (1)</option>
        <option value="2">Euros (2)</option>
        <option value="3">Reais (3)</option>
        </select></td>
  </tr>
  <tr>
    <td>Unit Price<font style="color:red;">*</font>:</td>
    <td><input type="text" name="unit-price" style="width:50px;" /></td>
  </tr>
  <tr>
    <td colspan="2"><b>Amount of Payment</b>: </td>
  </tr>
  <tr>
    <td style="text-align:right;">Cash<font style="color:red;">*</font>:</td>
    <td><input type="text" name="cash-payment" value="100" style="width:50px;" />%</td>
  </tr>
  <tr>
    <td style="text-align:right;">A/P1:</td>
    <td><input type="text" name="ap1" style="width:50px;" />%</td>
  </tr>
  <tr>
    <td style="text-align:right;">A/P2:</td>
    <td><input type="text" name="ap2" style="width:50px;" />%</td>
  </tr>
  <tr>
    <td>Conversion of Cash Part:</td>
    <td><select name="cash-converted">
        <option value="0" selected="selected">No</option>
        <option value="1">Yes</option>
        </select></td>
  </tr>
  <tr>
    <td>Air (A) or Surface (S) Freight:</td>
    <td><select name="freight">
        <option value="Surface (S)" selected="selected">Surface (S)</option>
        <option value="Air (A)">Air (A)</option>
        </select></td>
  </tr>
</table>


<br /><br />


<table border="1" cellpadding="5">
  <tr>
    <td><b>If this order is to be delivered by air freight, the difference between<br />air freight and surface must be added to the NIPPON price.</b></td>
  </tr>
</table><br /><br />

<table border="1" cellpadding="5">
  <tr>
    <td nowrap="nowrap">Check box to electronically sign this Purchase Order Agreement as the <?php echo $this->session->userdata('teamname'); ?>'s President<font style="color:red;">*</font>:</td>
    <td><input type="checkbox" name="e-signature-nec" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" class="btn btn-default" value="Submit NEC Purchase Agreement" /></td>
  </tr>
</table>
</div>

<table class="table table-hover text-center">
    <tbody>
       
        <?php
        $nec_detail_url = base_url('index.php/user_forms/view_nec/'); 
        $user_id = $this->session->userdata('user_id');

        if(is_array($forms)){
            echo "<h1>NEC Purchase Agreement List</h1>
             <thead>
                <tr>
                  <th>Period Applied In</th>
                  <th>NEC Purchase Agreement</th>
                   <th  class='hidden'>When to execute</th>
                  <th>Submitted Time</th>
                </tr>
              </thead>
              ";

        foreach ($forms as $form ) {
            $date = date('D, M j Y g:i A', strtotime($form->timestamp ));
            $nec_id = $form->nec_id;
            $curr_period = $form->current_period_id;
            $exec_period = ($form->exe_period_id==0)?"Now": "Q$form->exe_period_id";
            echo "<tr>";
            echo "<td>Q$curr_period</td>";
            echo "<td><a href='$nec_detail_url/$nec_id'>View Agreement</a></td>
                  <td  class='hidden'>$exec_period</td>
                  <td>$date</td>";
            echo "</tr>";
        }
    }
        ?>
        </tbody></table>