<!DOCTYPE html>
<html>
<head>
    <title>All Tasks</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>All Tasks</h1>

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

        <?php if (session()->get('isLoggedIn')): ?>
            <div class="new-task-container">
                <a class="new-task-button" href="<?= base_url('tasks/new') ?>">
                    + New Task
                </a>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: #7e22ce;">
                <?= esc(session()->getFlashdata('success')) ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($tasks)): ?>
            <table>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Date</th>
                    <?php if (session()->get('isLoggedIn')): ?>
                        <th>Actions</th>
                    <?php endif; ?>
                </tr>

                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= esc($task['title']) ?></td>
                        <td class="status"><?= esc($task['status']) ?></td>
                        <td><?= esc($task['task_date']) ?></td>

                        <?php if (session()->get('isLoggedIn')): ?>
                            <td>
                                <a href="<?= base_url('tasks/edit/' . $task['id']) ?>">
                                    Edit
                                </a>

                                <form
                                    action="<?= base_url('tasks/delete/' . $task['id']) ?>"
                                    method="post"
                                    style="display: inline;"
                                >
                                    <button type="submit">
                                        Archive
                                    </button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No active tasks found.</p>
        <?php endif; ?>

    </div>

</body>
</html>