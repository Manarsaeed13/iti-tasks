<?php
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php">Students App</a>
        <div class="d-flex">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="navbar-text text-white me-3">
                    Hi, <?= htmlspecialchars($_SESSION['user']['name']) ?>
                </span>
                <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-outline-light btn-sm me-2">Login</a>
                <a href="register.php" class="btn btn-light btn-sm">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>