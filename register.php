<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php if(!empty($_SESSION['message'])): ?>
            <div class="alert alert-warning alert-dismissible fade show my-5" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="row d-flex align-items-center justify-content-center" style="height: 550px;">
            <div class="col-sm-5">
                <form action="/register-form.php" method="post" class="border round p-5">
                <h1 class="fw-bold">Register</h1>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fullname</label>
                        <input type="text" name="fullname" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/login.php" class="btn btn-secondary">Go to Login page</a>
                </form>
            </div>
        </div>
    </div>
    <script src="/assets/css/bootstrap.min.js"></script>
</body>
</html>
