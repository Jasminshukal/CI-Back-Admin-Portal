<tr>
<td> <?=$row->name;?></td>
<td> <?=date('d-m-Y',strtotime($row->order_date));?></td>
<td> <?=date('h:s',strtotime($row->order_time));?></td>
<td> <?=$row->qty;?></td>
<td> <?=$row->total_amount;?></td>
<td> <?=$row->order_id;?></td>
<td> <?=$row->location_address;?></td>
<td> <?=$row->brand_name;?></td>
<td> <?=$row->model_name;?></td>
<td> <?=$row->color;?></td>
<td> <?=$row->plate_number;?></td>
<td>
    <a href="<?=base_url("Order");?>/Edit_Order/<?=$row->id;?>"  class="btn btn-xs <?=$setting['warning_button_color'];?>"> <i class="fa fa-edit" aria-hidden="true"></i></a>
    <a href="javascipt:void(0);"  class="btn btn-xs <?=$setting['danger_color'];?> delete_order"> <i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
</tr>