<html>
	<head><title>query4</title>
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
					$sql_consultant_select="SELECT d.D_id,D.d_name,p.P_id,p.P_name,SN.S_id,SN.S_name ".
											"FROM patient p,doctor d,ward w,care_unit cu,staff_nurse SN,treatment t ".
											"WHERE 	p.W_id=w.W_id AND w.W_id=cu.W_id AND cu.CA_id=SN.CA_id AND p.P_id=t.P_id AND t.D_id=d.D_id AND d.type_no=(SELECT type_no FROM doctor_type WHERE T_name='Junior Houseman')";
	//										echo $sql_consultant_select;
										//	echo "$sql_consultant_select";
			   }
			   else{
					echo"not connect";
				}
	            echo"$sql_consultant_select";	
		?>
		<h1><font color=#5499C7> Query Result:- </font></h1>
		<div class="main">
		
			<?php
				$query_id1 = oci_parse($con,$sql_consultant_select);
									$run = oci_execute($query_id1);
									 $rs_arr = oci_fetch($query_id1,OCI_BOTH+OCI_RETURN_NULLS);
									 echo nl2br("<h3><font color=#5499C7>Doctor ID".$sp.$sp.$sp.$sp.$sp."Doctor Name".$sp.$sp.$sp.$sp.$sp."Patient ID".$sp.$sp.$sp.$sp.$sp."Patient Name".$sp.$sp.$sp.$sp.$sp."Staff nurse ID".$sp.$sp.$sp.$sp.$sp."Staff nurse name </font></h3>\n");
									while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
									  {
										$D_id=$row[0];
										$D_name=$row[1];
										$P_id=$row[2];
										$P_name=$row[3];
										$S_id=$row[4];
										$S_name=$row[5];
										
									  	echo nl2br("$D_id $sp $sp $sp $sp $sp $D_name $sp $sp $sp $sp $sp $P_id$sp $sp $sp $sp $sp$P_name$sp $sp $sp $sp $sp$S_id$sp $sp $sp $sp $sp $S_name \n");
									  }
									  ?>
		</div>
	</body>
</html>