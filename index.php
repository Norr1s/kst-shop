<?php
session_start();
include 'config.php';

if (empty($_SESSION[WP . 'checklogin'])) {
    $_SESSION['message'] = 'You are not autherlize';
    header("location:/login.php");
}

$query = mysqli_query($conn, "SELECT * FROM products");
$rows = mysqli_num_rows($query);

$result = [
    'id' => '',
    'product_name' => '',
    'price' => '',
    'detail' => '',
    'product_image' => '',
];

if (!empty($_GET['id'])) {
    $query_product = mysqli_query($conn, "SELECT * FROM products WHERE id='{$_GET['id']}'");
    $row_product = mysqli_num_rows($query_product);

    if ($row_product == 0) {
        header('location:' . '/index.php');
    }

    $result = mysqli_fetch_assoc($query_product);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'include/menu.php'; ?>
    <div class="container" style="margin-top: 30px;">
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-warning alert-dismissible fade show my-5" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <div class="px-4 py-5 my-5 text-center">
            <img class="d-block mx-auto mb-4" src="assets/image/Logo 2.png" alt="Website Logo" width="72" height="72">
            <h1 class="display-5 fw-bold text-body-emphasis">Welcome to Our Shop!</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">
                    This is your one-stop shop for everything you need. Browse through a wide range of products and find great deals. Our website is easy to use, secure, and perfect for shopping. You can also add new products if you are a seller. Start shopping or managing your store today!
                </p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="product-list.php" class="btn btn-primary btn-lg px-4 gap-3">Shop Now</a>
                    <a href="product-edit.php" class="btn btn-outline-secondary btn-lg px-4">Add Products</a>
                </div>
            </div>
        </div>


    </div>
    <script src="/assets/css/bootstrap.min.js"></script>
</body>

</html>