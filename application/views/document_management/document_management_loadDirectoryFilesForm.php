<?php $this->load->view("document_management/a_css"); $this->load->view("document_management/a_js"); ?>
<?php
$mode=$_POST['mode'];
$fdid=$_POST['fdid'];
$folderid=$_POST['folderid'];

$file=$this->mainmodel->file_data($fdid);
$filename=($mode=='add')?"":$file[0]['filename'];
$filedescription=($mode=='add')?"":$file[0]['filedescription'];
$fid=($mode=='add')?"":$file[0]['fid'];


?>
<script type="text/javascript">
$(document).ready(function(){

});
</script>
<div id='msg' style='margin-top:7%;'></div>
<div style='width:100%; padding:2%;' align='center'>
<div style='width:50%;'>

<div class='row' style='margin-bottom:2%;'>
<div class='col-sm-4'><label>File Name</label></div>
<div class='col-sm-8'><input type='text' class='form-control' id='file_name' value="<?= $filename; ?>"></div>
</div>
<div class='row' style='margin-bottom:2%;'>
<div class='col-sm-4'><label>Description</label></div>
<div class='col-sm-8'><textarea class='form-control' id='description'><?= $filedescription; ?></textarea></div>
</div>

<div class='row' style='margin-bottom:2%;'>
<div class='col-sm-4'><label>Upload File</label></div>
<div class='col-sm-8'><input type='file' class='form-control' id="filename" name="filename" onchange="uploadFiles1()"/></div>
<input type='hidden' id='form_fileid' value="<?= $fid; ?>" />
<span><?php echo ($fid=="")?"There is no file yet":"There is a current file existing"; ?></span>
</div>

<div class='row'>
<div class='col-sm-4'></div>	
<div class='col-sm-8'><button class='btn btn-primary form-control' onclick='saveFile()'>Save</button></div>
</div>
</div>

</div>
<input type='hidden' id='formmode' value="<?= $mode; ?>" />
<input type='hidden' id='formfdid' value="<?= $fdid; ?>"/>
<input type='hidden' id='formfolderid' value="<?= $folderid; ?>" />
