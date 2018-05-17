<!DOCTYPE html>
<html>
<head>
    <title>Story</title>
</head>
<body>
<?php
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $num = $_GET['id'];
  $res = pg_exec($link, "select * from stories where id = '$num'");
  $numrows = pg_numrows($res);

  for($ri = 0; $ri < $numrows; $ri++){
    $row = pg_fetch_array($res, $ri);
    echo "<h1>" . $row['title'] . "</h1>
            <h2>By: " . $row['author'] . "</h2>
            <p>" . $row['story'] . "</p>";
  }
  echo "<button id='addToStory'>Add to Story</button>";
  pg_close($link);

?>
</body>
</html>