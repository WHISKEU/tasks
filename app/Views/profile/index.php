<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

    <h1>User Profile</h1>

    <nav>
        <a href="/">Welcome</a> |
        <a href="/tasks">All Tasks</a> |
        <a href="/profile">Profile</a> |
        <a href="/about">About</a>
    </nav>

    <hr>

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

</body>
</html>