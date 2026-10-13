
<?php
session_start();
if (!isset($_SESSION['student_name'])) {
    if (isset($_COOKIE['student_name'])) {
        $_SESSION['student_name'] = $_COOKIE['student_name'];
    } else {
        header("Location: login.php");
        exit();
    }
}

$studentName = $_SESSION['student_name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>
    <h1>Student Dashboard</h1>

    <h2>
        Welcome,
        <?= htmlspecialchars($studentName, ENT_QUOTES, 'UTF-8') ?>
    </h2>

    <p>You have successfully logged in.</p>

    <p>Your name is stored in a PHP session.</p>

    <p>A cookie remembers your name for seven days.</p>

    <a href="logout.php">Logout</a>
</body>
</html>


