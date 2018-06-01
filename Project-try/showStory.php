<!DOCTYPE html>
<html>
<head>
    <title>Story</title> 
    <link rel="icon" type="image/x-icon" href="bookIcon.JPG" />
    <script src="addTo.js"></script>
    <style>
      button{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 4px;
            background-color: white;
            padding: 10px 10px;
            text-align: center;
            cursor: pointer;
            font-size: 95%;
        }
    </style>
</head>
<body style="background-color: cornflowerblue;">
<?php
  session_start();
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $num = $_GET['id'];
  $_SESSION['id'] = $num;
  $res = pg_exec($link, "select * from stories where id = '$num'");
  $numrows = pg_numrows($res);

  for($ri = 0; $ri < $numrows; $ri++){
    $row = pg_fetch_array($res, $ri);
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
    echo "<h1 style='margin:0'><i>" . $row['title'] . "</i></h1>
            <h2 style='margin:0'>By: " . $row['author'] . "</h2>
            <p>" . $row['story'] . "</p>";
    $_SESSION['title'] = $row['title'];
    $_SESSION['author'] = $row['author'];
  }
  pg_close($link);

?>
<div style="text-align: center;">
  <button id="addToStory" name="addToStoryButton">Add to Story</button>
</div>
</body>
</html>