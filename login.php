<?php
session_start();

if (isset($_SESSION['student_name'])) {
    header("Location: dashboard.php");
    exit();
}

$savedName = $_COOKIE['student_name'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentName = trim($_POST['student_name'] ?? '');

    if ($studentName !== '') {
        $_SESSION['student_name'] = $studentName;
        setcookie(
            'student_name',
            $studentName,
            time() + (7 * 24 * 60 * 60),
            '/'
        );

        header("Location: dashboard.php");
        exit();
    }

    $error = "Please enter your name.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>
    <h2>Student Login</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Enter your name:</label>

        <input
            type="text"
            name="student_name"
            value="<?= htmlspecialchars($savedName, ENT_QUOTES, 'UTF-8') ?>"
            required
        >

        <button type="submit">Login</button>
    </form>

    <?php if ($savedName !== ''): ?>
        <p>
            Welcome back,
            <?= htmlspecialchars($savedName, ENT_QUOTES, 'UTF-8') ?>!
        </p>
    <?php endif; ?>
</body>
</html>