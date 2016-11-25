<?php
$mode=$_POST['mode'];
$fdid=$_POST['fdid'];
$folderid=$_POST['folderid'];
$filename=mysql_real_escape_string($_POST['filename']);
$description=mysql_real_escape_string($_POST['description']);
$fid=$_POST['fid'];


$date=date("Y-m-d");

$msg=""; $sql="";

if(trim($filename)==""){ $msg="Invalid Folder Name"; }
if($mode=='add')
{
$q=$this->db->query("select * from sys_file_data where filename like '$filename' and folderid='$folderid' and remark='1'");
if($q->num_rows()==0)
{
$fdid=$this->mainmodel->getMaxId("sys_file_data","fdid")+1;	
$sql.="insert into sys_file_data values('$fdid','$folderid','$fid','$filename','$description','$date','1');";	
}
else
{
$msg="Filename Already Exists";	
}

}
if($mode=='edit')
{
$sql.="update sys_file_data set filename='$filename',filedescription='$description',fid='$fid' where fdid='$fdid';";	
}



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