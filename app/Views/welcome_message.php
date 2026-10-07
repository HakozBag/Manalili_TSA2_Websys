<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Today's Tasks</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <h1>Tasks for Today</h1>
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
    <ul>
        <?php if (!empty($tasks)): ?>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <strong><?= esc($task['title']) ?></strong> 
                    <span style="color: #8c6d62; font-size: 13px;">(Due: <?= esc($task['task_date']) ?>)</span>
                    
                    <?php if (session()->get('isLoggedIn')): ?>
                        <div style="float: right;">
                            <a href="<?= base_url('tasks/edit/' . $task['id']) ?>" class="btn" style="padding: 4px 8px; font-size: 12px; background-color: #8c6d62; text-decoration: none; color: white; border-radius: 4px;">Edit</a>
                            <a href="<?= base_url('tasks/delete/' . $task['id']) ?>" class="btn" style="padding: 4px 8px; font-size: 12px; background-color: #8a3b32; text-decoration: none; color: white; border-radius: 4px;" onclick="return confirm('Are you sure you want to archive this task?')">Archive</a>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No tasks found for today!</p>
        <?php endif; ?>
    </ul>
</body>
</html>