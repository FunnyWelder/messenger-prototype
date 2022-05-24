<?php

$max_image_width = 380;
$max_image_height = 600;
$max_image_size = 64 * 1024;
$valid_types = array("gif","jpg", "png", "jpeg");

if (isset($_FILES["userfile"])) {
    if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        $filename = $_FILES['userfile']['tmp_name'];
        $ext = substr($_FILES['userfile']['name'],
        1 + strrpos($_FILES['userfile']['name'], "."));
        if (filesize($filename) > $max_image_size) {
            echo 'Error: File size > 64K.';
        } elseif (!in_array($ext, $valid_types)) {
            echo 'Error: Invalid file type.';
        } else {
            $size = GetImageSize($filename);
            if (($size) && ($size[0] < $max_image_width)
                && ($size[1] < $max_image_height)) {
                    if (@move_uploaded_file($filename, "/www/htdocs/upload/")) {
                        echo 'File successful uploaded.';
                    } else {
                        echo 'Error: moving fie failed.';
                    }
            } else {
                echo 'Error: invalid image properties.';
            }
        }
    } else {
        echo "Error: empty file.";
    }
} else {
echo '
<form enctype="multipart/form-data" method="post">
<input type="hidden" name="MAX_FILE_SIZE" value="64000">
Send this file: <input name="userfile" type="file">
<input type="submit" value="Send File">
</form>';
}
