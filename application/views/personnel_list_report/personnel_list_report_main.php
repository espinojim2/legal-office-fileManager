
<div style='padding:2%; padding-top:3%;'>
<div style='width:100%; margin-bottom:2%; background:#48708D;'><button class='btn btn-primary' style='background:#48708D;' onclick='SYS_printPersonnel()'><span class='glyphicon glyphicon-plus'></span> Print Personnels</button></div>
<table id="table_idd" class="table table-striped table-hover table-bordered table-condensed" cellspacing="0" width="100%">
  <thead>
            <tr>
                <th style='width:5px;'>&nbsp;</th>
                <th style='width:10px;'>ID</th>
                <th style='width:400px;'>Name</th>
                <th style='width:50px;'>Gender</th>
                <th style='width:20px;'>Contact No.</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody> 
        </tbody>    
    </table>


</div>
<div id='dialog1'></div>






<script type="text/javascript">

$(document).ready(function(){
setPersonTable();
 $('#dialog1').jseDialog({
autoOpen:false,
},function(){   $("#wrapper").toggleClass("toggled"); });     
});
/*********************************/
function SYS_printByPersonnel(pid)
{
x=(screen.width/2)-((900/2)+10);
y=(screen.width/2)-((600/2)+50);    
window.open(URL+"index.php/main/loadPersonnelPrintProfile?pid="+pid+"","","width=900,height=600,top="+y+",left="+x+"");
}
function SYS_printPersonnel(){
x=(screen.width/2)-((900/2)+10);
y=(screen.width/2)-((600/2)+50);    
window.open(URL+"index.php/main/loadPersonnelPrintList","","width=900,height=600,top="+y+",left="+x+"");

}


function setPersonTable(){
SYS_TableStart('#table_idd'); 
$.post(URL+"index.php/main/loadPersonReportList").done(function(data){
$('#table_idd tbody').html(data);
SYS_TablefirstInstance('#table_idd');    


});
}


function SYS_addPersonnel(){
$.post(URL+"index.php/main/loadAddPersonnelForm",{mode:"add",pid:""}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
 
});
}


function SYS_editPersonnel(pid){
$.post(URL+"index.php/main/loadAddPersonnelForm",{mode:"edit",pid:pid}).done(function(data){
$('#dialog1').html(data);
$("#wrapper").toggleClass("toggled"); 
$('#dialog1').jseDialog('open');
 
});
}

</script>