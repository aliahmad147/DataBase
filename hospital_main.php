
tduser.Employee_Stg

bteq <createTable.txt> MyFirstBTEQ.log
CREATE DATABASE tduser2 AS 
       PERM = 1e9 SKEW = 10 PERCENT;                         	

	   CREATE SET TABLE  tduser2.Employee_Stg, FALLBACK
   (
   EmployeeNo VARCHAR(10),
         FirstName VARCHAR(30),
         LastName VARCHAR(30),
         BirthDate DATE,
         JoinedDate DATE, 
         DepartmentNo VARCHAR(02))
UNIQUE PRIMARY INDEX (EmployeeNo);

	SELECT 'EmployeeNo',
         'FirstName',
         'LastName',
         'BirthDate',
         'JoinedDate', 
         'DepartmentNo'
FROM ( SELECT 'X' DUMMY ) MY_DUAL;

sel {
SELECT 'EmployeeNo',
         'FirstName',
         'LastName',
         'BirthDate',
         'JoinedDate', 
         'DepartmentNo'
FROM ( SELECT 'X' DUMMY ) AS derivedtable
UNION ALL

      SEL trim(CAST(EmployeeNo AS VARCHAR(10))) As Emp,
         TRIM(CAST(FirstName AS VARCHAR(15))) As nam,
         TRIM(CAST(LastName AS VARCHAR(15))) AS LastName,
		 TRIM(CAST((BirthDate (FORMAT 'YYYY-MM-DD')) AS VARCHAR(10))) AS BirthDate,
         CAST((JoinedDate (FORMAT 'YYYY-MM-DD')) AS VARCHAR(10)) AS JoinedDate,
         CAST(DepartmentNo AS VARCHAR(15)) AS DepartmentNo
      FROM
      tduser2.Employee_stg
};


SELECT EmployeeNo,
         FirstName,
         LastName,
         BirthDate,
         JoinedDate, 
         DepartmentNo
from (SELECT 'EmployeeNo' AS EmployeeNo,
         'FirstName' AS FirstName,
         'LastName' AS LastName,
         'BirthDate' AS BirthDate,
         'JoinedDate' AS JoinedDate,
         'DepartmentNo' AS DepartmentNo) AS derivedtable
UNION ALL

      SEL trim(CAST(EmployeeNo AS VARCHAR(10))) As Emp,
         TRIM(CAST(FirstName AS VARCHAR(15))) As nam,
         TRIM(CAST(LastName AS VARCHAR(15))) AS LastName,
		 TRIM(CAST((BirthDate (FORMAT 'YYYY-MM-DD')) AS VARCHAR(10))) AS BirthDate,
         CAST((JoinedDate (FORMAT 'YYYY-MM-DD')) AS VARCHAR(10)) AS JoinedDate,
         CAST(DepartmentNo AS VARCHAR(15)) AS DepartmentNo
      FROM
      tduser2.Employee_stg;

	
	SELECT TRIM(EmployeeNo) as Empno,
         TRIM(FirstName),
         trim(LastName),
         BirthDate,
         JoinedDate, 
         trim(DepartmentNo)
	FROM tduser2.employee_stg;
	
drop table tduser2.Employee_stg;

select * from tduser2.Employee_stg;

select * from SYSADMIN.fastlog;	
<html>
	<head>
		<title>MANUE</title>
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
					-webkit-animation: mymove 10s infinite; /* Chrome, Safari, Opera */
					animation: mymove 10s infinite;
				}
			@-webkit-keyframes mymove
				{
					from {background-color: #ECC4E7  ;}
					to {background-color: #E0C33E;}
				}

			@keyframes mymove
				{
					from {background-color: #ECC4E7  ;}
					to {background-color: #E0C33E;}
				}
			.subbox{
					width: 25%;
					height: 105%;
					float :left;
					text-align:center;
					padding:10px;
					margin:10px;
					position:relative;
					left:5%;
					//align :center;		
					background-color: red;
					border:2px solid black;
					-webkit-animation: mymove 3s infinite; /* Chrome, Safari, Opera */
					animation: mymove 3s infinite;

			}
			tr{
				background-color:white;
				border:3px solid red;
				text-align:center;
			}
			table{
				//border:3px solid black;
			}
			
		.IN_box{
			width: 253px;
			height: 31px;
			background-color:white;
			}
			
		.IN_box3{
			width: 253px;
			height: 120px;
			background-color:white;
			}
			
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				padding: 12px 16px;
				z-index: 1;
			}
			.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown {
    position: relative;
    display: inline-block;
}

<div class="dropdown-content">
						<p>Hello World!</p>
						</div>
						</td>


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
<?php
include("core/connection.php");
if($_REQUEST[flag] == 1){
	header('location:/project/in_doctor.php');
}
else if($_REQUEST[flag] == 2){
	header('location:/project/in_consultant.php'); 
}
else if($_REQUEST[flag] == 3){
	header('location:/project/in_patient.php');
}
else if($_REQUEST[flag] == 4){
	header('location:/project/ward.php');
}
else if($_REQUEST[flag] == 5){
	header('location:/project/bed.php');
}
else if($_REQUEST[flag] == 6){
	header('location:/project/care_unit.php'); 
}
else if($_REQUEST[flag] == 7){
	header('location:/project/staff_nurse.php');
}
else if($_REQUEST[flag] == 8){
	header('location:/project/non_staff_nurse.php');
}
else if($_REQUEST[flag] == 9){
	header('location:/project/day_night_sister.php');
}
else if($_REQUEST[flag] == 10){
	header('location:/project/Treatment.php');
}
else if($_REQUEST[flag] == 11){
	header('location:/project/complain.php');
}
else if($_REQUEST[flag] == 12){
	header('location:/project/admits_in.php');
}
else if($_REQUEST[flag] == 13){
	header('location:/project/previous_record.php');
}
else if($_REQUEST[flag] == 14){
	header('location:/project/query1.php');
}
else if($_REQUEST[flag] == 15){
	header('location:/project/query2.php');
}
else if($_REQUEST[flag] == 16){
	header('location:/project/query3.php');
}
else if($_REQUEST[flag] == 17){
	header('location:/project/query4.php');
}
else if($_REQUEST[flag] == 18){
	header('location:/project/query5.php');
}
else if($_REQUEST[flag] == 19){
	header('location:/project/query6.php');
}
else if($_REQUEST[flag] == 20){
	header('location:/project/query7.php');
}
else if($_REQUEST[flag] == 21){
	header('location:/project/query8.php');
}
else if($_REQUEST[flag] == 22){
	header('location:/project/query9.php');
}
else if($_REQUEST[flag] == 23){
	header('location:/project/query10.php');
}
else if($_REQUEST[flag] == 24){
	header('location:/project/query11.php');
}
else if($_REQUEST[flag] == 25){
	header('location:/project/query12.php');
}


else if($_REQUEST[flag] == 31){
	header('location:/project/Patient_Record.php');
}
else if($_REQUEST[flag] == 32){
	header('location:/project/Ward_Record.php');
}
else if($_REQUEST[flag] == 33){
	header('location:/project/Concultant_team_Record.php');
}
?>
	
	
	
	<img src="D:\img1.jpg" height="10%" width>
		<div class="myDIV" align="center"><?php echo"<h1> IVOR PAINE MEMORIAL HOSPITAL </h1>";?></div>
		<br>
		<form  name="form2" method="POST" action="hospital_main.php">
			<input type="hidden" name="flag" value="">
			<div class="subbox" >
				<?php echo "<h3>Insertion Form</h3>";?>
				<table align="center" border="true" width="80%" height="400" >
					<tr>
						<td><p><input type=submit class="In_box" name="Doctor" value="DOCTOR" onClick="forAdd(1);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box" name="CONSULTANT" value="CONSULTANT" onClick="forAdd(2);"></p></td>
					</tr>
					<tr>
					<td><p><input type=submit class="In_box" name=" PATIENT" value=" PATIENT" onClick="forAdd(3);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box" name=" Ward" value="Ward" onClick="forAdd(4);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box" name="Bed" value="Bed" onClick="forAdd(5);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box" name="Care_Unit" value="Care Unit" onClick="forAdd(6);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box" name="Staff_Nurse" value="Staff Nurse" onClick="forAdd(7);"></p></td>
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Non_Staff_Nurse" value="Non_Staff_Nurse" onClick="forAdd(8);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box" name="day_night_sister" value="day_night_sister" onClick="forAdd(9);"></p></td>
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Treatment" value="Treatment" onClick="forAdd(10);"></p></td>
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Complain" value="Complain" onClick="forAdd(11);"></p></td>
					</tr>
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Patient_Admit" value="Patient_Admit" onClick="forAdd(12);"></p></td>
					</tr>
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Previous_Record" value="Previous_Record" onClick="forAdd(13);"></p></td>
					</tr>
				</table>
				
			</div>
			<div class="subbox"> 
				<?php echo "<h3>Queries</h3>";?>
								<table align="center" border="true" width="80%" height="400">
					<tr>
						<td><p><input type=submit class="In_box" name="Query1" value="Query1" onClick="forAdd(14);"></p></td> 
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query2" value="Query2" onClick="forAdd(15);"></p></td>  
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query3" value="Query3" onClick="forAdd(16);"></p></td> 
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query4" value="Query4" onClick="forAdd(17);"></p></td>  
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query5" value="Query5" onClick="forAdd(18);"></p></td> 
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query6" value="Query6" onClick="forAdd(19);"></p></td>  
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query7" value="Query7" onClick="forAdd(20);"></p></td> 
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query8" value="Query8" onClick="forAdd(21);"></p></td>  
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query9" value="Query9" onClick="forAdd(22);"></p></td>  
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query10" value="Query10" onClick="forAdd(23);"></p></td> 
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query11" value="Query11" onClick="forAdd(24);"></p></td>  
					</tr>
										<tr>
						<td><p><input type=submit class="In_box" name="Query12" value="Query12" onClick="forAdd(25);"></p></td> 
					</tr>
				</table>
			</div> 
			<div class="subbox">
				<?php echo "<h3>REPORT</h3>";?>
				<table align="center" border="true" width="80%" height="400" >
					<tr>
						<td><p><input type=submit class="In_box3" name="Consultant_Team_Record" value="Patient_Record" onClick="forAdd(31);"></p></td>  
					</tr>
					<tr>
						<td><p><input type=submit class="In_box3" name="Consultant_Team_Record" value="Ward_Record" onClick="forAdd(32);"></p></td>
					</tr>
					<tr>
						<td><p><input type=submit class="In_box3" name="Consultant_Team_Record" value="Consultant_Team_Record" onClick="forAdd(33);"></p></td>
					</tr>
				</table>
			</div>
		<br>
		</form>
	</body>
	
</html>