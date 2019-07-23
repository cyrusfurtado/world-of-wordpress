<?php
    if(isset($_FILES['image'])) {
        $errors = array();

        $filename = $_FILES["image"]["name"];
        $filesize = $_FILES["image"]["size"];
        $file_tmp_name = $_FILES["image"]["tmp_name"];
        $file_type = $_FILES["image"]["type"];
        $file_ext = strtolower(end(explode('.', $filename)));
        
        echo "filename: $filename<br/> filesize: $filesize<br/> file_tmp_name: $file_tmp_name<br/> file_type: $file_type<br/> ext: $file_ext<br/>";

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) == false) {
            $errors[] = "Extension $file_ext not allowed!";
        }

        if ($filesize > 10000000) {
            $errors[] = "Files size limit exceeded";
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp_name, './images/'.$filename);
            echo "Upload success";
        } else {
            print_r($errors);
        }
    }
?>