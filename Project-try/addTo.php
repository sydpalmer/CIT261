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
    <div>
        <input type="submit" value="ADD" name="submit"/>
    </div>
    <?php
        if(isset($_GET['submit'])){
            session_start();
            $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
            $num = $_SESSION['id'];
            $story = " " . $_GET['storyInput'];
        }
    ?>
</body>
</html>