<?php
    $name = $_GET['name'];
    $json = array('text' => 'Have a nice day, ' . $name);
    echo json_encode($json);
?>