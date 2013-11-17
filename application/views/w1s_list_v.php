<table border="1" cellpadding="5" class="table table-hover" id="w1s_table">
<thead>
<tr>
<th>Period</th>
<th>Rec’ing Co.</th>
<th>Area Rec’ing</th>
<th>Sending Co.</th>
<th>Area Sending</th>
<th>Currency</th>
<th>Amt of Pmt</th>
<th>Time Submitted</th>
<th>Details</th>
</tr>
</thead>
	<tbody>
		<?php
		$insur_detail_url = base_url('index.php/user_forms/view_w1s/'); 
		

		if(is_array($forms)){
			echo "<h1>W1s Form List</h1>";
		foreach ($forms as $form ) {
			$date = date('D, M j Y g:i A', strtotime($form->timestamp ));
            $w1s_id = $form->w1s_id;
            $user_id = $form->user_id;
            $period = $form->period_id;
            echo "<tr>";
            echo "<td>$period</td>
            <td>$user_id</td>
            <td>$form->area_from_id</td>
            <td>$form->sending_user_id</td>
            <td>$form->area_to_id</td>
            <td>$form->currency_id</td>
            <td>$form->amount</td>
             <td>$date</td>
            <td><a href='$insur_detail_url/$w1s_id'>view</a></td>
           ";
            echo "</tr>";

		}
	}
	else
		echo "<hr>";
		?>
		</tbody></table>