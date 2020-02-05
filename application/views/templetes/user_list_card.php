<tr>
    <td><?=$row->name;?></td>
    <td><?=$row->phone;?></td>
    <td>
        <?=date('d-m-Y',strtotime($row->regi_date));?>
    </td>
    <td><?=date('d-m-Y',strtotime($row->login_date));?></td>
    <?PHP
    $ARR=array();
    $ARR['0']="inactive";
    $ARR['1']="Active";
    ?>
    <td>
        <span class="label label-success"><?=$ARR[$row->status];?></span> 
        <?=$row->is_developer=='1'?'<span class="label label-danger">Developer</span>': "";?>
    </td>
</tr>