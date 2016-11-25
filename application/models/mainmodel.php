<?php
class Mainmodel extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
public function getMaxId($tbl,$id){ /*Gets maximum Id from any table*/
          $q=$this->db->query("select max($id) as id from $tbl");
          $r=$q->result_array();
          return ($r[0]['id']==NULL)?"0":$r[0]['id'];
    }
  public function getMaxVal($tbl,$id,$cond){ /*Gets maximum Id from any table*/
          $q=$this->db->query("select max($id) as id from $tbl $cond");
          $r=$q->result_array();
          return ($r[0]['id']==NULL)?"0":$r[0]['id'];
  }

  public function numformat($length,$val){
   $l=$length-strlen($val); $str='';
  for($x=0;$x<$l;$x++){ $str.="0"; }
   return $str.''.$val;
 }

/*Your main db transactions here*/
public function getSystemPagesDatas($pageId) /*Gets submenu page datas*/
{
    $q=$this->db->query("select * from sys_systempages  where pageId='$pageId'");
    $r=$q->result_array();
    return $r; 
   
}
public function detModuleData($moduleId){
	$q=$this->db->query("select * from sys_module  where moduleId='$moduleId'");
    $r=$q->result_array();
    return $r; 
}

public function getAccountTypes(){
$q=$this->db->query("select * from sys_account_type order by accountTypeId");
    return $q->result_array();
   	
}

function getPersonnelAccountTypes()
{
 $q=$this->db->query("select * from sys_account_type where not accntclass='ST' order by accountTypeId");
    return $q->result_array(); 
}
function getStudentAccountTypes(){
$q=$this->db->query("select * from sys_account_type where accntclass='ST' order by accountTypeId");
    return $q->result_array();   
}


public function getAccountType_Data($accountTypeId){
$q=$this->db->query("select * from sys_account_type where accountTypeId='$accountTypeId'");
    return $q->result_array();  
}

public function getAccountId($pid,$accountTypeId) /*gets user account of the person through ID*/
    {
    $query=$this->db->query("select accountId from sys_p_account where pid='$pid' and accountTypeId='$accountTypeId'");
    if ($query->num_rows() > 0)
        {
        $row = $query->row(); 
      $pagecont = $row->accountId;
        return $pagecont;
        }
    }

public function useraccount_data($accountId)
{
  $query=$this->db->query("select * from sys_p_account where accountId='$accountId'");  
return $query->result_array();
}

public function useraccount_password_data($accountId)
{
  $query=$this->db->query("select * from sys_user_passwords where accountId='$accountId'");  
return $query->result_array();
}

 public function hasAccess($accountId){
    $query=$this->db->query("select * from sys_p_account where accountId='$accountId'");
    $r=$query->num_rows();
    if($r>0){ return true; }
    else if($r==0){ return false; }
  }
public function person_data($pid){
$q=$this->db->query("select * from sys_p_person where pid='$pid'");  
return $q->result_array();
}


public function folder_data($folderid)
{
$q=$this->db->query("select * from sys_folders where folderid='$folderid'");  
return $q->result_array();  
}


public function file_data($fdid)
{
$q=$this->db->query("select * from sys_file_data where fdid='$fdid'");  
return $q->result_array();    
}


public function file_data_main($fid)
{
$q=$this->db->query("select * from sys_files where fid='$fid'");  
return $q->result_array();    
}


public function fileGarbageCollection(){
$q=$this->db->query("select * from sys_files where not fid in(select fid from sys_file_data where remark='1')");
$r=$q->result_array(); 
$sql="";
for($x=0;$x<count($r);$x++){
$fid=$r[$x]['fid'];  


$filelnk=$r[$x]['file_location'];
$sql.="delete from sys_files where fid='$fid';";
if(file_exists("./$filelnk")){ unlink("./$filelnk"); }  

} 
$e=explode(";",$sql); $b=true;
$this->db->query("begin;");
for($y=0;$y<count($e)-1;$y++){
$q1=$this->db->query($e[$y]);
$b=$b && $q1;  
}
if($b){ $this->db->query("commit"); }else{ $this->db->query("rollback"); }
}






}
?>