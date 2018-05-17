<!DOCTYPE html>
<html>
<head>
  <script src="display-Stories.js"></script>
</head>
<body>
<table>
<?php
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $res = pg_exec($link, "select * from stories");
  $numrows = pg_numrows($res);

  echo "<tr style='text-align: center'><th>Title</th><th>Author</th></tr>";
  $count = 0;
  for($ri = 0; $ri < $numrows; $ri++){
    $count = $ri + 1;
    echo "<tr style='text-align: right;'>";
    $row = pg_fetch_array($res, $ri);
    echo "<td id='" . $count . "'>" . $row['title'] . "</td>";
    echo "<td id='" . $count . "'>" . $row['author'] . "</td>";
    echo "</tr>";
  }
  pg_close($link);

?> 
</table>
</body>
</html>