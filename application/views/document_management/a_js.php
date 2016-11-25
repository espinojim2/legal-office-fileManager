<script type="text/javascript">
function setFoldersPage(){
$.post(URL+"index.php/main/loadDirectories").done(function(data){
$('#filesys_cont').html(data);

});	
}

function uploadFiles1(){
if($('#filename')[0].files[0].size>8388608){ bootbox.alert("Upload file size too large, Try Again",function(){});  }
else{
$('#filename').upload(URL+"index.php/main/loadUploadFile",{uploadname:"filename"},function(data){ 
n=JSON.parse(data);
$('#form_fileid').val(n.fid);
if(n.msg!=""){ bootbox.alert(n.msg,function(){}); }
//getPDFByID(n.pdfid);
   }); 
}
}


function setFolderList()
{
var search=$('#folder_search').val();
$.post(URL+"index.php/main/loadFolderList",{search:search}).done(function(data){ 
$('#folder_listtbl tbody').html(data);
});	
}

function addFolder(){
$('body').append("<div id='dialog1'></div>");	
$.post(URL+"index.php/main/loadAddFolderForm",{mode:"add",folderid:""}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});	
}


function editFolder(folderid){
$('body').append("<div id='dialog1'></div>");	
$.post(URL+"index.php/main/loadAddFolderForm",{mode:"edit",folderid:folderid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});	
}

function deleteFolder(folderid){
bootbox.dialog({
  message: "Make sure there are no files inside",
  title: "Are you Sure?",
  buttons: {
    success: {
      label: "Okay",
      className: "btn-success",
      callback: function() {
      

      $.post(URL+"index.php/main/loadFolderDelete",{folderid:folderid}).done(function(data){ 
      n=JSON.parse(data);
      if(n.msg==""){ bootbox.alert("Done Saving",function(){}); setFolderList(); }
      else
      {
        bootbox.alert(n.msg,function(){}); 
      }	
      });



      }
    },
    main: {
      label: "Cancel",
      className: "btn-primary",
      callback: function() {
      
      }
    }
  }
});	

}

function saveFolder()
{
var mode=$('#formmode').val();
var foldername=$("#foldername").val();
var description=$('#description').val();
var folderid=$('#formfolderid').val();
$.post(URL+"index.php/main/loadSaveFolder",{foldername:foldername,mode:mode,description:description,folderid:folderid}).done(function(data){
n=JSON.parse(data);
if(n.msg=="")
{
$('#dialog1').jseDialog('close'); setFolderList(); bootbox.alert("Done Saving",function(){}); 	
}
else
{
$('#msg').html(validateMsg(n.msg));	
}

});
  
}


function openFolder(folderid)
{	
$.post(URL+"index.php/main/loadDirectoryFiles",{folderid:folderid}).done(function(data){
$('#filesys_cont').html(data);

});		
}

function setFilesList()
{
var folderid=$('#folderid').val();  
var search=$('#file_search').val();
$.post(URL+"index.php/main/loadFileList",{search:search,folderid:folderid}).done(function(data){ 
$('#folder_listtbl tbody').html(data);
}); 
}

function openFileview(fid){
$('#dialog1').html("");  
$('body').append("<div id='dialog1'></div>"); 
$.post(URL+"index.php/main/loadViewFileCont",{fid:fid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});     
}



function addFile(){
$('#dialog1').html("");  
var folderid=$('#folderid').val();  
$('body').append("<div id='dialog1'></div>");	
$.post(URL+"index.php/main/loadAddFileForm",{mode:"add",fdid:"",folderid:folderid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});		
}

function MoveFile(fdid)
{
$('#dialog1').html("");  
var folderid=$('#folderid').val();  
$('body').append("<div id='dialog1'></div>"); 
$.post(URL+"index.php/main/loadMoveFileForm",{fdid:fdid,folderid:folderid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});     
}

function saveFileMove(){
var newfolderid=$('#new_folderid').val();
var fdid=$('#form_fdid').val();
 bootbox.dialog({
  message: "Files will be automatically moved to another folder",
  title: "Are you Sure?",
  buttons: {
    success: {
      label: "Okay",
      className: "btn-success",
      callback: function() {
      

$.post(URL+"index.php/main/loadMoveFileSave",{newfolderid:newfolderid,fdid:fdid}).done(function(data){
setFilesList();
$('#dialog1').jseDialog('close');
}); 


      }
    },
    main: {
      label: "Cancel",
      className: "btn-primary",
      callback: function() {
      
      }
    }
  }
});  

}


function editFile(fdid){
$('#dialog1').html("");  
var folderid=$('#folderid').val();  
$('body').append("<div id='dialog1'></div>"); 
$.post(URL+"index.php/main/loadAddFileForm",{mode:"edit",fdid:fdid,folderid:folderid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});   
}

function saveFile(){
var mode=$('#formmode').val();
var fdid=$('#formfdid').val();
var folderid=$('#formfolderid').val();
var filename=$('#file_name').val();
var description=$('#description').val();
var fid=$('#form_fileid').val();
$.post(URL+"index.php/main/loadFileSave",{mode:mode,fdid:fdid,folderid:folderid,filename:filename,description:description,fid:fid}).done(function(data){ 
n=JSON.parse(data);
if(n.msg=="")
{
$('#dialog1').jseDialog('close'); bootbox.alert("Done Saving",function(){ setFilesList(); });   
}
else
{
$('#msg').html(validateMsg(n.msg)); 
}

});
}


function deleteFile(fdid){
 bootbox.dialog({
  message: "Files will be automatically deleted",
  title: "Are you Sure?",
  buttons: {
    success: {
      label: "Okay",
      className: "btn-success",
      callback: function() {
      

      $.post(URL+"index.php/main/loadFileDelete",{fdid:fdid}).done(function(data){ 
      n=JSON.parse(data);
      if(n.msg==""){ bootbox.alert("Done Saving",function(){}); setFilesList(); }
      else
      {
        bootbox.alert(n.msg,function(){}); 
      } 
      });



      }
    },
    main: {
      label: "Cancel",
      className: "btn-primary",
      callback: function() {
      
      }
    }
  }
});  
}
</script>