<?php
  $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
  $num = $_GET['id'];
  $res = pg_exec($link, "select * from stories where id = '$num'");
  $numrows = pg_numrows($res);

  $count = 0;
  for($ri = 0; $ri < $numrows; $ri++){
    $row = pg_fetch_array($res, $ri);
    echo "<script>
        var myWindow = window.open('', 'Story', 'width=200,height=100');
        myWindow.document.write('<h1>" . $row['title'] . "</h1>');
        myWindow.document.write('<h2>By: " . $row['author'] . "</h2><br>');
        myWindow.document.write('<p>" . $row['story'] . "</p>');
        document.getElementById('demo').innerHTML = 'window should open';
    </script>";
  }
  pg_close($link);

?> 