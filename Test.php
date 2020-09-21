<html>
	<head>
		<title>New Patient</title>
		<link type="text/css" rel="stylesheet" href="mystyle.css">
		<style type="text/css" >
			body{
				//background-image:url("https://cdn.pixabay.com/photo/2016/04/22/11/08/wall-1345566_960_720.jpg");
				//background-repeat:repeat-y;
				padding:20px;
				background-size: 100% 100%;
				 background-repeat: no-repeat;
				//background-color:blue;
			}
			
			.myDIV{
					width: 100%;
					height: 10%;
					background-color: red;
					border:1px solid green;
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
	//			background-color:#DFDBCC;
				border:3px solid #E0D49B;
				text-align:center;
			}
			table{
				//border:3px solid black;
			}
			.button {
			
			width: 100px;
			height: 40px;
			background-color: #4CAF50;
			padding: 10px 25px;
			border: none;
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
	}

		</style>
	</head>
	<body>
	<script language="javascript" type="text/javascript">
function forAdd(fflag)
{
    document.form1.flag.value = fflag;
    document.form1.submit();
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

//include_once('db_config.php');

  $db_sid = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = THE_RAIN)(PORT = 1521)) ) (CONNECT_DATA = (SID = ali) ) )"; 
   $db_user = "scott"; 
   $db_pass = "tiger"; 
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful."; } 
   else 
      { die('Could not connect to Oracle: '); } 

	$sql_update = "UPDATE Patient
				SET P_name = '$_POST[P_name]',
				P_gender = '$_POST[P_gender]',
				P_DOB=to_date('$_POST[P_DOB]','dd/mm/yyyy'),
				P_phone='$_POST[P_phone]',
				W_id = '$_POST[W_id]'
				WHERE P_id = ".$_REQUEST[P_id];

      $sql_select="select P_id,P_name,P_gender,to_char(P_DOB,'dd/mm/yyyy') P_DOB,P_phone,W_id".
                  " from Patient".
                  " where P_id = ". $_REQUEST[P_id];

      $sql_insert="insert into Patient(P_id,P_name,P_gender,P_DOB,P_phone,W_id)
                            values ('$_POST[P_id]','$_POST[P_name]','$_POST[P_gender]',to_date('$_POST[P_DOB]','dd/mm/yyyy'),'$_POST[P_phone]','$_POST[W_id]')";
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
	  $temp=$_POST[P_id];	
           $query_id2 = oci_parse($con, $sql_update);
           $run_update = oci_execute($query_id2);
		   if($run_update){
		   echo"SUCCESS";
		   }
           $Msg_Desc = "Record&nbsp;is&nbsp;successfully&nbsp;inserted/updated";							
      } else if ($_REQUEST[flag] == 3) {
 // find records on the basis of key which is send using POST method
			$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3,OCI_COMMIT_ON_SUCCESS);
        	$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
        
      	  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
      	  {
        	$P_id = $row["P_id"];
        	$P_name = $row["P_name"];
	        $P_gender = $row["P_gender"];
	        $P_DOB = $row["P_DOB"];
	        $P_phone = $row["P_Phone"];
	        $W_id = $row["W_id"];
		  } //while
      }  //main if
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

?>	
	
	
	
		<div class="myDIV" align="center"><?php echo"<h1> PATIENT FORM </h1>";?></div>
		<br>
			<div class="subbox1"> 
				<?php echo "<h3>Register</h3>";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
		<Table class ="table1" padding=10>
				  <form  name="form1" method="POST" action="Test.php">
					<tr>
						<input type="hidden" name="flag" value="">
					</tr>
					
				  <table align=center border="0" border-colour=black cellpadding="2" width="375"  >
					<tr>
						<td width="150" align="left">*Patient_ID#</td>
						<td width="211"><input type="text" class="IN_box" name="P_id"  onfocus="" value=<?php echo $P_id?>></td>
					</tr>
					<tr>
						<td width="150" align="left">*Patient Name</td>
						<td width="211">
						<input name="P_name" class="IN_box" value=<?php echo $P_name ?> ></td>
					</tr>			
					<tr>
						<td width="150" align="left">Gender</td>
						<td width="211">
						<input type="text" class="IN_box" name="P_gender" value=<?php echo $P_gender ?>></td>
					</tr>
					<tr>
						<td width="150" align="left">Date Of Birth</td>
						<td width="60"><input class="IN_box" type="text" name="P_DOB" value=<?php echo $P_DOB ?>></td>
					</tr>
					<tr>
						<td width="150" align="left">Phone#</td>
						<td width="211">
						<input type="number" class="IN_box" name="P_phone"  value=<?php echo $P_phone ?>></td>
					</tr>
					<tr>
						<td width="150" align="left">Ward_Id</td>
						<td width="211">
						<input type="text" class="IN_box" name="W_id"  value=<?php echo $W_id ?>></td>
					</tr>
				</table>
				</form>
		<p>
        <A HREF="gsWebMainMenu.jsp">
        Return Main Menu</A></DIV></TD></TR>
  <TR>
    <TD class=nav>&nbsp;</TD>
    <TD class=footer>
        </p>
      <TABLE class=listtableSmall cellSpacing=0 cellPadding=0 width="40%">
        <TBODY>
        <TR>
          <TD align=center class=footer>
			<p align="left">Message:
			<td width="378">
				<font color="#396A87">
				<input type="text" name="Msg_Desc" size="52" bgcolor="#FFFFCC" style="background-color: #CC9900" value=<?php echo $Msg_Desc ?>  ></font></td>             
           </TD></TR></TBODY></TABLE></TD></TR>
		
		
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
						<td><p><input class="button" type=button name="FindRec" value="Find" onClick="forAdd(3);"></p></td>
					</tr>
					<tr>
						<td><p><input class="button" type=button name="DELRec" value=" Delete " onClick="forAdd(4);"></p></td>
					</tr>
					<tr>
						<td><p><input class="button" type=button name="CloseForm" value="CloseForm" onClick="forAdd(5);"></p></td>
					</tr>
				</table>
			</div>
		<br>
		
	&nbsp;</body>
	
</html>