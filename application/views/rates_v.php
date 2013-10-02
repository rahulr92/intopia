<div id="rates">
<h1>Change Insurance rates</h1>
<br/>

<form method="POST" id="insurance_frm"  action="<?php echo base_url('index.php/user_forms/update_rates') ?>" >
<select id="rate-select" name='quarter_id'>
<option value="0" selected="">Select Period</option>
<?php 
foreach ($rates as $rate) {
	echo  "<option value='$rate->quarter_id'  
	data-us_inven_rt='$rate->us_inven_rt'
	data-us_chip_rt='$rate->us_chip_rt'
	data-us_pc_rt='$rate->us_pc_rt'
	data-ec_inven_rt='$rate->ec_inven_rt'
	data-ec_chip_rt='$rate->ec_chip_rt'
	data-ec_pc_rt='$rate->ec_pc_rt'
	data-br_inven_rt='$rate->br_inven_rt'
	data-br_chip_rt='$rate->br_chip_rt'
	data-br_pc_rt='$rate->br_pc_rt'

	>Q$rate->quarter_id</option>";
	# code...
}
?>
  	</select>
<table  cellpadding="5">
	<thead>
<tr>
	<th>Country</th>
	<th>invenory Rates</th>
	<th>Chip Plant Rates</th>
	<th>PC Plant Rates</th>
</tr>
	</thead>
  <tbody>
  <tr>
  	<td>US</td>
    <td  class =""><input type="text" name="us_inven_rt" value=""></td>
    <td  class =""><input type="text" name="us_chip_rt" value=""></td>
    <td  class =""><input type="text"  name="us_pc_rt" value=""></td>
  </tr>
  <tr>
   	<td>EC</td>
    <td  class =""><input type="text" name="ec_inven_rt" value=""></td>
    <td  class =""><input type="text" name="ec_chip_rt" value=""></td>
    <td  class =""><input type="text"  name="ec_pc_rt" value=""></td>
  </tr>
  <tr>
   	<td>BR</td>
    <td  class =""><input type="text" name="br_inven_rt" value=""></td>
    <td  class =""><input type="text" name="br_chip_rt" value=""></td>
    <td  class =""><input type="text"  name="br_pc_rt" value=""></td>
  </tr>

    <td colspan="2"><input type="submit" class="btn btn-default" value="Update Rates"></td>
  </tr>
</tbody></table>
</form>


</div>