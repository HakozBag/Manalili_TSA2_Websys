<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert-error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/login') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= old('username') ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        
        <div class="text-center">
            <a href="<?= base_url('/') ?>">Back to Home</a>
        </div>
    </div>
</body>
</html>