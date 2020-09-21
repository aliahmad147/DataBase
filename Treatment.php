<html>
	<head>
		<title>Treatment</title>
		<link type="text/css" rel="stylesheet" href="mystyle.css">
		<style type="text/css" >
			body{
				padding-top:10px;
				padding-right:5%;
				padding-left:5%;
				//margin-top:20px;
				background-size: 100% 100%;
				
				background-color:#BFC9CA;
			}
			
			.main_box{
			padding:10px;
			height:85%;
			width:100%;
			border:2px solid #D2D2D2;
			background-color:#F0F3F4;
			}
			
			.myDIV{
					width: 100%;
					height: 10%;
					text-shadow: 1px 2px #5DADE2;
					//background-col or:#5D6D7E;
					//border:1px solid green;
				}
			.subbox1{
					width: 45%;
					height: 90%;
					float :left;
					text-align:center;
					padding:10px;
					margin:10px;
					position:relative;
					left:2%;
					//align :center;	
					//background-color: red;
			//		border:2px solid red;
			}
			.subbox2{
					width: 30%;
					height: 60%;
					float :left;
					text-align:center;
					padding:10px;
					margin:10px;
					position:relative;
					left:2%;
					//align :center;	
					//background-color: red;
					//border:2px solid black;
			}
			tr{
				background-color:white;
				border:3px solid red;
				text-align:center;
				
				background-color:#F0F3F4;
			}
			table{
				//border:3px solid black;
			}
			.button {
			
			width: 100px;
			height: 40px;
			background-color: #AED6F1;
			padding: 10px 25px;
			border:2px solid #cacece;
			cursor: pointer;
			position:relative;
	}
	.table1{
		padding: 10px;
	}
	td{
	
	}
	.IN_box{
			width: 228px;
			height: 20px;
			background-color:#F3F4F4;
			border:2px solid #cacece;
	}
	h1{
		background-color:#EBF5FB;
	}


		</style>
	</head>
	<body>
	<script language="javascript" type="text/javascript">
function forAdd(fflag)
{
    document.form2.flag.value = fflag;
    document.form2.submit();
}
function removeSpaces(str1) {
       alert('from function:' + str1);
		str1 = str1.trim();
		while (str1.indexOf(' ',1)>0)
		{
		   str1 = str1.replaceAll(" ","&nbsp;");	
		}
		//document.write("from removeSpaces:" + str1);
		return str1;
}
function notNull(str2){
    if (str2=="")
       alert('Enter user id to display its details');
}

</script>



<?php  // example 2.1 ..creating a database connection 
//include("core/connection.php");
include_once('db_config.php');

  $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = THE_RAIN)(PORT = 1521)) ) (CONNECT_DATA = (SID = ali) ) )"; 
   $db_user = "scott"; 
   $db_pass = "tiger"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { 
	$sql_update = "UPDATE Treatment
				SET Start_date = TO_DATE('$_POST[Start_date]','DD-MM-YYYY'),
				End_date=TO_DATE('$_POST[End_date]','DD-MM-YYYY'),
				P_id='$_POST[P_id]',
				D_id='$_POST[D_id]',
				Com_id='$_POST[Com_id]'".
				"WHERE T_id ='$_POST[T_id]'";
				
      $sql_select = "SELECT *".
                  " FROM Treatment".
                  " WHERE T_id='$_POST[T_id]' AND P_id='$_POST[P_id]' AND D_id='$_POST[D_id]' AND Com_id='$_POST[Com_id]'";
				  
      $sql_insert="insert into Treatment(T_id,Start_date,End_date,P_id,D_id,Com_id)
                            values ('$_POST[T_id]',TO_DATE('$_POST[Start_date]','DD-MM-YYYY'),TO_DATE('$_POST[End_date]','DD-MM-YYYY'),'$_POST[P_id]','$_POST[D_id]','$_POST[Com_id]')";
	         $sql_Delete = "DELETE FROM Treatment".
                  " WHERE T_id='$_POST[T_id]' AND P_id='$_POST[P_id]' AND D_id='$_POST[D_id]' AND Com_id='$_POST[Com_id]'";
      $Msg_Desc = "";
      if ($_REQUEST[flag] == 1){
           $query_id = oci_parse($con, $sql_insert);
		   echo"ID OF EXECUTION  $query_id";
           $run = oci_execute($query_id);
		   if($run){
		   echo"Success";
		   }
           //$Msg_Desc = "Record&nbsp;is&nbsp;successfully&nbsp;inserted/updated";
      } else if ($_REQUEST[flag] == 2) {	
           $query_id2 = oci_parse($con, $sql_update);
           $run_update = oci_execute($query_id2);
		   if($run_update){
		   echo"SUCCESS";
		   }
           $Msg_Desc = "Record&nbsp;is&nbsp;successfully&nbsp;inserted/updated";							
      } else if ($_REQUEST[flag] == 3) {
 // find records on the basis of key which is send using POST method
			$query_id3 = oci_parse($con,$sql_select);
        	$runselect = oci_execute($query_id3);
        	$rs_arr = oci_fetch($query_id3,OCI_BOTH+OCI_RETURN_NULLS);
			if($runselect){
				echo "SUCCESS";
			}
        echo"FOR SELECT $rs_arr variable";
      	  while($row = oci_fetch_array($query_id3,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		  echo"FOR SELECT IN LOOP";
		    $T_id = $row[0];
        	$Start_date = $row[1];
	        $End_date = $row[2];
	        $P_id = $row[3];
			$D_id = $row[4];
	        $Com_id=$row[5];
			//echo"$W_id";
		  } //while
      }  //main if
	  else if($_REQUEST[flag] == 4){
		$query_id4 = oci_parse($con, $sql_delete);
		$run = oci_execute($query_id4);
		if($run){
		   echo"Success";
		}
	  }
	  else if($_REQUEST[flag] == 5){
	  echo"HAIR";
		header('location:/project/hospital_main.php');
	  }
		if ($run || $run_update)
		{
			//$e=oci_error(query_id);
			//var_dump($e);
			$Msg_Desc = "Record&nbsp;is&nbsp;successfully&nbsp;inserted/updated";
		} else {
		    $Msg_Desc = "Record&nbsp;is&nbsp;not&nbsp;inserted/updated";
		}
		oci_commit($con);
		//oci_free_statement($query_id);
		
		oci_close($con);
}
		else 
      { die('Could not connect to Oracle: '); }
?>	
<div class="main_box">
		<div class="myDIV" align="center"><h1><font color=#5499C7> Treatment FORM </h1></div>
		<br>
						  <form  name="form2" method="POST" action="treatment.php">
			<div class="subbox1"> 
				<?php echo "<h3>Register</h3>";?>
						
		<Table class ="table1" padding=10>
					<tr>
						<input type="hidden" name="flag" value="">
					</tr>
					
				  <table align=center border="0" border-colour=black cellpadding="2" width="375"  >
					<tr>
						<td width="150" align="left">*Treatment_ID</td>
						<td width="211"><input type="text" class="IN_box" name="T_id"  onfocus="" value=<?php echo $T_id?>></td>
					</tr>
					<tr>
						<td width="150" align="left">Treatment Start date</td>
						<td width="211">
						<input name="Start_date" type="date" class="IN_box" value=<?php echo $start_date ?> ></td>
					</tr>
					<tr>
						<td width="150" align="left">Treatment End date</td>
						<td width="211">
						<input type="date" class="IN_box" name="End_date"  value=<?php echo $End_date ?>></td>
					</tr>
					<tr>
						<td width="150" align="left">*Patient_ID</td>
						<td width="211">
						<input type="text" class="IN_box" name="P_id"  value=<?php echo $P_id ?>></td>
					</tr>
					<tr>
						<td width="150" align="left">*Doctor_ID</td>
						<td width="211">
						<input type="text" class="IN_box" name="D_id"  value=<?php echo $D_id ?>></td>
					</tr>
					<tr>
						<td width="150" align="left">*Complain ID</td>
						<td width="211">
						<input type="text" class="IN_box" name="Com_id" value=<?php echo $Com_id ?>></td>
					</tr>
				</table>
		</Table>
				
				
			</div> 
			<div class="subbox2">
				<?php echo "<h3>OPTIONS</h3>";?>
								<table align="center" border="0" width="80%" height="100" >
					<tr>
						<td><p><input class="button" type="submit" name ="AddRec" value="   Add   "  onclick="forAdd(1);"></p></td>  
					</tr>
					<tr>
						<td><p><input class="button" type=button name="UpdateRec" value="Update" onClick="forAdd(2);"></p></td>
					</tr>
					<tr>
						<td><p><input class="button" type=submit name="FindRec" value="Find" onClick="forAdd(3);"></p></td>
					</tr>
					<tr>
						<td><p><input class="button" type=button name="DELRec" value=" Delete " onClick="forAdd(4);"></p></td>
					</tr>
					<tr>
						<td><p><input class="button" type=button name="BACK" value="BACK" onClick="forAdd(5);"></p></td>
					</tr>
				</table>
			</div>
					</form>
					
					</div>
</body>
	
</html>