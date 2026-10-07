<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>Edit Task</h1>

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

        <form action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post">

            <p>
                <label for="title">Task Title:</label><br>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?= old('title', $task['title']) ?>"
                    required
                >
            </p>

            <p>
                <label for="task_date">Task Date:</label><br>
                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    value="<?= old('task_date', $task['task_date']) ?>"
                    required
                >
            </p>

            <p>
                <label for="status">Status:</label><br>
                <select id="status" name="status">
                    <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>
                        Pending
                    </option>
                    <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>
                        Completed
                    </option>
                </select>
            </p>

            <button type="submit">Update Task</button>

        </form>

    </div>

</body>
</html>