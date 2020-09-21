<html>
	<head><title>query3</title>
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
			   $con = oci_connect($db_user,$db_pass); 
			   
			   if($con){ 
			   
			   $sp='_';
				$sql_patient_select="Select p.P_name,c.Com_id,t.T_description,t.Start_date,t.end_date ".
											"FROM Patient p,Complain c, Treatment t ".
											"WHERE p.P_id=c.P_id AND p.P_id=t.P_id AND c.Com_id=t.Com_id ";
			   }
			   else{
					echo"not connect";
				}
		
		?>
		<h1><font color=#5499C7> Query Result:- </font></h1>
		<div class="main">
		
			<?php
				$query_id1 = oci_parse($con,$sql_patient_select);
									$run = oci_execute($query_id1);
									 $rs_arr = oci_fetch($query_id1,OCI_BOTH+OCI_RETURN_NULLS);
									 if($run){
									 echo"success";
									 }
									 echo nl2br("<h3><font color=#5499C7>Patient Name".$sp.$sp.$sp.$sp.$sp."Complain_ID".$sp.$sp.$sp.$sp.$sp."Description".$sp.$sp.$sp.$sp.$sp."Start_Date".$sp.$sp.$sp.$sp.$sp."End Date</font></h3>\n");
									 while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
									  {
										$P_name=$row[0];
										$Com_id=$row[1];
										$T_description=$row[2];
										$Start_date=$row[3];
										$End_date=$row[4];
									  	echo nl2br("$P_name $sp $sp $sp $sp $sp $Com_id $sp $sp $sp $sp $sp $T_description $sp $sp $sp $sp $sp $Start_date $sp $sp $sp $sp $sp $End_date\n");
									  }
									  ?>
		</div>
	</body>
</html>