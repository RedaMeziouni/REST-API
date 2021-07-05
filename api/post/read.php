<?php
// Headers
header('Access-Control-Allow-Origin: *'); //Accessible by Everybody
header('Content-Type: application/json'); //Accept JSON

// Including the DB
include_once('../../config/Databse.php');
include_once('../../models/Post.php');

