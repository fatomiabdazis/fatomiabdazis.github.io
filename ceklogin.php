<?php
require "functions.php";

$username = strtolower(stripcslashes(mysqli_escape_string($conn, $_POST['username'])));
$password = mysqli_escape_string($conn, $_POST['password']);
$level = mysqli_escape_string($conn, $_POST['level']);

// cek username terdaftar atau tidak
$cek_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND level = '$level'");
$user_valid = mysqli_fetch_array($cek_user);

//uji user jika terdaftar
if ($user_valid) {
	//jika username terdaftar
	//cek password sesuai atau tidak
	if ($password == $user_valid['password']) {
		//jika password sesuai
		//buat session
		session_start();
		$_SESSION['username'] = $user_valid['username'];
		$_SESSION['nama_user'] = $user_valid['nama_user'];
		$_SESSION['level'] = $user_valid['level'];

		//uji level user
		if ($level == "admin") {
			header('location:index.php');
		} elseif ($level == "user") {
			header('location:user/index_user.php');
		}
	} else {
		echo "<script>
				alert('maaf password anda salah!');
				document.location.href = 'login.php';
			  </script>";
	}
} else {
	echo "<script>
			alert('maaf username anda tidak terdaftar!');
			document.location.href = 'login.php';
		 </script>";
}
