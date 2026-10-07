<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Task</title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <div class="form-container">
        <h1>Create New Task</h1>
        
        <?php if(session()->get('errors')): ?>
            <div class="alert-error" style="color: red; margin-bottom: 15px;">
                <?php foreach(session()->get('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('tasks/create') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="<?= old('title') ?>" required>
            </div>
            <div class="form-group">
                <label>Task Date</label>
                <input type="date" name="task_date" value="<?= old('task_date') ?>" required>
            </div>
            <button type="submit">Create Task</button>
        </form>
        
        <div style="margin-top: 15px;">
            <a href="<?= base_url('/tasks') ?>">Back to Tasks</a>
        </div>
    </div>
</body>
</html>