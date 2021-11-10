<?php

if( isset( $_POST['destroy_btn'] ) )
    {
        session_start();
        session_destroy();
        $newURL = "../shop.html";
        header('Location: '.$newURL);
    }
