<?php

// invoke db connection class

$login_id = $_POST['loginid'];
$login_password = $_POST['password'];

if ($login_id == 'admin' && $login_password == 'admin123') {
    header('location: admin/dashboard.php');
} elseif ($login_id == 'user' && $login_password == 'user123')  {
    header('location: user/dashboard.php');
} else {
    header('location: signin');
    // echo "error"; return;
}

?>