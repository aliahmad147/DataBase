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
			

      $sql_select="select distinct c.C_id,c.C_name,c.Specialization ".
                  " from Consultant c ".
                  " where c.Specialization is NOT NULL";


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
								echo nl2br("<h3><font color=#5499C7>Consultant ID".$sp.$sp.$sp.$sp.$sp."Consultant Name".$sp.$sp.$sp.$sp.$sp."Specialization</font></h3>\n");
								  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
								  {
									$C_id = $row[0];
									$C_name = $row[1];
									$Specialization=$row[2];
									 	echo nl2br("$C_id $sp $sp $sp $sp $sp $C_name  $sp $sp $sp $sp $sp $Specialization\n");
									//echo"$W_id";
								  }
									  ?>
		</div>
	</body>
</html>