<?php session_start(); ?>

<!DOCTYPE html>

<!-- formulario de acceso -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login session</title>
</head>
<body>
    <div class="login-container">
        <h2>🌺Star session</h2>
        <?php if(isset($_SESSION['error'])): ?>
            <p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="validar_login.php" method="post">
            <input type="text" name="usuario" placeholder="User" required>
            <input type="password" name="clave" placeholder="Password" required>
            <button type="submit">Log-in</button>
        </form>
    </div>
</body>
</html>
