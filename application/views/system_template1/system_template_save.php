<?php
$accountType=$_POST['accountType'];
$pageid=$_POST['pageid'];
$view=$_POST['view'];
$sql="";
if(count($pageid)>0){
 $id=$this->mainmodel->getMaxId("sys_account_type_template","pageTemplateId");
 for($x=0;$x<count($pageid);$x++)
 {
  $q=$this->db->query("select * from sys_account_type_template where accountTypeId='$accountType' and pageId='$pageid[$x]'");
  if ($q->num_rows()==0)
  {
 $id=($view[$x]==1)?$id+1:$id;
  $sql.=($view[$x]==1)?"insert into sys_account_type_template values('$id','$accountType','$pageid[$x]','$view[$x]');":"";   
 
  }
  else
  {
  $r=$q->result_array();
  $pageTemplateId=$r[0]['pageTemplateId'];
  $sql.="update sys_account_type_template set aview='$view[$x]' where pageTemplateId='$pageTemplateId';";	
 



  }
 }//endif	
}


$e=explode(";",$sql);
$this->db->query("begin;"); $b=true;
for($x=0;$x<count($e)-1;$x++)
{
$q=$this->db->query($e[$x]);
$b= $b && $q;
}
 if($b){ $this->db->query("commit;"); }else{ $this->db->query('rollback;'); }

?>