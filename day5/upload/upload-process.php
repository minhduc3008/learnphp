<?php

// $_FILES['input_name']

if (isset($_POST['btn-upload'])) {
    
    $fileName =  time() . "_" . $_FILES['file']['name'];
    
    if (!empty($_FILES['file']['name'])) {
        move_uploaded_file($_FILES['file']['tmp_name'], "./assets/images/" . $fileName);

        echo "<img src='./assets/images/".  $fileName ."' width='150' />";
    }
}