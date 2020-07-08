<?php 
// if upload button is pressed 
if (Input::exists()) {
    $target = "images/"

}


?>






<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Book data</title>
</head>
<body>
<div>
    <form action="showfile.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="size" value="10000000">
    <div><input type="file" name="image">
    <textarea name="text" id="" cols="30" rows="10" placeholder="Say Something"></textarea>
    </div>
    <div><input type="submit" name="upload" value="upload file"></div>
    </form>
</div>
    
</body>
</html>




