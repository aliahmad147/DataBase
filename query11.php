<html>
	<head><title>query 11</title>
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
		.table1{
		padding: 10px;
	}
	td{
	
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
	.IN_box{
			width: 228px;
			height: 20px;
			background-color:#F3F4F4;
			border:2px solid #cacece;
	}
	
		
	</style>
	</head>
	<body>
	<script language="javascript" type="text/javascript">
function forAdd(fflag)
{
    document.form11.flag.value = fflag;
    document.form11.submit();
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


	//										echo $sql_consultant_select;
//											echo "$sql_select";
			   }
			   else{
					echo"not connect";
				}
		
		?>
		
		<form  name="form11" method="POST" action="query11.php">
		<Table class ="table1" padding=10>
					<tr>
						<input type="hidden" name="flag" value="">
					</tr>
					
					<tr>
						<td width="150" align="left">*Start_date</td>
						<td width="211"><input type="text" class="IN_box" name="s_date"  onfocus="" value=<?php echo $s_date?>></td>
					</tr>
						<tr>
						<td width="150" align="left">*End_date</td>
						<td width="211"><input type="text" class="IN_box" name="e_date"  onfocus="" value=<?php echo $e_date?>></td>
					</tr>
			</Table>
		<table align="center" border="0" width="80%" height="100" >			
					<tr>
						<td><p><input class="button" type=button name="Enter" value="Enter" onClick="forAdd(5);"></p></td>
					</tr>
		</table>
		</form>
		
		<h1><font color=#5499C7> Query Result:- </font></h1>
		<div class="main">
		
			
			<?php
							echo nl2br("<h3><font color=#5499C7>Treatment id ".$sp.$sp.$sp.$sp.$sp."Description".$sp.$sp.$sp.$sp.$sp."Complain ID".$sp.$sp.$sp.$sp."Complain Name </font></h3>\n");

		if($_REQUEST[flag] == 5){	
					$sql_select="";			
      $sql_select="Select t.T_id, t.T_description,C.Com_id,c.c_description ".
                  " FROM complain C,treatment t ".
                  " WHERE t.Com_id=c.Com_id AND T.start_date >= '$_POST[s_date]' AND t.End_date <= '$_POST[e_date]' ";
//echo $sql_select;		
					$query_id3 = oci_parse($con, $sql_select);
					$runselect = oci_execute($query_id3);
					$rs_arr = oci_fetch($query_id3, OCI_BOTH+OCI_RETURN_NULLS);
				  while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS))  //parse or execute for update, insert
				  {
					$T_id = $row[0];
					$T_description = $row[1];
					$Com_id = $row[2];
					$c_description = $row[3];					
						echo nl2br("$row[0] $sp $sp $sp $sp $sp  $row[1] $sp $sp $sp $sp $sp $row[2] $sp $sp $sp $sp $sp $row[3] \n");
					//echo"$W_id";
				  }
			  }
				?>  
		</div>
	</body>
</html>