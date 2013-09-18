<table class="table table-hover">
	<tbody>
		<?php
		$nec_detail_url = base_url('index.php/user_forms/view_nec/'); 
		$user_id = $this->session->userdata('user_id');

		if(is_array($forms)){
            echo "<h1>NEC Purchase Agreement List</h1>
             <thead>
                <tr>
                <th>Team Name</th>
                  <th>Period Applied In</th>
                  <th>NEC Purchase Agreement</th>
                   <th>When to execute</th>
                  <th>Submitted Time</th>
                </tr>
              </thead>
              ";

		foreach ($forms as $form ) {
			echo "<tr";
			  $date = date('D, M j Y g:i A', strtotime($form->timestamp ));
            $nec_id = $form->nec_id;
             $user_id = $form->user_id;
            $curr_period = $form->current_period_id;
            $exec_period = ($form->exe_period_id==0)?"Now": "Q$form->exe_period_id";
            $teamname = $this->Model->get_teamname($user_id);
            echo "<tr> <td>$teamname</td>";
            echo "<td>Q$curr_period</td>";
            echo "<td><a href='$nec_detail_url/$nec_id'>View Agreement</a></td>
                  <td>$exec_period</td>
                  <td>$date</td>";
            echo "</tr>";

		}
	}
	else
		echo "<hr>";
		?>
		</tbody></table>