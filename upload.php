<?php
//Author: Rhalp Darren R. Cabrera
//Email:rhalpdarrencabrera@gmail.com
require('db.php');
$target_dir = "uploads/";
$file_tempname = $_FILES["fileToUpload"]["tmp_name"];   
$file_basename =  basename($_FILES["fileToUpload"]["name"]);
$file_destination = $target_dir.$file_basename;
$file_image_type = strtolower(pathinfo($file_destination,PATHINFO_EXTENSION));
//for unique filename 
$file_name = $target_dir .md5($file_basename.date('Y-m-d H:i:s:u')).'.'.$file_image_type;
$uploadOk = 1;

$image_type_allowed = ["jpg","png","jpeg","gif"];



if (isset($_POST['submit']))
{
    $name = $_POST['Name'];
    $descrp = $_POST['Descrp'];
    if (empty($name)) {
        echo "<script>alert('Name was empty');
                                window.location='index.php';
                            </script>";
    }
    else
    {
        // Allow certain file formats
        if(!in_array($file_image_type, $image_type_allowed)) 
        {
            
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
            if (move_uploaded_file($file_tempname, $file_name)) {
                mysqli_query($con,"INSERT INTO users (`id`, `name`, `img`,`descrp`) VALUES (NULL, '$name','$file_name','$descrp')");
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
