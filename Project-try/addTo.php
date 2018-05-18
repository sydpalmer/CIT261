<!DOCTYPE html>
<html>
<head>
    <title>Add to the Story</title>
</head>
<body>
    <h3>Adding to <?php session_start(); echo $_SESSION['title'];?><br>
        Created By: <?php session_start(); echo $_SESSION['author'];?>
    </h3>
    <textarea></textarea>
</body>
</html>