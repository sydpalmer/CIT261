<!DOCTYPE html>
<html>
<head>
    <title>Create a New Story</title>
    <link rel="icon" type="image/x-icon" href="bookIcon.JPG" />
    <style>
        textarea{
            resize: none;
        }
        input[type=submit]{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 4px;
            background-color: white;
            padding: 10px 10px;
            text-align: center;
            cursor: pointer;
            font-size: 95%;
        }
    </style>
    <script>
        function checkCount(){
            if(document.getElementById("storyInput").value == ''){
                document.getElementById('count').innerHTML = "Characters left: " + 400;
            }else{
                document.getElementById('count').innerHTML = "Characters left: "+ (400 - document.getElementById('storyInput').value.length);
            }
        }
    </script>    
</head>
<body style="background-color: cornflowerblue;">
    <form>
    <h3 style="text-align: center">Title: <input type="text" name="title"></h3>
    <h3 style="text-align: center">Created by: <input type="text" name="author"></h3>
    <div style="width:95%; height:50vh;">
        <p style="text-align: right; margin:0" id="count">Characters left: 400</p>
        <textarea onkeyup="checkCount();" style="width:100%; height:90%" id="storyInput" name="storyInput" placeholder="Type your story here..." maxlength="400"></textarea>
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