<!DOCTYPE html>
<html>
<body>
<table>
<?php
  $host = 'host=localhost';
  $port = 'port=5432';
  $dbName = 'dbname=StoriesDB';
  $user = 'user=postgres';
  $password = 'password=SydGrad2014';
  $db = pg_connect("$host $port $dbName $user $password");

  if(!$db) {
    echo "Error : Unable to open database\n";
  } else {
    echo "Opened database successfully\n";
  }

  $sql = "SELECT * FROM stories";

  $result = pg_query($db, $sql);
  if(!$result){
    echo pg_last_error($db);
    exit;
  }

  $count = 1;
  while($row = pg_fetch_all($result)){
    echo "<tr style='text-align: center;' id='" . $count . "'>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "</tr>";
    $count += 1;
  }
  pg_close($db);

    // $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
    // $res = pg_exec($link, "select * from stories");
    // $numrows = pg_numrows($res);

    // for($ri = 0; $ri < $numrows; $ri++){
    //   echo "<tr style='text-align: center;' id='" . $ri . "'>";
    //   $row = pg_fetch_array($res, $ri);
    //   echo "<td>" . $row['title'] . "</td>";
    //   echo "<td>" . $row['author'] . "</td>";
    //   echo "<td>" . $row['story'] . "</td>";
    //   echo "</tr>";
    // }
    // pg_close($link);

?> 
</table>
</body>
</html>