<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>Tasks for Today</h1>

        <nav>
            <a href="<?= base_url('/') ?>">Welcome</a>
            <a href="<?= base_url('tasks') ?>">All Tasks</a>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('about') ?>">About</a>

        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('logout') ?>">Logout</a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>

        </nav>

        <h2>Today’s Tasks</h2>

        <?php if (!empty($tasks)): ?>
            <ul class="task-list">
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <?= esc($task['title']) ?>
                        -
                        <span class="status">
                            <?= esc($task['status']) ?>
                        </span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No tasks scheduled for today.</p>
        <?php endif; ?>

    </div>

</body>
</html>