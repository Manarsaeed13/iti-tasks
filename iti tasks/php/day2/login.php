<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($email))    $errors[] = "Email is required.";
    if (empty($password)) $errors[] = "Password is required.";

    if (empty($errors)) {
        $foundUser = null;

        foreach ($_SESSION['users'] as $u) {
            if ($u['email'] === $email && $u['password'] === $password) {
                $foundUser = $u;
                break;
            }
        }

        if ($foundUser) {
            $_SESSION['user'] = $foundUser;
            header("Location: index.php?message=Welcome back, " . $foundUser['name']);
            exit();
        } else {
            $errors[] = "Invalid email or password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <?php require "navbar.php";
    if (isset($_GET["message"])) {
        echo "<p class='alert alert-success w-50 m-auto text-center'>" . htmlspecialchars($_GET['message']) . "</p>";
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Login</h3>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </form>

                        <p class="text-center mt-3 mb-0">
                            Don't have an account? <a href="register.php">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>