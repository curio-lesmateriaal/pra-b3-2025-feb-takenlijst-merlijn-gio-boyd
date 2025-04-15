<?php
require_once(__DIR__ . '../backend/conn.php');
session_start();
session_destroy();
header('Location:' . $base_url . '/index.php');
