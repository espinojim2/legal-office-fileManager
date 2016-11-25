<?php
$search=mysql_real_escape_string($_POST['search']);
$folderid=$_POST['folderid'];
$str="";

$srch=(trim($search)=="")?"":" and (filename like '$search%' or filedescription like '$search%')";

$sql="select * from sys_file_data where remark='1' and folderid='$folderid' $srch";
$q=$this->db->query($sql);
$r=$q->result_array();


for($x=0;$x<count($r);$x++)
{
$fid=$r[$x]['fid'];	
$fdid=$r[$x]['fdid'];
$filename=$r[$x]['filename'];
$description=$r[$x]['filedescription'];
$date=$r[$x]['date'];

$loc=$this->mainmodel->file_data_main($fid);
$location=base_url()."".$loc[0]['file_location'];
$type=$loc[0]['file_type'];
$str.="
<tr ondblclick=''>
<td><span class=' glyphicon glyphicon-file' style='font-size:20px;'></span><span style='margin-left:5%;'>$filename</span></td>
<td>$type</td>
<td>$date</td>
<td>$description</td>
<td><button class='btn' title='View Inside' style='width:100%; background:rgba(0,0,0,0);' onclick='openFileview($fid)'><span class='glyphicon glyphicon-search'></span></button></td>
<td><a href='$location' download><button class='btn' title='Edit' style='width:100%; background:rgba(0,0,0,0);' onclick=''><span class=' glyphicon glyphicon-download-alt'></span></button></a></td>

</tr>
";
}

if(count($r)==0){ $str.="<tr><td colspan='9'>No Results Found</td></tr>"; }


echo $str;



?>