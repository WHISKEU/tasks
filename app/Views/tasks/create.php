<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>New Task</h1>

        <nav>
            <a href="<?= base_url('/') ?>">Welcome</a>
            <a href="<?= base_url('tasks') ?>">All Tasks</a>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('about') ?>">About</a>
            <a href="<?= base_url('logout') ?>">Logout</a>

        <?php if (session()->get('isLoggedIn')): ?>
            <a href="<?= base_url('logout') ?>">Logout</a>
        <?php else: ?>
            <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>

        </nav>

        <?php $errors = session()->getFlashdata('errors') ?? []; ?>

        <?php if (!empty($errors)): ?>
            <ul style="color: #be185d;">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="<?= base_url('tasks') ?>" method="post">

            <p>
                <label for="title">Task Title:</label><br>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= old('title') ?>"
                    required
                >
            </p>

            <p>
                <label for="task_date">Task Date:</label><br>
                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="<?= old('task_date', date('Y-m-d')) ?>"
                    required
                >
            </p>

            <button type="submit">Save Task</button>

        </form>

    </div>

</body>
</html>