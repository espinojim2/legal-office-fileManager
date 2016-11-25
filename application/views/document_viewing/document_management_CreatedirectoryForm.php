<?php
$mode=$_POST['mode'];
$folderid=$_POST['folderid'];
$folder=$this->mainmodel->folder_data($folderid);
$foldername=($mode=='add')?"":$folder[0]['foldername'];
$description=($mode=='add')?"":$folder[0]['description'];


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
<div class='col-sm-8'><input type='text' class='form-control' id='foldername' value="<?= $foldername; ?>"></div>
</div>
<div class='row' style='margin-bottom:2%;'>
<div class='col-sm-4'><label>Description</label></div>
<div class='col-sm-8'><textarea class='form-control' id='description'><?= $description; ?></textarea></div>
</div>


<div class='row'>
<div class='col-sm-4'></div>	
<div class='col-sm-8'><button class='btn btn-primary form-control' onclick='saveFolder()'>Save</button></div>
</div>
</div>

</div>
<input type='hidden' id='formmode' value="<?= $mode; ?>" >
<input type='hidden' id='formfolderid' value="<?= $folderid; ?>" >
