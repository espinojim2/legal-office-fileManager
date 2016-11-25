<table class='table table-condensed table-bordered' width="100%" style='font-size:12px;' >
<?php
$i=0;
$accountType=$_POST['accountType'];
$query = $this->db->query("select * from  sys_module order by moduleOrder");
$cc=0;
$r=$query->result_array();
for($x=0;$x<count($r);$x++)
{
	$moduleId=$r[$x]['moduleId'];
	$moduleName=$r[$x]['moduleName'];
?>
	<tr  width="55%" style="background-color:rgba(0,0,0,0.1);"><td width="40%" style='padding:0.5%;'><strong>&nbsp;&nbsp;<?php echo $moduleName ?></strong></td> 
    </tr>
<?php

$q = $this->db->query("select * from  sys_systempages where moduleId='$moduleId' order by pageOrder");
$r1=$q->result_array();
 for($y=0;$y<count($r1);$y++)
  {
   
   	$pageId=$r1[$y]['pageId'];

		$q2 = $this->db->query("select * from  sys_account_type_template where accountTypeId='$accountType' and pageId='$pageId'");
		$found=$q2->num_rows();
		$xx=$q2->result_array();
		$pageName=$r1[$y]['pageName'];
		$view=(isset($xx[0]['aview']))?$xx[0]['aview']:"";
		if($view==1) $aview="checked";
			else         $aview="";


		

		
		echo '<tr style="cursor:pointer;">';

		if($found){
			?> 
			<td width="7%" class="try" style='padding:0.5%;' ><label>
                
              <input type='hidden' id='page<?= $cc; ?>' value='<?= $pageId; ?>'>      

				<input class="cb1-element " type="checkbox" <?= $aview; ?> name="ch_<?php echo $pageId ?>" id="<?php echo $pageId ?>"/></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $pageName ?></td>
            </tr>  
            <?php
		}else{
			?>
			<td width="7%" class="try" style='padding:0.5%;'>
              <input type='hidden' id='page<?= $cc; ?>' value='<?= $pageId; ?>'>

				<label><input class="cb1-element" type="checkbox" <?= $aview; ?> name="ch_<?php echo $pageId; ?>" id="<?php echo $pageId ?>" /></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $pageName ?></td>
           
            </tr>  
            <?php

		}
		echo '</tr>';
$cc++;
  }//end sub while





}//end module while







?>

</table>
<input type='hidden' id='ccount' value='<?= $cc; ?>'>
