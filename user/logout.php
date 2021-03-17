<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_user']);
unset($_SESSION['level']);

session_destroy();
echo "<script>
        alert('Goodbye');
        document.location.href = '../login.php';
      </script>";
