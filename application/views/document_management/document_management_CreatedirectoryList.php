<?php
$search=mysql_real_escape_string($_POST['search']);
$str="";

$srch=(trim($search)=="")?"":" and (foldername like '$search%' or description like '$search%')";

$sql="select * from sys_folders where remark='1' $srch";
$q=$this->db->query($sql);
$r=$q->result_array();


for($x=0;$x<count($r);$x++)
{
$folderid=$r[$x]['folderid'];
$foldername=$r[$x]['foldername'];
$description=$r[$x]['description'];
$date=$r[$x]['date'];
$str.="
<tr ondblclick='openFolder($folderid);'>
<td><span class='glyphicon glyphicon-folder-close' style='font-size:20px;'></span><span style='margin-left:5%;'>$foldername</span></td>
<td>$date</td>
<td>$description</td>
<td><button class='btn' title='View Inside' style='width:100%; background:rgba(0,0,0,0);' onclick='openFolder($folderid);'><span class='glyphicon glyphicon-folder-open'></span></button></td>
<td><button class='btn' title='Edit' style='width:100%; background:rgba(0,0,0,0);' onclick='editFolder($folderid);'><span class='glyphicon glyphicon-edit'></span></button></td>
<td><button class='btn' title='Delete' style='width:100%; background:rgba(0,0,0,0);' onclick='deleteFolder($folderid);'><span class='glyphicon glyphicon-remove'></span></button></td>
</tr>
";
}

if(count($r)==0){ $str.="<tr><td colspan='6'>No Results Found</td></tr>"; }


echo $str;



?>