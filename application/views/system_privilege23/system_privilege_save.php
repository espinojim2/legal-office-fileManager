<?php
$accountType=$_POST['accountType'];
$personid=$_POST['personid'];
$acntId=$this->mainmodel->getAccountId($personid,$accountType);
$pageid=$_POST['pageid'];
$view=$_POST['view'];

$sql="";
if(count($pageid)>0)
{
 for($x=0;$x<count($pageid);$x++)
 {
  $q1=$this->db->query("select * from sys_p_authorization where accountId='$acntId' and pageId='$pageid[$x]'");
  if ($q1->num_rows()==0)
  {
  $sql.=($view[$x]==1)?"insert into sys_p_authorization values('$acntId','$pageid[$x]','$view[$x]');":"";   
  }
  else{
  $r=$q1->result_array();
  $sql.="update sys_p_authorization set aview='$view[$x]' where accountId='$acntId' and pageId='$pageid[$x]';";	
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