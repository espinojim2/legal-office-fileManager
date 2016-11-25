<div style='padding:1%; padding-top:3%;'>
<div class='col-sm-8' align='center'>
 <div style='opacity:0.4; width:50%; height:auto; padding:5%; background:rgba(72,112,141,0.4); border-radius:2em;'><span style='font-size:90px;'>B.U.</span></div>
</div>
<div class='col-sm-4'>
<div style='padding:6%; width:100%; border-radius:1em; background:rgba(
0,0,0,0.2);'>
<h2 style='color:rgba(0,0,0,0.7);'>Welcome</h2>
<h4>Today is <?php echo date("F d Y"); ?></h4>

<div class='datefield' style='width:100%; background:#FFF;'></div>
</div>
</div>
</div>


 <script type="text/javascript">
$(document).ready(function(){
$('.datefield').datepicker({
 autoclose: true,
 todayBtn: false,
  clearBtn: false,
 orientation: "top auto", //bottom auto,auto left,bottom left,auto right,top right,bottom right
 todayHighlight: true,
// defaultViewDate: { year: 1977, month: 04, day: 25 }
});

});
 </script>