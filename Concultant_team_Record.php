<html>
	<head>
	<title>Team Record</title>
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
		height: 25%;
		padding:0% 5%;
	//	border:true;
	//	border-color:blue;
		
	}
	.table2{
		width: 100%;
		height: 100%;
					padding:0% 5%;
	//	border:true;
	//	border-color:blue;
		
	}
		.IN_box{
			width: 228px;
			height: 20px;
	}
	.progressBox2{
			width: 35%;
		height: 48%;
		left:5%;
		border:2px solid black;
		float :left;
					padding:5px;
					position:relative;
					left:7%;
	}
	.progressBox1{
		width: 50%;
		height: 50%;
		//border:2px solid black;
		float :left;
		padding:5px;
		position:relative;
		
	}
	.table3{
		right
		width: 100%;
		height: 100%;
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

	  $D_id="";
$D_name="";
$Position="";
$date_joined_team="";
$Start_date="";
$To_end_date="";
$Establishment="";
$Date_grade="";
$Performance="";
	  

$sql_select = "SELECT d.D_id,d.D_name,PR.Position,d.date_joined_team,PR.Start_date,PR.To_end_date,PR.Establishment,p.Date_grade,p.Performance ".
			"FROM Doctor d,Previous_record PR,progress p ".
			"WHERE '$_REQUEST[D_id]'=d.D_id AND d.D_id=PR.D_id AND d.D_id=p.D_id";

  if ($_REQUEST[flag] == 2) {
 // find records on the basis of key which is send using POST method
			$query_id1 = oci_parse($con,$sql_select);
        	$runselect = oci_execute($query_id1);
        	$rs_arr = oci_fetch($query_id1,OCI_BOTH+OCI_RETURN_NULLS);
			if($runselect){
			//	echo "SUCCESS";
			}
        //echo"FOR SELECT $rs_arr variable";
      	  while($row = oci_fetch_array($query_id1,OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
		  //echo"FOR SELECT IN LOOP";
		  	  $D_id=$row[0];
			$D_name=$row[1];
			$Position=$row[2];
			$date_joined_team=$row[3];
			$Start_date=$row[4];
			$To_end_date=$row[5];
			$Establishment=$row[6];
			$Date_grade=$row[7];
			$Performance=$row[8];
						//echo"$W_id";
		  } //while
      }  //main if
	//	oci_close($con);
}
		else 
      { die('Could not connect to Oracle: '); }
?>	
	
	
	<div class="myDIV">
		 <form  name="form2" method="POST" action="Concultant_team_Record.php">
	 <input type="hidden" name="flag" value="">
		<h1>IVOR PAINE MEMORIAL HOSPITAL </h1>
		<h3>Consultant Team RECORD</h3>
		<table class="table1" align="center" border="0" width="100%" cellpadding="2">
			<tr>
				<td width="150" align="left">Staff Number </td>
				<td width="150"><input type="text" class="IN_box" name="D_id"  onfocus="" value=<?php echo $D_id?>></td>
				<td width="150" align="left"></td>
				<td width="150" align="left">Name</td>
				<td width="200" align="left"><?php echo"$D_name";?></td>
			</tr>
			<tr>

				<td><p><input class="button" type=button name="find" value="find" onClick="forAdd(2);"></p></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="200" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
			<tr>
				<td width="150" align="left">Position</td>
				<td width="150" align="left"><?php echo"$Position";?></td>
				<td width="150" align="left"></td>
				<td width="150" align="left">Date joined team</td>
				<td width="200" align="left"><?php echo"$date_joined_team";?></td>
			</tr>
			<tr>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="150" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
		</table>
			
	<div class="progressBox1">			
		<table align="left" class="table2" border="0" width="100%" cellpadding="2">
			<tr>
				<td width="200" align="left"><h3>Previous Experience</h3></td>
				<td width="250" align="left"></td>
				<td width="200" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
			<tr>
				<td width="100" align="left">From Date</td>
				<td width="100" align="left">To Date</td>
				<td width="100" align="left">Position</td>
				<td width="100" align="left">Establishment</td>
			</tr>
			
			<tr>
				<td width="100" align="left"  class="IN_box"><?php echo"$Start_date";?></td>
				<td width="100" align="left"  class="IN_box"><?php echo"$To_end_date";?></td>
				<td width="100" align="left" class="IN_box"><?php echo"$Position";?></td>
				<td width="100" align="left" class="IN_box"><?php echo"$Establishment ";?></td>
			</tr>
			<tr>
				<td width="100" align="left"></td>
				<td width="100" align="left"></td>
				<td width="100" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
			<tr>
			<td width="100" align="left"></td>
				<td width="100" align="left"></td>
				<td width="100" align="left"></td>
				<td width="100" align="left"></td>
			</tr>
		</table>
		</div>
		
		<div class="progressBox2">
			<table align="left" class="table3" border="0" width="100%" cellpadding="2">
				<tr>
					<td width="100" align="left"></td>
					<td width="100" align="left"><h3>Progress</h3></td>
					<td width="100" align="left"></td>
				</tr>
				<tr>
					<td width="100" align="left">Date Grade</td>
					<td width="50" align="left"></td>
					<td width="150" align="left">Performance</td>
				</tr>
				<tr>
					<td width="100" align="left"><?php echo"$Date_grade";?></td>
					<td width="50" align="left"></td>
					<td width="150" align="left"><?php echo" $Performance";?></td>
				</tr>
			</table>
		</div>
		</form>
	</div>
	</body>
</html>