<?php

//to stop the session /destroy

session_start();

session_unset();

session_destroy();

header("Location:index.php");

?>