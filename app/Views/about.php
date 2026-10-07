<!DOCTYPE html>
<html>
<head>
    <title>About</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>About the System</h1>

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

        <h2>Tasks for Today Management System</h2>

        <p>
            This system was developed by
            <strong>Jilianne Mayelle Paquibot</strong>.
        </p>

        <p>
            The system was created using CodeIgniter 4 and MySQL.
        This is a Tasks for Today Management System with four pages: a Welcome page showing only today's tasks, 
        a full Task List page showing every task, a Profile page showing one demo user's information, 
        and an About page identifying with myself, Jilianne Mayelle Paquibot as the developer.
        </p>

    </div>

</body>
</html>