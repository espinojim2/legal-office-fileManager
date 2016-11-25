<style type="text/css">
.buttonActive{ font-size: 12px;}
</style>
 <form method="get" action="" >
<table border="0" cellpadding="5" cellspacing="5" width="100%"  style="margin-top:3%; color:#000;  width:97%; margin-left:0%; color:rgba(0,0,0,0.5); margin-left:2%; margin-right:2%;" >
<tr >
<td width="18%">
&nbsp;&nbsp;&nbsp;<strong>User Type: </strong>
</td>
<td>

<?php
$acct=$this->mainmodel->getAccountTypes();
$str="";
for($x=0;$x<count($acct);$x++){
$id=$acct[$x]['accountTypeId'];
$actype=$acct[$x]['accountType'];	
$str.="
<option value='$id'>$actype</option>
";
}

?>
<select id='accountType' onchange="set_pageauto_employeeopt();"  style="width:300px;" class="form-control">
<?php  echo $str; ?>
</select>
</td>
</tr>
<tr>
<td >
&nbsp;&nbsp;&nbsp;<strong>User Name: </strong>
</td>
<td>
  <br>
<div id="div_employee">

</div>
</td>
</tr>
</table>


<table border="0" cellpadding="6" cellspacing="" width="100%" style="color:rgba(0,0,0,0.6); ">
<tr>
<td colspan="2" align="right">
<button type="button" id="check1" class="btn btn-primary buttonActive" onclick='set_all_template_check()' >Check All</button>
<button type="button" id="uncheck1" class="btn btn-primary buttonActive" onclick='unsetset_all_template_check()'>Un-Check All</button>
<button type="button" class=" btn btn-primary buttonActive" name="save_page_authorization" onclick='ssave_page_authorization()'>SAVE</button>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table><br>
<input type="hidden" id="isChkd" value="true" /> 
<div id="div_authorization" style='padding:2%;'>

</div>
</form>
<br /><br />
<script type="text/javascript">
$(document).ready(function(e) {
  set_pageauto_employeeopt();
 
});
function set_pageauto_employeeopt() // gets name options
{
accounttype=$('#accountType').val();
$.post(URL+"index.php/main/page_autorization_setEmployeeOpt",{accounttype:accounttype}).done(function(data){
$('#div_employee').html(data);
set_page_authorization();
});
}

function set_page_authorization() /*page_template page set page templates*/
{
accountType=$('#accountType').val();
personid=$('#personid').val();
$.post(URL+'index.php/main/set_page_authorization',{accountType:accountType,personid:personid}).done(function(data){
$('#div_authorization').html(data);
});
}

function ssave_page_authorization() /*page authorization function*/
{	
	accountType=$('#accountType').val();
	personid=$('#personid').val();
if(personid=="" || personid==null)
{
bootbox.alert("A person should be assigned!", function() {
$('#personid').css({'border-color':'red'});
 });
}
else{
	ccount=$('#ccount').val();
	pageid=[]; view=[]; 
    for(x=0;x<ccount;x++){
     var page=$('#page'+x).val();
       	 pageid[x]=page;
   	 view[x]=($('#'+page).is(':checked'))?"1":"0";
   	
    }
$.post(URL+"index.php/main/page_authorization_save",{
	accountType:accountType,
	personid:personid,
	pageid:pageid,
	view:view
}).done(function(data){
  set_page_authorization();
  bootbox.alert("Done Saving", function() { console.log("Alert Callback"); });
searchnavi();
});
}
}
</script>        
