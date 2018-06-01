<!DOCTYPE html>
<html>
<head>
  <script src="display-Stories.js"></script>
  <style>
    td{
      background-color: lightgrey;
      border: 3px solid black;
      padding: 10px;
      font-size: 110%;
    }
    td:hover{
      cursor: pointer;
    }
  </style>
</head>
<body>
<table width=100%>
<?php
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $res = pg_exec($link, "select * from stories");
  $numrows = pg_numrows($res);

  $count = 0;
  for($ri = 0; $ri < $numrows; $ri++){
    $count = $ri + 1;
    echo "<tr style='text-align: left;'>";
    $row = pg_fetch_array($res, $ri);
    echo "<td id='" . $count . "'><b>" . $row['title'] . "</b><br>";
    echo "Created by: " . $row['author'] . "</td>";
    echo "</tr>";
  }
  pg_close($link);

?> 
</table>
</body>
</html>