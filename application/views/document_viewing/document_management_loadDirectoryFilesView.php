<?php
$fid=$_POST['fid'];
$loc=$this->mainmodel->file_data_main($fid);
$location=base_url()."".$loc[0]['file_location'];

$e=explode(".",$location);
$prop=$e[count($e)-1];

if($prop=='png' || $prop=='jpg' || $prop=='gif' || $prop=='jpeg' || $prop=='pdf')
{
echo "
<embed src='$location' style='width:90%; height:600px;'></embed>
";	
}
else
{
echo "
This Type of File is NOT available for viewing but and can only be downloaded in this Software
";	
}
?>
