<html>
	<head><title>query9</title>
	<style type="text/css">
		body{
			border:2px solid black;
			background-color:white;
			//height:100%;
			//width:100%;
			padding:5%;
		}
		.main{
			
			text-align:center;
			backgrond-color:blue;
			border:3px dotted black;
		}
		.box1{
			width: 50%;
			height: 50%;
			border:2px solid black;
			float :left;
			padding:5px;
			position:relative;
		}
		.drop_down{
			background-color:#F3F4F4;
			border: 2px solid #cacece;
			border-radius:3px;
		}
	
		
	</style>
	</head>
	<body>
		<?php
			   $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = THE_RAIN)(PORT = 1521)) ) (CONNECT_DATA = (SID = ali) ) )"; 
			   $db_user = "scott"; 
			   $db_pass = "tiger"; 
			   $con = oci_connect($db_user,$db_pass,$db_sid); 
			   
			   if($con){ 
			   $D_id="";
			   $D_name="";
			   $t_name="";
			   $Position="";
			   $Date_grade="";
			   $Performance="";
			   $sp='_';
			   
				  


	//										echo $sql_consultant_select;
			//								echo "$sql_select";
			   }
			   else{
					echo"not connect";
				}
		
		?>
		<h1><font color=#5499C7> Query Result:- </font></h1>
		<div class="main">
		
			<?php
				
				//$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
							echo nl2br("<h3><font color=#5499C7>Doctor_id".$sp.$sp.$sp.$sp.$sp."D_name".$sp.$sp.$sp.$sp.$sp."Type".$sp.$sp.$sp.$sp.$sp."Position".$sp.$sp.$sp.$sp."Date_grade".$sp.$sp.$sp.$sp."Performance</font></h3>\n");
			echo "$sql_select";
			//$row1 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
			$a="SELECT doctor.D_id,doctor.D_name,Doctor_type.T_name,previous_record.Position,progress.Date_grade,progress.Performance FROM doctor ,previous_record ,progress ,Doctor_type WHERE doctor.D_id=previous_record.D_id AND doctor.D_id=progress.D_id AND doctor.type_no= Doctor_type.T_id";
     $sql_select="SELECT d.D_id,d.D_name,dt.T_name,PR.Position,P.Date_grade,P.Performance FROM doctor d,previous_record PR,progress p,Doctor_type dt WHERE d.D_id=PR.D_id AND d.D_id=p.D_id AND d.type_no=dt.t_id";
				  //$sql_select="Select * From emp";
			$query_id3 = oci_parse($con,$a);
				$run2 = oci_execute($query_id3);
				
			  while($row33 = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
			  {
				$D_id = $row33[0];
				$D_name=$row33[1];
				$t_name = $row33[2];
				$Position = $row33[3];
				$Date_grade = $row33[4];
				$Performance = $row33[5];
				echo nl2br("$D_id".$sp.$sp.$sp.$sp.$sp.$sp.$sp."$D_name".$sp.$sp.$sp.$sp.$sp.$sp.$sp."$t_name".$sp.$sp.$sp.$sp.$sp.$sp.$sp."$Position".$sp.$sp.$sp.$sp.$sp.$sp."$Date_grade".$sp.$sp.$sp.$sp.$sp.$sp."$Performance\n");
					//echo nl2br("$row[0] $sp $sp $sp $sp $sp  $t_name $sp $sp $sp $sp $sp $Position $sp $sp $sp $sp $sp $Date_grade $sp $sp $sp $sp $sp $Performance\n");
			  }
				  ?>
		</div>
	</body>
</html>