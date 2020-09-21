<html>
	<head>
	<title>Patient Record</title>
	<style type="text/css">
	body{
		//padding:20px;
				//padding-left:5%;
		padding-top:25px;
		padding-right:120px;
		padding-left:120px;
		padding-buttom:25px;
		
		background-size: 100% 100%;
		border: 4px solid black;
		background-color:#F0F8F7;
//		align:center;
	}
	.Main1{
			float :left;
			text-align:center;
			padding:10px;
			margin:10px;
			position:relative;
			left:5%;
	
		height:70%;
		width:80%;
		border: 4px dotted black;
		
	}
			.box1
		{
			background-color:#CDB2AD;
			border:2px solid black;
			margin: auto;
			padding: 10px;
			width:30%;
			height:80%;
		}
		hr{
			size:0px;
			align:right;
		}
		.main
		{
			background-color:white;
			border:1px solid blue;
			width:50%;
			height:70%;
		}
		.button {
			background-color: #white;
			padding: 10px 25px;
			border: none;
			cursor: pointer;
			position:relative;
			 left: 30%;
	}
	.rad{
		margin-left:10%;
	}
	.myDIV{
		width: 100%;
		height: 90%;
		leftL5%;
	//	padding:5px;
		background-color: #CAF8F2;
		border:1px dotted green;
}
	h1,h2{
		text-align:center;
	}
	table{
		width: 100%;
		height: 37%;
							padding:0% 5%;
	//	border:true;
	//	border-color:blue;
		
	}
	tr{
//	height:5px;
//	background-color:white;
//	border:3px solid red;
	text-align:center;
}
	
	
	</style>
	
	</head>
	<body>
<script language="javascript" type="text/javascript">
function forAdd(fflag)
{
    document.form3.flag.value = fflag;
    document.form3.submit();
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
	  $P_id="";
$P_name="";
$D_id="";
$D_name="";
$C_id="";
$P_DOB="";
$Com_id="";
$T_id="";
$Start_date="";
$End_date="";
      		  
	$sql_select1="SELECT p.P_id,p.P_name,d.D_id,d.D_name,co.C_id,p.P_DOB,c.Com_id,t.T_id,t.Start_date,t.End_date
				FROM Patient p,Doctor d,Consultant co,Treatment t,Complain c
				WHERE p.P_id='$_POST[P_id]' AND p.P_id=c.P_id AND p.P_id=t.P_id AND ". 
				"c.Com_id=t.Com_id AND ". 
				"t.D_id=d.D_id AND ". 
				"d.C_id=co.C_id AND ". 
				"co.C_id=c.C_id ";
 // find records on the basis of key which is send using POST method
 
 if($_REQUEST[flag] == 2){
 				//echo"$sql_select";
			$query_id3 = oci_parse($con,$sql_select1);
        	$runselect = oci_execute($query_id3);
        	//$rs_arr = oci_fetch($query_id3,OCI_BOTH+OCI_RETURN_NULLS);
			if($runselect){
			//	echo "SUCCESS";
				//echo"$sql_select1";

			while($row = oci_fetch_array($query_id3,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		   			//				  echo"IN LOOP";
			/*
			  $P_id = $row["P_id"];
				$P_name = $row["P_name"];
				$D_id = $row["D_id"];
				$D_name=$row["D_name"];
				$C_id = $row["C_id"];
				$P_DOB = $row["P_DOB"];
				$Com_id = $row["Com_id"];
				$T_id = $row["T_id"];
				$Start_date = $row["Start_date"];
				$End_date = $row["End_date"];
			  
		  */
		    $P_id = $row[0];
        	$P_name = $row[1];
	        $D_id = $row[2];
			$D_name=$row[3];
			$C_id = $row[4];
	        $P_DOB = $row[5];
	        $Com_id = $row[6];
	        $T_id = $row[7];
			$Start_date = $row[8];
			$End_date = $row[9];
			
		//	echo"$P_id,$P_name,$D_id,$D_name,$C_id,$P_DOB,$Com_id,$T_id,$Start_date,$End_date";
			//echo"$W_id";
		  } //while
			}
      	  
        //main if
	  //oci_free_statement($query_id);
}		
		oci_close($con);
}
		else 
      { die('Could not connect to Oracle: '); }
?>	
	
	
	<div class="myDIV">
	 <form  name="form3" method="POST" action="patient_record.php">
	 <input type="hidden" name="flag" value="">
		<h1>IVOR PAINE MEMORIAL HOSPITAL </h1>
		<h2>PATIENT RECORD</h2>
		<table align="center" border="0" width="100%" cellpadding="2">
			<tr>
				<td width="150" align="left"><h3>Patient No </h3></td>
				<td width="150"><input type="text" class="IN_box" name="P_id"  onfocus="" value=<?php echo $P_id?>></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Doctor No</h3></td>
				<td width="150" align="left"><?php echo"$D_id";?></td>
			</tr>
			<tr>
				<td><p><input class="button" type=button name="find" value="find" onClick="forAdd(2);"></p></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Doctor Name</h3></td>
				<td width="150" align="left"><?php echo"$D_name";?></td>
			</tr>
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Consultant No</h3></td>
				<td width="150" align="left"><?php echo"$C_id";?></td>
			</tr>
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
			<tr>
				<td width="150" align="left"><h3>Patient Name </h3></td>
				<td width="150" align="left"><?php echo"$P_name";?></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Date of Birth</h3></td>
				<td width="150" align="left"><?php echo"$P_DOB";?></td>
			</tr>
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
		</table>
		
		<table align="center" border="0" width="100%" cellpadding="2">
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"> <h3>Medical History</h3></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
			<tr>
			<td width="150" align="left"> </td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
			<tr>
			<td width="150" align="left"> </td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
			<tr>
				<td width="150" align="left"><h3>Complaint Code</h3></td>
				<td width="150" align="left"><h3>Treatment Code</h3></td>
				<td width="100" align="left"></td>
				<td width="150" align="left"><h3>Doctor</h3></td>
				<td width="100" align="left"></td>
				<td width="170" align="left"><h3>Date treatment Started</h3></td>
				<td width="170" align="left"><h3>Date treatment Ended</h3></td>
			</tr>
			<tr>
			<td width="150" align="left"><?php echo"$Com_id";?></td>
				<td width="150" align="left"><?php echo"$T_id";?></td>
				<td width="100" align="left"></td>
				<td width="150" align="left"><?php echo"$D_name";?></td>
				<td width="100" align="left"></td>
				<td width="170" align="left"><?php echo"$Start_date";?></td>
				<td width="170" align="left"><?php echo"$End_date";?></td>
			</tr>
			<tr>
			<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
		</table>
	</form>
	</div>
	</body>
</html>