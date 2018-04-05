<?php
//Author: Rhalp Darren R. Cabrera
//Email:rhalpdarrencabrera@gmail.com
require('db.php');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (isset($_POST['submit']))
{
    $name = $_POST['Name'];
    $Descrp = $_POST['Descrp'];
    if (empty($name)) {
        echo "<script>alert('Name was empty');
                                window.location='index.php';
                            </script>";
    }
    else
    {
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                                window.location='index.php';
                            </script>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            echo "<script>alert('Sorry, your file was not uploaded.');
                                window.location='index.php';
                            </script>";
        // if everything is ok, try to upload file
        } 
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imgName = $_FILES["fileToUpload"]["name"];
                mysqli_query($con,"INSERT INTO users (`id`, `name`, `img`,`descrp`) VALUES (NULL, '$name','uploads/$imgName','$Descrp')");
                echo "<script>alert('Successfully Added');
                                window.location='gallery.php';
                            </script>";
            } 
            else 
            {
                echo "<script>alert('Sorry, there was an error uploading your file.');
                                window.location='index.php';
                            </script>";
            }
        }
        

    }
    
    
}
?>
