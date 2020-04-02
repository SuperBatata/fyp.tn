<?php 

if (isset($_POST['submit'])){
    $file =$_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if ($fileSize < 1000000){ //the limitation of the size file
                $fileNewName = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNewName;
                move_uploaded_file($fileTmpName,$fileDestination);
                header("Location: editprofile.php");
            } else {
                echo "Your file is too big !";
            }
        } else {
            echo "there was a error uploading your file !";
        }
    } else {
        echo "you can not upload this type of file !";
    }
}