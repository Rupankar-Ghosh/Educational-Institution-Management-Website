<?php
session_start(); // Ensure session is started before destroying it
session_unset();
session_destroy();

echo '<script>alert("Logout successful");</script>';
echo '<script>window.location.href = "index.html";</script>';
exit();
?>