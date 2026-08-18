<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <?php require "navbar.php";
    if (isset($_GET["message"])) {
       
    }

    ?>


    <!-- users data  -->
    <h2 class="text-success text-center">All Data</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($users) === 0): ?>
                <tr>
                    <td colspan="4" class="text-center">No students registered yet.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($users as $i => $u): ?>
                    <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td><?= htmlspecialchars($u['name']) ?></td>
                        <td><?= htmlspecialchars($u['email']) ?></td>
                        <td>
                            <a href="update.php?id=<?= $i ?>" class="btn btn-sm btn-outline-primary">Update</a>
                            <a href="delete.php?id=<?= $i ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete <?= htmlspecialchars($u['name']) ?>?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>