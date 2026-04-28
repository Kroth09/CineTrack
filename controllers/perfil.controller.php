<?php

if(!isset($_SESSION['user'])){
    header('location: login');
    exit();
}

view('perfil');