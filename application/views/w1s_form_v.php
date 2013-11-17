<br/>
<button class="btn btn-default" id="apply_w1s_btn">Submit a W1s Form</button>
<div id="apply_w1s_frm" class="">
<h1>W1s Form</h1>
<table border="1" cellpadding="5">
  <tr>
    <form method="POST" id="w1s_frm" onsubmit="return validate_w1s_frm();" action="<?php echo base_url('index.php/user_forms/submit_w1s_frm') ?>" >
<table border="1" cellpadding="5">
    <td>Period:</td>
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
  <tr>
    <td>Receiving Company:</td>
    <td><?php echo $this->session->userdata('teamname').' ('.$this->session->userdata('teamno').')'; ?></td>
  </tr>
    <tr>
    <td nowrap="nowrap">Area Receiving:</td>
    <td><select name="area-to">
        <option value="left blank" selected="selected">Select Area</option>
        <option value="1">US (1)</option>
        <option value="2">EC (2)</option>
        <option value="3">BR (3)</option>
        <option value="4">Home Office (4)</option>
        </select></td>
  </tr>
  <tr>
    <td>Sending Company:</td>
    <td><select name="sending_team">
    <?php 
    foreach ($teams as $team)
    {
        echo "<option value=$team->user_id>$team->teamname</option>";
    }
     ?>
        </select></td>
  </tr>
  <tr>
    <td>Area Sending:</td>
    <td><select name="area-from">
        <option value="left blank" selected="selected">Select Area</option>
        <option value="1">US (1)</option>
        <option value="2">EC (2)</option>
        <option value="3">BR (3)</option>
        <option value="4">Home Office (4)</option>
        </select></td>
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
    <td>Amount of Payment: </td>
    <td><input type="text" name="amount"/></td>
  </tr>
    <tr>
    <td>Special Instructions</td>
    <td><textarea name="special_ins" rows="3" column="10"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" class="btn btn-default" value="Submit W1s Form"></td>
  </tr>
</table>
</div>

<table class="table table-hover text-center">
    <tbody>
       
        <?php
        $w1s_detail_url = base_url('index.php/user_forms/view_w1s/'); 
        $user_id = $this->session->userdata('user_id');

        if(is_array($forms)){
            echo "<h1>W1s Form List</h1>
             <thead>
                <tr>
                  <th>Period Applied In</th>
                  <th>W1s Form</th>
                   <th  class='hidden'>When to execute</th>
                  <th>Submitted Time</th>
                </tr>
              </thead>
              ";

        foreach ($forms as $form ) {
            $date = date('D, M j Y g:i A', strtotime($form->timestamp ));
            $w1s_id = $form->w1s_id;
            $period = $form->period_id;
            echo "<tr>";
            echo "<td>Q$period</td>";
            echo "<td><a href='$w1s_detail_url/$w1s_id'>View Form</a></td>
                  <td>$date</td>";
            echo "</tr>";
        }
    }
        ?>
        </tbody></table>