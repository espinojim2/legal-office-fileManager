<?php
$accountType=$_POST['accounttype'];
$q=$this->db->query("select * from sys_p_person where pid in(select pid from sys_p_account where accountTypeId='$accountType') order by lname");
$str="";
$r=$q->result_array();
for($x=0;$x<count($r);$x++)
{
$pid=$r[$x]['pid'];	
$fn=ucfirst($r[$x]['fname']);
$mn=(trim($r[$x]['mname'])=="")?"":strtoupper(substr($r[$x]['mname'],0,1)).".";
$ln=ucfirst($r[$x]['lname']);
$en=ucfirst($r[$x]['ename']);  
$name=$ln." ".$en.", ".$fn." ".$mn;
$str.="
<option value='$pid'>$name</option>
";
}
?>
<select id='personid' onchange="set_page_authorization()"  style="width:300px;" class="form-control"><?= $str;?></select>