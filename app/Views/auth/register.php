<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <div class="form-container">
        <h1>Create Account</h1>
        
        <form action="<?= base_url('register') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        
        <div class="text-center">
            <a href="<?= base_url('login') ?>">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>