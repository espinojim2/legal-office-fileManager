<?php

$uploadname=mysql_real_escape_string($_POST['uploadname']); /*Name of input file*/
$pdf=addslashes(file_get_contents($_FILES["$uploadname"]['tmp_name']));
$type=$_FILES["$uploadname"]["type"];
$name=$_FILES["$uploadname"]["name"];
$e=explode(".",$name);
$fid="";
$msg="";

//$e[1]=="pdf" || $e[1]=="jpeg" || $e[1]=="jpg" || $e[1]=="gif" || $e[1]=="png"
if(1)
{

$fid=$this->mainmodel->getMaxId("sys_files","fid")+1;
$newname="";
       $date=date("Y-m-d");
       $filename=$date."".$fid.".".$e[count($e)-1];
       $sql="";
       $sql.="insert into sys_files values('$fid','resources/All_files/$filename','$type','1');";
       $this->db->query($sql);

if(file_exists("./resources/All_files")){ }else{ mkdir("./resources/All_files"); }
$newname="./resources/All_files/$filename";
move_uploaded_file($_FILES["$uploadname"]['tmp_name'],$newname);
}
else
{
	$msg="Invalid File format";
}
$a['fid']=$fid;
$a['msg']=$msg;

echo json_encode($a);
?>