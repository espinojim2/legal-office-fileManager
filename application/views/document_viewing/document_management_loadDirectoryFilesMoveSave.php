<?php
$newfolderid=$_POST['newfolderid'];
$fdid=$_POST['fdid'];

$sql="update sys_file_data set folderid='$newfolderid' where fdid='$fdid';";

$e1=explode(";",$sql); $b=true;
$this->db->query("begin;");
for($y=0;$y<count($e1)-1;$y++)
{
$q1=$this->db->query($e1[$y]);
$b=$b && $q1;
}
if($q1){ $this->db->query("commit;");  }else{ $this->db->query("rollback;");  }	

?>