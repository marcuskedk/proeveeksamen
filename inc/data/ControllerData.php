<?php

    $files = glob(__DIR__ . '/functions/*.php');
    foreach ($files as $file) {
        if ($file != __FILE__) {
            require($file);
        }
    }

?>