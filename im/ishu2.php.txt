<!DOCTYPE HTML PUBLIC>
<html>
<head>
<title>hi</title>
<meta http-equiv="content-type" content="text/html; charset=ios-8859-1">
</head>
<body>
<?php
mysql_connect("localhost","root","");
mysql_select_db("img");
$res=mysql_query("select * from im");
echo "<table>";
while($row=mysql_fetch_array($res))
{
echo "<tr>";
echo "<td>"?>
<img src="<?php echo $row["i"]; ?>" height="100" weight="100">
<?php echo "</td>";
echo "</tr>";
}
echo "</table>";
?>
</body>
</html>