<tr>
	<td>
		<?=$row->email_name;?>
	</td>
	<td>
		<?=$row->email_subject;?>
	</td>
	<td>
		<a href="<?=base_url()?>Email_template/edit/1" class="btn <?=$this->settings['success_color'];?> btn-xs edit_code" href="javascript:void(0)"><i class="fa fa-edit"></i></a>
		<button data-id="<?php echo $row->id;?>" class="btn <?=$this->settings['danger_color'];?> btn-xs" type="button" ><i class="fa fa-trash"></i></button>
	</td>
</tr>
