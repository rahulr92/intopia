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
            $user_id = $form->user_id;
            $teamname = $this->Model->get_teamname($user_id);
            $period = $form->period_id;
            echo "<tr";
            echo "><td><a href='$insur_detail_url/$insurance_id'>Q$period Insurance</a></td>
            <td>$teamname</td>
            <td>$date</td>";
            echo "</tr>";
			echo "<tr";

		}
	}
	else
		echo "<hr>";
		?>
		</tbody></table>