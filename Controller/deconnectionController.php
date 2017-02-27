<?php

namespace Controller;

session_start();
session_destroy();

header("Location: ./indexController.php");
