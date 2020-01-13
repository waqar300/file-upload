<?php

if ($_POST['submit']) {
    $filename = $_FILES["uploadfile"]["name"];
$tmpname = $_FILES["uploadfile"]["tmp_name"];
$folder = "upload/".$filename;
echo "$folder";
move_uploaded_file($tmpname,$folder);

$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($mysqli));
$mysqli->query("INSERT INTO file(image) VALUES('$folder')") or die($mysqli->error);
$result = $mysqli->query("SELECT * FROM file") or die($mysqli->error);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>picture</label>
                <input type="file" name="uploadfile" id="img"  class="form-control" value="" multiple="">
            </div>
                <input type="submit" name="submit" value="submit">
        </form>
        <table>
            <tr>
                <?php 
                while ($row = $result->fetch_assoc()) { ?>
                <td>
                 <img src="<?= $row['image']; ?>" alt="tmprary image" height="50px" width="50px" srcset="">   
                 </td>                
                <?php }
                ?>
            </tr>
        </table>
    </div>
</body>
</html>
