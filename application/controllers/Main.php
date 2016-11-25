<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function links(){
        $str='<link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/bootstrap3/css/bootstrap.min.css"></link>
              <link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/datatable/datatables.bootstrap.min.css"></link>
              <link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/bootdate/css/bootstrap-datepicker.min.css"></link>
  <link rel="shortcut icon" href="' . base_url() . 'resources/images/logo.png"></link>
             <link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/template/template.css"></link>
             <link rel="stylesheet" type="text/css" href="' . base_url() . 'resources/template/simple-sidebar.css"></link>

             <script type="text/javascript" src="' . base_url() . 'resources/jquery.min.js"></script>

             <script type="text/javascript" src="' . base_url() . 'resources/bootstrap3/js/bootstrap.min.js"></script>
             <script type="text/javascript" src="' . base_url() . 'resources/bootbox/bootbox.min.js"></script> 
             <script type="text/javascript" src="' . base_url() . 'resources/bootdate/js/bootstrap-datepicker.min.js"></script> 
             <script type="text/javascript" src="' . base_url() . 'resources/jseDialog/jseDialog.js"></script>
             <script type="text/javascript" src="' . base_url() . 'resources/datatable/jquery.dataTables.min.js"></script> 
             <script type="text/javascript"  src="' . base_url() . 'resources/datatable/dataTables.bootstrap.min.js"></script>
             <script type="text/javascript" charset="utf8" src="' . base_url() . 'resources/datatable/dataTables.min.js"></script>
             

             
             <script type="text/javascript" src="' . base_url() . 'resources/jscripts/script.js"></script>
              <script type="text/javascript" src="' . base_url() . 'resources/jscripts/uploadz.js"></script>
            
            
             <script type="text/javascript"> 
                var URL = "'.base_url().'";
                var cURL = "'.current_url().'";
               
             </script> ';
     return $str;	
	}


	public function index()
	{
		$this->login();
	}

    public function login(){
        $data['extraHeadContent'] = $this->links();
         $data['title']="Legal Office";
        $this->load->view("login/login",$data);
    }
    public function loadLogout(){
     $this->load->view("login/logout");
    }

    public function loadLoginProcess(){
     $this->load->model("mainmodel");   
     $this->load->view("login/login_process");   
    }

    public function loadSidebar(){
        $this->load->model("mainmodel");
     $this->load->view("sidebar/sidebar");   
    }

    
	public function pages($pageId,$accountId){
		 $pagedata=$this->mainmodel->getSystemPagesDatas($pageId);
         $moduleId=$pagedata[0]['moduleId'];
         $mod=$this->mainmodel->detModuleData($moduleId);
         $pageAlias=$pagedata[0]['pageAlias'];
         $modName=$mod[0]['moduleName'];
         $data['extraHeadContent'] = $this->links();
         $data['pagetitle']=$modName."/".$pagedata[0]['pageName'];
         $data['title']="Legal Office";
          if($this->mainmodel->hasAccess($accountId)){ $this->load->view("$pageAlias/$pageAlias",$data); }
          else{ $this->load->view("zno_access/zno_access",$data); }       
         
	}

public function locateNOACCESS(){
   $this->load->view("znoaccess/no_access");  
}





	/***********Links****************/
public function locateDashboard(){
$this->load->view("dashboard/dashboard_main");	
}	

/*   Systempages   */
public function locateSystempages(){
$this->load->view("system_template/system_template_main");	
}

public function set_page_template(){
$this->load->view("system_template/system_template_set");    
}

public function page_template_save(){

$this->load->view("system_template/system_template_save");    
}

public function loadPageTemplateUpdateAuthorization(){

$this->load->view("system_template/system_template_updatepageAuthorization");
}

/*  System Privilege */
public function locateSystemprivilege(){
$this->load->view("system_privilege/system_privilege_main");      
}
public function page_autorization_setEmployeeOpt(){
$this->load->view("system_privilege/system_privilege_person_options");    
}
public function set_page_authorization(){
$this->load->view("system_privilege/system_privilege_set");    
}

public function page_authorization_save(){    
$this->load->view("system_privilege/system_privilege_save");    
} 

/* Personnel Info */
public function locatePersonInfo(){
$this->load->view("personnel_information/personnel_information_main");   
}
public function loadAddPersonnelForm(){
$this->load->view("personnel_information/personnel_information_form");    
}
public function loadPersonSave(){
$this->load->view("personnel_information/personnel_information_save");    
}
public function loadPersonList(){
$this->load->view("personnel_information/personnel_information_list");    
}


/* My Profile*/
public function locatePersonMyProfile(){
$this->load->view("my_profile/my_profile_main");       
}

/*User Accounts*/
public function locateUserAccounts(){
$this->load->view("user_accounts/user_accounts_main");       
}
public function loadAddUserAccountForm(){
$this->load->view("user_accounts/user_accounts_form");    
}
public function loadUserAccountSave(){
$this->load->view("user_accounts/user_accounts_save");    
}
public function loadUserAccountList(){
$this->load->view("user_accounts/user_accounts_list");    
}

/* Personnel Reports */
public function locatePersonReportmain(){
$this->load->view("personnel_list_report/personnel_list_report_main");    
}
public function loadPersonReportList(){
$this->load->view("personnel_list_report/personnel_list_report_list");     
}
public function loadPersonnelPrintList(){
$this->load->view("personnel_list_report/personnel_list_report_printlist");     
}
public function loadPersonnelPrintProfile(){
$this->load->view("personnel_list_report/personnel_list_report_printprofile");     
}


/* Document management */
public function locateDocumentManagement(){
$this->load->view("document_management/document_management_main");
}
public function loadDirectories(){
$this->load->view("document_management/document_management_loadDirectories");    
}
public function loadAddFolderForm(){
$this->load->view("document_management/document_management_CreatedirectoryForm");    
}
public function loadSaveFolder(){
$this->load->view("document_management/document_management_CreatedirectorySave");    
}
public function loadFolderList(){
$this->load->view("document_management/document_management_CreatedirectoryList");    
}
public function loadFolderDelete()
{
$this->load->view("document_management/document_management_CreatedirectoryDelete");       
}

public function loadDirectoryFiles(){
$this->load->view("document_management/document_management_loadDirectoryFiles");        
}
public function loadAddFileForm(){
$this->load->view("document_management/document_management_loadDirectoryFilesForm");    
}
public function loadFileSave(){
$this->load->view("document_management/document_management_loadDirectoryFilesSave");    
}
public function loadFileList(){
$this->load->view("document_management/document_management_loadDirectoryFilesList");    
}
public function loadFileDelete(){
$this->load->view("document_management/document_management_loadDirectoryFilesDelete");    
}
public function loadViewFileCont(){
$this->load->view("document_management/document_management_loadDirectoryFilesView");     
}
public function loadMoveFileForm(){
$this->load->view("document_management/document_management_loadDirectoryFilesMove");    
}
public function loadMoveFileSave(){
$this->load->view("document_management/document_management_loadDirectoryFilesMoveSave");    
}




/* Document Viewing */
public function locateDocumentManagement1(){
$this->load->view("document_viewing/document_management_main");
}
public function loadDirectories1(){
$this->load->view("document_viewing/document_management_loadDirectories");    
}
public function loadAddFolderForm1(){
$this->load->view("document_viewing/document_management_CreatedirectoryForm");    
}
public function loadSaveFolder1(){
$this->load->view("document_viewing/document_management_CreatedirectorySave");    
}
public function loadFolderList1(){
$this->load->view("document_viewing/document_management_CreatedirectoryList");    
}
public function loadFolderDelete1()
{
$this->load->view("document_viewing/document_management_CreatedirectoryDelete");       
}

public function loadDirectoryFiles1(){
$this->load->view("document_viewing/document_management_loadDirectoryFiles");        
}
public function loadAddFileForm1(){
$this->load->view("document_viewing/document_management_loadDirectoryFilesForm");    
}
public function loadFileSave1(){
$this->load->view("document_viewing1/document_management_loadDirectoryFilesSave");    
}
public function loadFileList1(){
$this->load->view("document_viewing/document_management_loadDirectoryFilesList");    
}
public function loadFileDelete1(){
$this->load->view("document_viewing/document_management_loadDirectoryFilesDelete");    
}
public function loadViewFileCont1(){
$this->load->view("document_viewing/document_management_loadDirectoryFilesView");     
}
public function loadMoveFileForm1(){
$this->load->view("document_viewing/document_management_loadDirectoryFilesMove");    
}
public function loadMoveFileSave1(){
$this->load->view("document_viewing/document_management_loadDirectoryFilesMoveSave");    
}




/* Option tags */
public function loadUserByUserTypeOptions(){
$this->load->view("optiontags/user_by_accounttype_options");    
}
public function loadSectionOptions(){
$this->load->view("optiontags/section_options");    
}
public function loadStudentUserByUserTypeOptions(){
$this->load->view("optiontags/user_by_student_accounttype_options");    
}


/* Upload Files*/
public function loadUploadFile(){
$this->load->view("upload_files/uploadFiles");      
}

}
