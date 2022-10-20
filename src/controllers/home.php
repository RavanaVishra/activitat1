<?php

//render template home
require 'src/render.php';
$title = "Superman";

echo render('home',['title'=>$title]);