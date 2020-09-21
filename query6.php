<html>
	<head><title>query 6</title>
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
				$sql_patient_select="SELECT c.C_description,c.C_date,t.T_id,D.D_name,t.T_description,PR.Position,PR.Establishment  ".
											"From Complain C,Treatment t,Previous_record PR,Doctor D ".
											" Where C.Com_id=t.Com_id AND t.d_id=d.D_id AND d.D_id=pr.D_id ";
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
									 echo nl2br("<h3><font color=#5499C7>Complain ".$sp.$sp.$sp.$sp.$sp."Complain Date".$sp.$sp.$sp.$sp.$sp."Treatment ID".$sp.$sp.$sp.$sp.$sp."Treatment Name".$sp.$sp.$sp.$sp.$sp."Position".$sp.$sp.$sp.$sp.$sp."Establishment</font></h3>\n");
									 while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
									  {
										$C_description=$row[0];
										$C_date=$row[1];
										$T_id=$row[2];
										$D_name=$row[3];
										$T_description=$row[4];
										$Position=$row[5];
										$Establishment=$row[6];
										
									  	echo nl2br("$row[0] $sp $sp $sp $sp $sp $row[1] $sp $sp $sp $sp $sp $T_id $sp $sp $sp $sp $sp $D_name $sp $sp $sp $sp $sp  $T_description $sp $sp $sp $sp $sp $Position $sp $sp $sp $sp $sp Establishment\n");
									  }
									  ?>
		</div>
	</body>
</html>