<?php
$folderid=$_POST['folderid'];
$msg=""; $sql="";
$q=$this->db->query("select * from sys_file_data where folderid='$folderid' and remark='1';");
if($q->num_rows()>0){ $msg="Cannot be deleted. There are still files inside"; }

$sql.="update sys_folders set remark='0' where folderid='$folderid';";


if($msg=="")
{
$e1=explode(";",$sql); $b=true;
$this->db->query("begin;");
for($y=0;$y<count($e1)-1;$y++)
{
$q1=$this->db->query($e1[$y]);
$b=$b && $q1;
}
if($q1){ $this->db->query("commit;");  }else{ $this->db->query("rollback;");  }	
}


$a['msg']=$msg;
echo json_encode($a);

?>