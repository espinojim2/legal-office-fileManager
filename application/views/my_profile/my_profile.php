<?php
$this->load->view("mainpage");
?>
<script type="text/javascript"> $(document).ready(function(){ setMain(); });
function setMain(){ 
var user_pid=$('#user_person_id').val();
  $.post(URL+"index.php/main/locatePersonMyProfile",{pid:user_pid}).done(function(data){  $('#content').html(data); });  }
</script>
