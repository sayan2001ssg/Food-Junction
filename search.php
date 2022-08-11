<html>
<head>
</head>
<body>
<?php
$name=$_POST['emp_id'];
$con=mysqli_connect("localhost","root","");
if(!($con))
{
die("error in connecting to DB");
}
else
{
print "<i style='color:green'>connection successfull</i><br />";
}
$db=mysqli_select_db($con,"userinfo");
$result=mysqli_query($con,"select * from user_detail where EmployeeId='$name'");
$rows=mysqli_num_rows($result);
if($rows==0)
{
echo "<i style='color:red;'>There are no rows with the name as $name<i>";
}
else
{
echo "<i style='color:blue'>num of rows in the user_detail table with user name as
$name are $rows</i><br />";
echo "<table border='1'><tr><th>Name</th><th>emp_id</th><th>exp</ht></tr>";
for($row=1;$row<=$rows;$row++)
{
$rowv=mysqli_fetch_array($result,MYSQLI_ASSOC);
echo "<tr><td>".$rowv['Name']."</td>";
echo "<td>".$rowv['EmployeeId']."</td></tr>";
echo "<td>".$rowv['Experience']."</td></tr>";
}
echo "</table>";
}
mysqli_close($con);
?>
</form>
</body>
</html>
