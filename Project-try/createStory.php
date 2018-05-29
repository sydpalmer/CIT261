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
    <h3>Title: <input type="text" name="title"></h3>
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
            // echo "<script>console.log('button was pushed');</script>";
            // session_start();
            // $link = pg_connect("dbname=StoriesDB user=postgres password=SydGrad2014");
            // $num = $_SESSION['id'];
            // $res = pg_exec($link, "select * from stories where id = '$num'");

            // $numrows = pg_num_rows($res);
            // for($ri = 0; $ri < $numrows; $ri++){
            //     $row = pg_fetch_array($res, $ri);
            //     $oldStory = $row['story'];
            // }
            // $story = $oldStory . " " . $_GET['storyInput'];

            // $query = "UPDATE stories SET story='$story' WHERE id='$num'";
            // $result = pg_exec($link, $query);

            // if(!$result){
            //     echo "<script>console.log('Query did not execute');</script>";
            // }
            // else{
            //     echo "<script>window.opener.close();</script>";
            //     echo "<script>window.close();</script>";
            // }
        }
        else{
            echo "<script>console.log('button was NOT pushed');</script>";
        }
    ?>
</body>
</html>