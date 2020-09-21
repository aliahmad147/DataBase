<html>
	<head><title>query2</title>
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
				$sql_patient_select="Select w.W_id,w.W_name,w.speciality,w.charges,w.DS_id,w.NS_id ".
											"FROM ward w,DAY_NIGHT_SISTER dn, Care_Unit cu,Staff_Nurse sn ".
											" WHERE w.Ds_id=dn.dn_id   AND w.w_id=cu.W_id AND cu.S_id=sn.S_id ";
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
									 echo nl2br("<h3><font color=#5499C7>Ward ID".$sp.$sp.$sp.$sp.$sp."Ward name".$sp.$sp.$sp.$sp.$sp."Speciality".$sp.$sp.$sp.$sp.$sp."charges".$sp.$sp.$sp.$sp.$sp."Day sister ID".$sp.$sp.$sp.$sp.$sp."Night Sister ID</font></h3>\n");
									 while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
									  {
										$W_id=$row[0];
										$W_name=$row[1];
										$Speciality=$row[2];
										$charges=$row[3];
										$DS_id=$row[4];
										$NS_id=$row[5];
									  	echo nl2br("$W_id $sp $sp $sp $sp $sp $W_name $sp $sp $sp $sp $sp $Speciality $sp $sp $sp $sp $sp $charges $sp $sp $sp $sp $sp $Ds_id $sp $sp $sp $sp $sp $NS_id\n");
									  }
									  ?>
		</div>
	</body>
</html>