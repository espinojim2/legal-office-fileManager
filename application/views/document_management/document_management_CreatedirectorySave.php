<?php
$foldername=mysql_real_escape_string($_POST['foldername']);
$mode=$_POST['mode'];
$description=$_POST['description'];
$date=date("Y-m-d");
$folderid=$_POST['folderid'];
$msg=""; $sql="";

if(trim($foldername)==""){ $msg="Invalid Folder Name"; }
if($mode=='add')
{
$q=$this->db->query("select * from sys_folders where foldername like '$foldername' and remark='1'");
if($q->num_rows()==0)
{
$folderid=$this->mainmodel->getMaxId("sys_folders","folderid")+1;	
$sql.="insert into sys_folders values('$folderid','$foldername','$description','$date','1');";	
}
else
{
$msg="Foldername Already Exists";	
}

}
if($mode=='edit')
{
$sql.="update sys_folders set foldername='$foldername',description='$description' where folderid='$folderid';";	
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