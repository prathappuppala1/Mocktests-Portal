<meta http-equiv="refresh" content="5">
<?php

require_once("../../site-settings.php");
if(isadminloggedin())
{
?>

      
<div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        
        <div class="panel-body table-responsive">
   <table  width="100%" style="text-align:justify;" class="table table-bordered table-striped">
                <tbody>
					<tr><th colspan='2'><center>Answers <b style='color:red;'>After Exam Excel </b> mode</center></th></tr>
			</tbody>
			</table>
            <table id="example" class="table display">
                <thead>
                    <tr>
                        <th>Event ID</th>
                        <th>Title</th>
                        <th>Table</th>
                        <th>Date</th>
                        <th>Display</th>
                        <th>End</th>
                        <th>Logins</th>
                        <th>Submits</th>
                        <th>Validations</th>
                    </tr>
                </thead>
             
             
                <tbody>
				<?php
				if($teckzitemode)
				{
				$q=mysql_query("SELECT * FROM examdetails WHERE eid!='NULL' and visibility='1' and answersmode='answersafterexamexcel'");
			    }
			    else
			    {
				$q=mysql_query("SELECT * FROM examdetails WHERE eid='NULL' and visibility='1' and answersmode='answersafterexamexcel'");
			    }
				while($w=mysql_fetch_array($q))
				{
				$tab=$w['tkey'];
					?>
                    <tr id="qwe<?php echo $w['sno'];?>">
                        <td><?php if($w['eid']!='NULL'){$eid=$w['eid'];mysql_select_db($teckzitedb,$con);$h=mysql_fetch_array(mysql_query("SELECT * FROM events WHERE eid='$eid'"));echo $h['branch']." - ".$h['eventname'];}else{echo "NULL";}
                          $Starttime=$w['display'];
	                   $endtime=$w['endat'];
                   	  if($ptime>$Starttime && $ptime<$endtime){echo "&nbsp;&nbsp;<mark>Online</mark>";}
                      
                        ?></td>
                        <td><?php mysql_select_db($dbname,$con);echo $w['title'];?></td>
                        <td><?php echo $w['tkey'];?></td>
                        <td><?php echo $w['date'];?></td>
                        <td><?php 
    $starttime=$w['display'];                    
	$H=substr($starttime,0,2);
	$M=substr($starttime,2,2);
	$m='AM';
	$H-=10;
	if ($H>=12)
		{
		$m='PM';
		}
	if ($H>12)
		{
		$H=$H-12;
		}
	if ($H<10)
		{
		$H='0'.$H;
		}
	$startt=$H.':'.$M.' '.$m;
	echo $startt;
                        ?></td>
                        <td><?php 
    $starttime=$w['endat'];                    
	$H=substr($starttime,0,2);
	$M=substr($starttime,2,2);
	$m='AM';
	$H-=10;
	if ($H>=12)
		{
		$m='PM';
		}
	if ($H>12)
		{
		$H=$H-12;
		}
	if ($H<10)
		{
		$H='0'.$H;
		}
	$startt=$H.':'.$M.' '.$m;
	echo $startt;

                        ?></td>
                        <td><?php mysql_select_db("quiz_exams",$con); echo mysql_num_rows(mysql_query("SELECT * FROM $tab"));?></td>
                <td><?php mysql_select_db("quiz_exams",$con); echo mysql_num_rows(mysql_query("SELECT * FROM $tab WHERE status='Y'"));?></td>
               
                        <td>
                       <?php echo $w['validations'];?>
                       </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

      </div>
    </div>
    <!-- End Panel -->
    </div>
    

    
    <script src="js/datatables/datatables.min.js"></script>
    
    <?php } ?>
