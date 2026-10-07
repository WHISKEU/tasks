<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="container">

        <h1>Login</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <p style="color: #be185d;">
                <?= esc(session()->getFlashdata('error')) ?>
            </p>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">

            <p>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required>
            </p>

            <p>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required>
            </p>

            <button type="submit">Login</button>

        </form>
    </div>

</body>
</html>