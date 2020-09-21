<html>
	<head><title>query 10</title>
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
			   $P_id="";
			   $P_name="";
			   $P_gender="";
			   $P_DOB="";
			   $T_description="";
			   $D_name="";
			   $sp='_';
			

			
			
			
      $sql_select="SELECT p.P_id,p.P_name,p.P_gender,p.P_DOB,t.T_description,d.D_name".
                  " FROM doctor d,patient p,treatment t".
                  " WHERE p.P_id=t.P_id AND t.D_id=d.D_id ";
				  


	//										echo $sql_consultant_select;
											echo "$sql_select";
			   }
			   else{
					echo"not connect";
				}
		
		?>
		<h1><font color=#5499C7> Query Result:- </font></h1>
		<div class="main">
		
			<?php
			
			
			
			
			
									$query_id3 = oci_parse($con, $sql_select);
									$runselect = oci_execute($query_id3);
									$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
								echo nl2br("<h3><font color=#5499C7>P ID".$sp.$sp.$sp.$sp.$sp."P Name".$sp.$sp.$sp.$sp.$sp."Gender".$sp.$sp.$sp.$sp."DOB".$sp.$sp.$sp.$sp."DESCRIPTION".$sp.$sp.$sp.$sp."Doctor Name </font></h3>\n");
								  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
								  {
									$P_id = $row[0];
									$P_name = $row[1];
									$P_gender = $row[2];
									$P_DOB = $row[3];
									$T_description = $row[4];
									$D_name = $row[5];
									
									
									 	echo nl2br("$row[0] $sp $sp $sp $sp $sp  $row[1] $sp $sp $sp $sp $sp $row[2] $sp $sp $sp $sp $sp $row[3] $sp $sp $sp $sp $sp $row[4] $sp $sp $sp $sp $sp $row[5]\n");
									//echo"$W_id";
								  }
									  ?>
		</div>
	</body>
</html>