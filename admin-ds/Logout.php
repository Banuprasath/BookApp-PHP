<?php
session_start();
session_destroy();
header("Location: ../chatgpt/index.html");
?>