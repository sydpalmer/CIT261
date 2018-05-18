<!DOCTYPE html>
<html>
<head>
    <title>Story</title>
    <script>
      function addStory(){
        var dest = "addTo.php?id=" + <?php $num?>;
        var x = (screen.width/2) - (300/2)+(250/2);
        var y = (screen.height/2) - (400/2)+(350/2);
        window.open(dest, "_blank", "scrollbars=yes,width=250,height=350,left=" + x + ",top=" + y);
    }
}
    </script>  
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
  pg_close($link);

?>
<button onclick='addStory();' id='addToStory'>Add to Story</button>
</body>
</html>