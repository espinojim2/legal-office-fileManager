<?php
$accountType=$_POST['accountType'];

$qperson=$this->db->query("select accountId from sys_p_account where accountTypeId='$accountType'");
$qr=$qperson->result_array(); /*Gets all account id*/
$sql="";

$q1=$this->db->query("select * from sys_account_type_template where accountTypeId='$accountType'");
$r1=$q1->result_array();
for($x=0;$x<count($r1);$x++)
{
 $pageID=$r1[$x]['pageId'];
 $aview=$r1[$x]['aview'];
 
 
  for($y=0;$y<count($qr);$y++)
  {
    $id=$qr[$y]['accountId'];
    $qq=$this->db->query("select * from sys_p_authorization where accountId='$id' and pageId='$pageID'");
    if($qq->num_rows()==0)
    {
    $sql.="insert into sys_p_authorization values('$id','$pageID','$aview');"; 	
    }
    else
	{
	$sql.="update sys_p_authorization set aview='$aview' where accountId='$id' and pageId='$pageID';";	
	}
   
  

  }
 
 
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