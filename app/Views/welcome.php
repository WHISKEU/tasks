<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

    <h1>Tasks for Today</h1>

    <nav>
        <a href="/">Welcome</a> |
        <a href="/tasks">All Tasks</a> |
        <a href="/profile">Profile</a> |
        <a href="/about">About</a>
    </nav>

    <hr>

    <h2>Today’s Tasks</h2>

    <?php if (!empty($tasks)): ?>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <?= esc($task['title']) ?>
                    -
                    <?= esc($task['status']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No tasks scheduled for today.</p>
    <?php endif; ?>

</body>
</html>