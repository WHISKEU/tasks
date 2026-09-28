<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>User Profile</h1>

        <nav>
            <a href="<?= base_url('/') ?>">Welcome</a>
            <a href="<?= base_url('tasks') ?>">All Tasks</a>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('about') ?>">About</a>
        </nav>

        <?php if (!empty($user)): ?>
            <p>
                <strong>Username:</strong>
                <?= esc($user['username']) ?>
            </p>

            <p>
                <strong>Full Name:</strong>
                <?= esc($user['full_name']) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= esc($user['email']) ?>
            </p>
        <?php else: ?>
            <p>User record not found.</p>
        <?php endif; ?>

    </div>

</body>
</html>