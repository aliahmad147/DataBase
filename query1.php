<html>
	<head><title>query1</title>
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
			   $C_name="";
			   $sp='_';
					$sql_consultant_select="Select c.C_name,d.D_name ".
											"FROM Consultant c INNER JOIN Doctor d ON c.C_id=d.C_id ".
											"Group By c.C_name,d.D_name ".
											"ORDER BY c.C_name";
	//										echo $sql_consultant_select;
										//	echo "$sql_consultant_select";
			   }
			   else{
					echo"not connect";
				}
		
		?>
		<h1><font color=#5499C7> Query Result:- </font></h1>
		<div class="main">
		
			<?php
				$query_id1 = oci_parse($con,$sql_consultant_select);
									$run = oci_execute($query_id1);
									 $rs_arr = oci_fetch($query_id1,OCI_BOTH+OCI_RETURN_NULLS);
									 echo nl2br("<h3><font color=#5499C7>Consultant Name".$sp.$sp.$sp.$sp.$sp."Doctor Name</font></h3>\n");
									while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
									  {
										$C_name=$row[0];
										$D_name=$row[1];
									  	echo nl2br("$C_name $sp $sp $sp $sp $sp $D_name\n");
									  }
									  ?>
		</div>
	</body>
</html>