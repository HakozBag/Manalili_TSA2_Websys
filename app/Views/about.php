<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Developer</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <h1>About Developer</h1>
    <nav>
        <a href="<?= base_url('/') ?>">Today's Tasks</a>
        <a href="<?= base_url('/tasks') ?>">View All Tasks</a>
        <a href="<?= base_url('/profile') ?>">Profile</a>
        <a href="<?= base_url('/about') ?>">About</a>

        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('/tasks/new') ?>" style="float: right; color: #5c4033; font-weight: bold;">+ New Task</a>
            <a href="<?= base_url('/logout') ?>" style="float: right; margin-right: 20px;">Logout</a>
        <?php else: ?>
            <a href="<?= base_url('/login') ?>" style="float: right;">Login</a>
        <?php endif; ?>
    </nav>
    <hr>
    <p>Developer: Manalili, Cyrus Dominic H.</p>
    <p>Course: BSITAGD </p>
    <p>Section: TX32</p>
    <p>Technical Summative Assessment 2</p>
</body>
</html>