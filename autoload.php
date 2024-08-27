<?php
spl_autoload_register(function ($class_name) {
    include 'backend/classes/' . $class_name . '.php';
});
?>
