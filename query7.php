<html>
	<head><title>query 7</title>
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
				$sql_patient_select="SELECT p.P_id, p.P_name,c.Com_id,c.C_description,t.T_id,t.T_description,count(c.Com_id)  ".
											"FROM Patient p, complain c, treatment t ".
											" WHERE p.P_id=c.p_id AND p.P_id=t.p_id and c.Com_id=t.Com_id ".
											"GROUP BY p.P_id, p.P_name,c.Com_id,c.C_description,t.T_id,t.T_description ".
											"HAVING count(c.com_id)>=1 ";
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
									 echo nl2br("<h3><font color=#5499C7>Patient ID ".$sp.$sp.$sp.$sp.$sp."Name ".$sp.$sp.$sp.$sp.$sp."Complain ID".$sp.$sp.$sp.$sp.$sp."Complain Name".$sp.$sp.$sp.$sp.$sp."Treatment ID".$sp.$sp.$sp.$sp.$sp."Treatment Name".$sp.$sp.$sp.$sp.$sp."count</font></h3>\n");
									 while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
									  {
										$P_id=$row[0];
										$P_name=$row[1];
										$Com_id=$row[2];
										$C_description=$row[3];
										$T_id=$row[4];
										$T_description=$row[5];
										$Count=$row[6];
										
									  	echo nl2br("$row[0] $sp $sp $sp $sp $sp $row[1] $sp $sp $sp $sp $sp $row[2] $sp $sp $sp $sp $sp $row[3] $sp $sp $sp $sp $sp  $row[4] $sp $sp $sp $sp $sp $row[5] $sp $sp $sp $sp $sp $row[6]\n");
									  }
									  ?>
		</div>
	</body>
</html>