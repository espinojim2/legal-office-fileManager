<script type="text/javascript">
$(document).ready(function(){
setFolderList();

});
</script>
<div style='width:100%;' id='filelinks'>
<a href="#" onclick='setFoldersPage();'>Root</a>
</div>
<div style='width:100%; ' class='row'>
<div class='col-sm-8' style='padding-top:1%; padding-bottom:1%;'>
<input type='text' style='width:100%' placeholder='Search Folder Here...' class='form-control' id='folder_search' onkeyup='setFolderList()'/>
</div>
</div>
<div style='width:100%; '>
<table class='table table-hover table-bordered' id='folder_listtbl'>
<thead>
<tr>
<td style='width:30%'>Folder Name</td>
<td style='width:20%'>Date Created(YYYY-MM-DD)</td>
<td style='width:30%'>Description</td>
<td style='width:5%'>Open</td>

</tr>
</thead>
<tbody></tbody>
</table>
</div>
