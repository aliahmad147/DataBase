<html>
	<head>
	<title>Ward Record</title>
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
//		padding:5px;
		background-color: #CAF8F2;
		border:2px dotted #23B7A3;
}
	h1,h3{
		text-align:center;
	}
	.table1{
		width: 100%;
		height: 37%;
		padding:0% 5%;
	//	border:true;
	//	border-color:blue;
		
	}
	.table2{
		width: 100%;
		height: 37%;
					padding:0% 5%;
	//	border:true;
	//	border-color:blue;
		
	}
	.table3{
		width: 100%;
		height: 1%;
				border-up:2px;
				border-up-style:dotted;
				border-up-color:#23B7A3;
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

	  $P_id="";
$P_name="";
$Speciality="";
$W_name="";
$DN1_name="";
$DN2_name="";
$S_name="";
$N_name="";
$Ca_id="";
$P_DOB="";
$B_id="";
$Cu_name="";
$Co_name="";
$Start_date="";
      	$sql_select1="SELECT w.W_name,w.Speciality ".
						"FROM ward w ".
						"WHERE w.W_name='$_REQUEST[W_name]'";


$sql_select2="SELECT dn.DN_Name ".
			"FROM ward w,day_night_sister dn ".
			"WHERE dn.DN_ID=w.DS_ID  OR dn.DN_type='Day sister' AND w.W_name='$_REQUEST[W_name]'";

//echo"$sql_select2";

$sql_select3="SELECT dn.DN_Name ".
			"FROM ward w,day_night_sister dn ".
			"WHERE dn.DN_ID=w.NS_ID OR dn.dn_type='Night sister' AND w.W_name='$_REQUEST[W_name]'";


//echo"$sql_select3";



$sql_select4="SELECT s.S_name ".
			"FROM staff_nurse s,care_unit cu,ward w ".
			"WHERE s.Ca_id=cu.Ca_id AND cu.W_id=w.W_id AND w.W_name='$_REQUEST[W_name]'";

$sql_select5="SELECT n.N_name ".
			"FROM non_staff_nurse n,care_unit cu,ward w ".
			"WHERE n.Ca_id=cu.Ca_id AND cu.W_id=w.W_id AND w.W_name='$_REQUEST[W_name]'";

//echo"$sql_select5";

$sql_select6="SELECT p.P_id,p.P_name,CU.C_name,b.B_id,c.C_name,t.Start_date ".
"FROM Patient p,Care_unit CU,Bed b,Consultant c,Treatment t,Ward w,Complain co ".
"WHERE w.W_name='$_REQUEST[W_name]' AND p.W_id=w.W_id AND w.W_id=CU.W_id AND w.W_id=b.W_id AND co.P_id=p.P_id AND co.C_id=c.C_id AND p.P_id=t.P_id";

			  
			   // find records on the basis of key which is send using POST method
 
 if($_REQUEST[flag] == 2){
 				//echo"$sql_select";
			$query_id1 = oci_parse($con,$sql_select1);
        	$run1 = oci_execute($query_id1);
			
			$query_id2 = oci_parse($con,$sql_select2);
        	$run2 = oci_execute($query_id2);
			
			$query_id3 = oci_parse($con,$sql_select3);
        	$run3 = oci_execute($query_id3);
			
		//	echo"sql_select3";
			
			$query_id4 = oci_parse($con,$sql_select4);
        	$run4 = oci_execute($query_id4);
			
	//		echo"sql_select4";
			
			$query_id5 = oci_parse($con,$sql_select5);
        	$run5 = oci_execute($query_id5);
			
		//	echo"sql_select5";
			
			$query_id6 = oci_parse($con,$sql_select6);
        	$run6 = oci_execute($query_id6);
			
		//	echo"sql_select3";
			
        	//$rs_arr = oci_fetch($query_id3,OCI_BOTH+OCI_RETURN_NULLS);
			if($run1 && $run2 && $run3 && $run4 && $run5 && $run6){
		//		echo "SUCCESS";
				//echo"$sql_select1";

			while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
	//	  echo"L1"; 		
        	$W_name = $row[0];
	        $Speciality = $row[1];
			
		  } //while
		  while($row = oci_fetch_array($query_id2,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		 // echo"L2";
        	$DN_name= $row[0];
			$DN1_name=$DN_name;
	        //echo $row[0];
		  }
		  $row2 = oci_fetch_array($query_id3,OCI_BOTH+OCI_RETURN_NULLS);
		  if($row2)
		  {
		  $DN2_Name= $row2[0];}
		  else
		  {echo 'null';}
		  
		  /*while($row = oci_fetch_array($query_id3,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		  		  echo"L3";
        	$DN2_Name= $row[0];
			//echo"$DN2_name";
			echo $row[0];
		  }*/
		  while($row = oci_fetch_array($query_id4,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		//  echo"L4";
        	$S_name = $row[0];
			//echo"$S_name";
	  }
		  while($row = oci_fetch_array($query_id5,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		//  echo"L5";
        	$N_name = $row[0];
		  }
		  $row3="";
		  while($row3 = oci_fetch_array($query_id6,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		  //		  echo"L6";
		    $P_id = $row3[0];
        	$P_name = $row3[1];
			$Cu_name=$row3[2];
			$B_id = $row3[3];
	        $Co_name = $row3[4];
			$Start_date = $row3[5];
		//	echo $Start_date;
			//echo"$P_id";
		  }
		  //echo $Start_date;
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
		 <form  name="form2" method="POST" action="ward_record.php">
		 <input type="hidden" name="flag" value="">
		<h1>IVOR PAINE MEMORIAL HOSPITAL </h1>
		<h3>WARD RECORD</h3>
		<table class="table1" align="center" border="0" width="100%" cellpadding="2">
			<tr>
				<td width="150" align="left"><h3>Ward Name </h3></td>
				<td width="150"><input type="text" class="IN_box" name="W_name"  onfocus="" value=<?php echo $W_name?>></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Speciality:</h3></td>
				<td width="200" align="left"><?php echo"$Speciality";?></td>
			</tr>
			<tr>

				<td><p><input class="button" type=button name="find" value="find" onClick="forAdd(2);"></p></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="200" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
			<tr>
				<td width="150" align="left"><h3>Day Sister:</h3></td>
				<td width="150" align="left"><?php echo"$DN1_name";?></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Night Sister</h3></td>
				<td width="200" align="left"><?php echo $row2[0];?></td>
			</tr>
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
		
			<tr>
				<td width="150" align="left"><h3>Staff Nurse </h3></td>
				<td width="150" align="left"><?php echo"$S_name";?></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"><h3>Non-registered Nurses</h3></td>
				<td width="200" align="left"><?php echo"$N_name";?></td>
			</tr>
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="200" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
		</table>
				
		<table align="center" class="table2" border="0" width="100%" cellpadding="2">
			<tr>
				<td width="200" align="left"></td>
				<td width="250" align="left"></td>
				<td width="200" align="left"> <h3>Patient Information</h3></td>
				<td width="100" align="left"></td>
				<td width="100" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
			<tr>
				<td width="100" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
			</tr>
			<tr>
				<td width="200" align="left"><h3>Patient No</h3></td>
				<td width="150" align="left"><h3>Patient Name</h3></td>
				<td width="150" align="left"><h3>Care Unit</h3></td>
				<td width="150" align="left"><h3>Bed No</h3></td>
				<td width="150" align="left"><h3>Consultant</h3></td>
				<td width="150" align="left"><h3>Date Admitted</h3></td>
			</tr>
				
			<tr>
			<td width="150" align="left"><?php echo"$P_id";?></td>
				<td width="150" align="left"><?php echo"$P_name";?></td>
				<td width="150" align="left"><?php echo"$Cu_name"?></td>
				<td width="150" align="left"><?php echo"$B_id";?></td>
				<td width="150" align="left"><?php echo"$Co_name";?></td>
				<td width="150" align="left"><?php echo $Start_date;?></td>
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
	</form>
	</div>
	</body>
</html>