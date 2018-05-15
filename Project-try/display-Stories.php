<!DOCTYPE html>
<html>
<body>
<table>
<?php
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $res = pg_exec($link, "select * from stories");
  $numrows = pg_numrows($res);

  echo "<tr style='text-align: center'><th>Title</th><th>Author</th><th>Story</th></tr>";
  $count = 0;
  for($ri = 0; $ri < $numrows; $ri++){
    $count = $ri + 1;
    echo "<tr style='text-align: right;' id='" . $count . "'>";
    $row = pg_fetch_array($res, $ri);
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . $row['story'] . "</td>";
    echo "</tr>";
  }
  pg_close($link);

?> 
</table>
</body>
</html>