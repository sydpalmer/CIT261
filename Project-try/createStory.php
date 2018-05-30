<!DOCTYPE html>
<html>
<head>
    <title>Create a New Story</title>
    <style>
        textarea{
            resize: none;
        }
    </style>
</head>
<body>
    <form>
    <h3 style="text-align: center">Title: <input type="text" name="title"></h3>
    <h3 style="text-align: center">Created by: <input type="text" name="author"></h3>
    <div style="width:95%; height:60vh;">
        <textarea style="width:100%; height:100%" id="storyInput" name="storyInput"></textarea>
    </div>
    <br>
    <div style="text-align: center">
        <input type="submit" value="CREATE" name="submit"/>
    </div>
    </form>
    <?php
        if(isset($_GET['submit'])){
            echo "<script>console.log('button was pushed');</script>";
            session_start();
            $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
            
            $title = $_GET['title'];
            $author = $_GET['author'];
            $story = $_GET['storyInput'];
            
            $query = "INSERT INTO stories (title, author, story) VALUES ('$title', '$author', '$story')";
            $result = pg_exec($link, $query);

            if(!$result){
                echo "<script>console.log('Query did not execute');</script>";
            }
            else{
                echo "<script>window.opener.location.reload();</script>";
                echo "<script>window.close();</script>";
            }
        }
        else{
            echo "<script>console.log('button was NOT pushed');</script>";
        }
    ?>
</body>
</html>