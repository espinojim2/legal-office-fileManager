<?php
$fdid=$_POST['fdid'];
$msg=""; $sql="";


$sql.="update sys_file_data set remark='0' where fdid='$fdid';";


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