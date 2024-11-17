<?php
session_start();
include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM products");
$rows = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1.25rem;
        }
        .card-body {
            padding: 1.5rem;
        }
    </style>
</head>

<body>
    <?php include 'include/menu.php'; ?>

    <div class="container" style="margin-top: 30px;">
        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <h4 class="mb-4">Product List</h4>

        <div class="row">
            <?php if ($rows > 0): ?>
                <?php while ($product = mysqli_fetch_assoc($query)): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100">
                            <?php if (!empty($product['profile_image'])): ?>
                                <img src="/upload_image/<?php echo $product['profile_image']; ?>" class="card-img-top" alt="Product Image">
                            <?php else: ?>
                                <img src="/assets/image/no-image.png" class="card-img-top" alt="No Image">
                            <?php endif; ?>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                                <p class="card-text text-success fw-bold mb-1"><?php echo number_format($product['price'], 2); ?> Baht</p>
                                <p class="card-text text-muted mb-3"><?php echo nl2br($product['detail']); ?></p>
                                <a href="/cart-add.php?id=<?php echo $product['id']; ?>" class="btn btn-primary mt-auto w-100"><i class="fa-regular fa-cart-arrow-down me-1"></i>Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <h4 class="text-danger">No products available</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="/assets/css/bootstrap.min.js"></script>
</body>
</html>
