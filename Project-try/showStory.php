<!DOCTYPE html>
<html>
<head>
    <title>Story</title> 
    <script src="addTo.js"></script>
</head>
<body>
<?php
  session_start();
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $num = $_GET['id'];
  $_SESSION['id'] = $num;
  $res = pg_exec($link, "select * from stories where id = '$num'");
  $numrows = pg_numrows($res);

  for($ri = 0; $ri < $numrows; $ri++){
    $row = pg_fetch_array($res, $ri);
    echo "<h1>" . $row['title'] . "</h1>
            <h2>By: " . $row['author'] . "</h2>
            <p>" . $row['story'] . "</p>";
    $_SESSION['title'] = $row['title'];
    $_SESSION['author'] = $row['author'];
  }
  pg_close($link);

?>
<form>
<button id="addToStory" name="addToStoryButton">Add to Story</button>
</form>
</body>
</html>