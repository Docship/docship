<?php

session_start();
session_unset();
session_destroy();

// go back to login page
header("Location:../login-signup.html.php?error=none");
