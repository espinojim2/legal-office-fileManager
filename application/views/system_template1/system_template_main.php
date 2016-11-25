<style type="text/css">
.chkbtn{ font-size: 12px; }
</style>                      
<table border="0"  cellpadding="5" cellspacing=""  style="color:#000; margin-top:3%;  width:97%; margin-left:0%; color:rgba(0,0,0,0.5); margin-left:2%; margin-right:2%;" >
<tr>
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
<select name="accountType"  id='accountType' onchange="set_page_template()" style="width:300px;" class="form-control">
<?php echo $str; ?>
</select>


</td>
<tr>
<td colspan="2" align="right">
<button type="button" class='btn btn-primary chkbtn' onclick='set_all_template_check()'>Check All</button>
<button type="button" class='btn btn-primary chkbtn' onclick='unsetset_all_template_check()'>Un-Check All</button>
<button type="button" class='btn btn-primary chkbtn' name="save_page_template" onclick='ssave_page_template()'>SAVE</button>
&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table>
<br>
<input type="hidden" id="isChkd" value="true" /> 
<div id="div_template" style='padding:2%;'></div>
<script type="text/javascript">
$(document).ready(function(){
set_page_template();
});
function set_page_template() /*page_template page set page templates*/
{
accountType=$('#accountType').val();
$.post(URL+'index.php/main/set_page_template',{accountType:accountType}).done(function(data){ 
$('#div_template').html(data);
});
}
function set_all_template_check() /*checks all checkbox in page_template*/
{
$('.cb1-element').prop('checked',true);
$('.ch').show();
}
function unsetset_all_template_check(){
$('.cb1-element').prop('checked',false);	
$('.ch').hide();
}
function page_template_updateAuthorization(){ /*Updates Page Authorization when changes are made here*/
accountType=$('#accountType').val();
$.post(URL+"index.php/main/loadPageTemplateUpdateAuthorization",{accountType:accountType}).done(function(data){

 searchnavi();

  });
}

function ssave_page_template() /*saves page template module*/
{	

	accountType=$('#accountType').val();
	ccount=$('#ccount').val();
	pageid=[]; view=[]; 
    for(x=0;x<ccount;x++){
     var page=$('#page'+x).val();
   	 pageid[x]=page;
   	 view[x]=($('#'+page).is(':checked'))?"1":"0";
    }


$.post(URL+"index.php/main/page_template_save",{
	accountType:accountType,
	pageid:pageid,
	view:view
}).done(function(data){
page_template_updateAuthorization();

bootbox.alert("Done Saving", function() { console.log("Alert Callback"); });
setTimeout(function(){ set_page_template();   },1000); 


});

}



</script>
