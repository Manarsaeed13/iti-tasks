<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null || !isset($_SESSION['users'][$id])) {
    header("Location: index.php?message=" . urlencode("User not found"));
    exit();
}

$errors = [];
$user = $_SESSION['users'][$id]; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = isset($_POST['name'])  ? trim($_POST['name'])  : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (empty($name))  $errors[] = "Name is required.";
    if (empty($email)) $errors[] = "Email is required.";

    if (empty($errors)) {
       
        foreach ($_SESSION['users'] as $index => $u) {
            if ($index != $id && $u['email'] === $email) {
                $errors[] = "This email is already used by another user.";
                break;
            }
        }
    }

    if (empty($errors)) {
        $_SESSION['users'][$id]['name']  = $name;
        $_SESSION['users'][$id]['email'] = $email;

        
        if ($_SESSION['user']['email'] === $user['email']) {
            $_SESSION['user']['name']  = $name;
            $_SESSION['user']['email'] = $email;
        }

        header("Location: index.php?message=" . urlencode("Updated $name successfully"));
        exit();
    }

    $user['name']  = $name;
    $user['email'] = $email;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-light">

    <?php require "navbar.php"; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Update User</h3>

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
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                        </form>

                        <p class="text-center mt-3 mb-0">
                            <a href="index.php">Back to list</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>