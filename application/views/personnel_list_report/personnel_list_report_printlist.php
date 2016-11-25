<script type="text/javascript">
window.print();
</script>
<center><h3>List of Personnels</h3></center>
<table id="table_idd" border='1' style='border-collapse:collapse;'  class="table table-striped table-hover table-bordered table-condensed" cellspacing="0" width="100%">
  <thead>
            <tr>
                <th style='width:5px;'>&nbsp;</th>
            
                <th style='width:400px;'>Name</th>
                <th style='width:50px;'>Gender</th>
                <th style='width:20px;'>Contact No.</th>
                <th>Status</th>
            
            </tr>
        </thead>
        <tbody> 
             <?php
            $str="";
            $q=$this->db->query("select * from sys_p_person where 1  order by lname,remark");
            $r=$q->result_array();
            for($x=0;$x<count($r);$x++){
            $id=$r[$x]['pid'];
            $name=ucwords($r[$x]['lname']." ".$r[$x]['ename'].", ".$r[$x]['fname']." ".$r[$x]['mname']);
            $gen=($r[$x]['gender']=='m')?"Male":"Female"; 
            $contact=$r[$x]['contact'];
            $rem=($r[$x]['remark']=='1')?"<span class='text-success'>Active</span>":"<span class='text-warning'>Inactive</span>";

            $str.="
            <tr>
            <td>".($x+1)."</td>
           
            <td>$name</td>
            <td>$gen</td>
            <td>$contact</td>
            <td><b>$rem</b></td>
           
            </tr>
            ";    
            }
            echo $str;
            ?> 
        </tbody>    
    </table>