<script type="text/javascript">
function setFoldersPage(){
$.post(URL+"index.php/main/loadDirectories1").done(function(data){
$('#filesys_cont').html(data);

});	
}

function uploadFiles1(){
if($('#filename')[0].files[0].size>8388608){ bootbox.alert("Upload file size too large, Try Again",function(){});  }
else{
$('#filename').upload(URL+"index.php/main/loadUploadFile1",{uploadname:"filename"},function(data){ 
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
$.post(URL+"index.php/main/loadFolderList1",{search:search}).done(function(data){ 
$('#folder_listtbl tbody').html(data);
});	
}

function addFolder(){
$('body').append("<div id='dialog1'></div>");	
$.post(URL+"index.php/main/loadAddFolderForm1",{mode:"add",folderid:""}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});	
}


function editFolder(folderid){
$('body').append("<div id='dialog1'></div>");	
$.post(URL+"index.php/main/loadAddFolderForm1",{mode:"edit",folderid:folderid}).done(function(data){
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
      

      $.post(URL+"index.php/main/loadFolderDelete1",{folderid:folderid}).done(function(data){ 
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
$.post(URL+"index.php/main/loadSaveFolder1",{foldername:foldername,mode:mode,description:description,folderid:folderid}).done(function(data){
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
$.post(URL+"index.php/main/loadDirectoryFiles1",{folderid:folderid}).done(function(data){
$('#filesys_cont').html(data);

});		
}

function setFilesList()
{
var folderid=$('#folderid').val();  
var search=$('#file_search').val();
$.post(URL+"index.php/main/loadFileList1",{search:search,folderid:folderid}).done(function(data){ 
$('#folder_listtbl tbody').html(data);
}); 
}

function openFileview(fid){
$('#dialog1').html("");  
$('body').append("<div id='dialog1'></div>"); 
$.post(URL+"index.php/main/loadViewFileCont1",{fid:fid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
});     
}



function addFile(){
$('#dialog1').html("");  
var folderid=$('#folderid').val();  
$('body').append("<div id='dialog1'></div>");	
$.post(URL+"index.php/main/loadAddFileForm1",{mode:"add",fdid:"",folderid:folderid}).done(function(data){
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
$.post(URL+"index.php/main/loadMoveFileForm1",{fdid:fdid,folderid:folderid}).done(function(data){
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
      

$.post(URL+"index.php/main/loadMoveFileSave1",{newfolderid:newfolderid,fdid:fdid}).done(function(data){
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
$.post(URL+"index.php/main/loadAddFileForm1",{mode:"edit",fdid:fdid,folderid:folderid}).done(function(data){
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
$.post(URL+"index.php/main/loadFileSave1",{mode:mode,fdid:fdid,folderid:folderid,filename:filename,description:description,fid:fid}).done(function(data){ 
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
      

      $.post(URL+"index.php/main/loadFileDelete1",{fdid:fdid}).done(function(data){ 
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