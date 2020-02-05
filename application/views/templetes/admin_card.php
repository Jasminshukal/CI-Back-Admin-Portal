<tr>
	<td><?=$row->name;?></td>
	<td>
		<center>
			<img src="<?=base_url().$row->profile_image;?>" width="30px">
		</center>
	</td>
	<td><?=$row->email;?></td>
	<td><?=$row->role_name;?></td>
	<td><?=$row->last_login_date;?></td>
	<td>
		<?php

		if($row->status=1)
		{
			echo "<span class='btn btn-xs bg-green-jungle bg-font-green-jungle'> Active </span>";
		}

		?>
	</td>
	<td>
		<a href="<?=base_url("Users/Edit/").$row->id;?>" class="btn btn-info" >Edit</a>
	</td>
</tr>