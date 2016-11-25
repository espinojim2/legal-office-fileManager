<?php $this->load->view("document_management/a_css"); $this->load->view("document_management/a_js"); ?>
<?php
$folderid=$_POST['folderid'];
$folder=$this->mainmodel->folder_data($folderid);
$foldername=$folder[0]['foldername'];
?>
<script type="text/javascript">
$(document).ready(function(){
setFilesList();
});
</script>
<div style='width:100%;' id='filelinks'>
<a href="#" onclick='setFoldersPage();'>Root</a>
<?php echo "/<a href='#' onclick='openFolder($folderid);'>$foldername</a>";
?>
</div>
<input type='hidden' id='folderid' value="<?= $folderid; ?>"/>
<div style='width:100%; ' class='row'>
<div class='col-sm-3' style='padding-top:1%; padding-bottom:1%;'>
<button class='btn btn-primary' title='Upload File' onclick='addFile();'><span class='glyphicon glyphicon-upload'></span >Upload a File</button>	
</div>	
<div class='col-sm-8' style='padding-top:1%; padding-bottom:1%;'>
<input type='text' style='width:100%' placeholder='Search Files Here...' class='form-control' id='file_search' onkeyup='setFilesList();'/>
</div>
</div>
<div style='width:100%; '>
<table class='table table-hover table-bordered' id='folder_listtbl'>
<thead>
<tr>
<td style='width:30%'>File Name</td>
<td style='width:10%'>File Type</td>
<td style='width:20%'>Date Created(YYYY-MM-DD)</td>
<td style='width:30%'>Description</td>
<td style='width:5%'>Open</td>
<td style='width:5%'>Edit</td>
<td style='width:5%'>Move to a Folder</td>
<td style='width:5%'>Download</td>
<td style='width:5%'>Delete</td>
</tr>
</thead>
<tbody></tbody>
</table>
</div>
