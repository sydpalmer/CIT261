<!DOCTYPE html>
<html>
<body>
<table>
<?php
  $user = 'postgres';
  $password = 'SydGrad2014';
  $db = pg_connect('host=localhost port=5432 dbname=StoriesDB user='. $user . 'password=' . $password);


echo "Connected!";


$whole_sql = "SELECT * FROM stories";
echo "SQL command was created";

$whole_result = pg_query($db, $whole_sql);
if (!$whole_result) {
  die ('Could not run query');
}
echo "got result. Here's query: " . $whole_sql;
$count = 1;
while($whole_row = pg_fetch_all($whole_result)){
  echo "<tr style='text-align: center;' id='" . $count . "'>";
  echo "<td>$whole_row[1]</td>";
  echo "<td>$whole_row[2]</td>";
  echo "<td>$whole_row[3]</td>";
  echo "</tr>";
  $count += 1;
}
echo "<tr><td>Just finished the while loop.</td></tr>";
?> 
</table>
</body>
</html>