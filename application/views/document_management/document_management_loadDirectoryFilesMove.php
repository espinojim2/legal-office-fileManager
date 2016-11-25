<?php
$fdid=$_POST['fdid'];
$folderid=$_POST['folderid'];

?>
<input type='hidden' id='form_fdid' value="<?= $fdid; ?>"/>
<div style='width:100%; padding:2%;' align='center'>
<div style='width:50%;'>

<div class='row' style='margin-bottom:2%;'>
<div class='col-sm-4'><label>Choose Folder Location</label></div>
<div class='col-sm-8'>
<select class='form-control' id='new_folderid'>
<?php
$q=$this->db->query("select * from sys_folders where remark='1' order by foldername DESC");
$r=$q->result_array();
$opt="";
for($x=0;$x<count($r);$x++)
{
$name=$r[$x]['foldername'];
$id=$r[$x]['folderid'];	
$opt.=($folderid==$id)?"<option value='$id' selected>$name</option>":"<option value='$id'>$name</option>";	
}
echo $opt;
?>	
</select>
</div>
</div>


<div class='row'>
<div class='col-sm-4'></div>	
<div class='col-sm-8'><button class='btn btn-primary form-control' onclick='saveFileMove()'>Save</button></div>
</div>
</div>