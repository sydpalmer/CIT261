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
        <textarea style="width:100%; height:100%"></textarea>
    </div>
</body>
</html>