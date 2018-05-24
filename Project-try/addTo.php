<!DOCTYPE html>
<html>
<head>
    <title>Add to the Story</title>
    <style>
        textarea{
            resize: none;
        }
    </style>
</head>
<body>
    <h3>Adding to <i><?php session_start(); echo $_SESSION['title'];?></i><br>
        Created By: <?php session_start(); echo $_SESSION['author'];?>
    </h3>
    <div style="width:95%; height:60vh;">
        <textarea style="width:100%; height:100%" id="storyInput" name="storyInput"></textarea>
    </div>
    <br><br>
    <div>
        <input type="submit" value="ADD" name="submit"/>
    </div>
    <?php
        if(isset($_GET['submit'])){
            session_start();
            $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
            $num = $_SESSION['id'];
            $res = pg_exec($link, "select * from stories where id = '$num'");

            $numrows = pg_num_rows($res);
            for($ri = 0; $ri < $numrows; $ri++){
                $row = pg_fetch_array($res, $ri);
                $oldStory = $row['story'];
            }
            $story = $oldStory . " " . $_GET['storyInput'];

            $query = "UPDATE stories SET story=$story WHERE id=$num;";
            $result = pg_query($link, $query);

            if(!$result){
                echo "Query did not execute";
            }
        }
    ?>
</body>
</html>