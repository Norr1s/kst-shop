<?php
session_start();
include 'config.php';

$productIds = [];
foreach (($_SESSION['cart'] ?? []) as $cartId => $cartQty) {
    $productIds[] = $cartId;
}

$ids = 0;
if (count($productIds) > 0) {
    $ids = implode(', ', $productIds);
}

$query = mysqli_query($conn, "SELECT * FROM products WHERE id IN ($ids)");
$rows = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="/assets/fontawesome/css/solid.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .checkout-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-lg {
            font-size: 1.25rem;
        }
    </style>
</head>

<body>
    <?php include 'include/menu.php'; ?>

    <div class="container" style="margin-top: 30px;">
        <div class="row justify-content-center">
            <div class="col-md-8 checkout-container">
                <h4 class="mb-4">Checkout</h4>

                <?php if (!empty($_SESSION['message'])): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <form action="/checkout-form.php" method="post">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="fullname" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Telephone</label>
                            <input type="text" name="tel" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="row g-4">
                        <div class="col-md-12">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">Your Cart</span>
                                <span class="badge bg-primary rounded-pill"><?php echo $rows; ?></span>
                            </h4>

                            <?php if ($rows > 0): ?>
                                <ul class="list-group mb-3">
                                    <?php $grand_total = 0; ?>
                                    <?php while ($product = mysqli_fetch_assoc($query)): ?>
                                        <?php if (!empty($_SESSION['cart'][$product['id']])): ?>
                                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                                <div>
                                                    <h6 class="my-0"><?php echo $product['product_name']; ?> (<?php echo $_SESSION['cart'][$product['id']]; ?>)</h6>
                                                    <small class="text-body-secondary"><?php echo nl2br($product['detail']); ?></small>
                                                    <input type="hidden" name="product[<?php echo $product['id']; ?>][price]" value="<?php echo $product['price']; ?>">
                                                    <input type="hidden" name="product[<?php echo $product['id']; ?>][name]" value="<?php echo $product['product_name']; ?>">
                                                </div>
                                                <span class="text-muted"><?php echo number_format($_SESSION['cart'][$product['id']] * $product['price'], 2); ?> Bath</span>
                                            </li>
                                            <?php $grand_total += $_SESSION['cart'][$product['id']] * $product['price']; ?>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                        <div class="text-success">
                                            <h6 class="my-0">Grand Total</h6>
                                        </div>
                                        <span class="text-success"><strong><?php echo number_format($grand_total, 2); ?> Bath</strong></span>
                                    </li>
                                </ul>
                                <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                            <?php else: ?>
                                <div class="alert alert-danger">Your cart is empty.</div>
                            <?php endif; ?>

                            <div class="text-end">
                                <a href="/product-list.php" class="btn btn-secondary btn-lg">Back to Products</a>
                                <button class="btn btn-primary btn-lg" type="submit">Proceed to Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/assets/css/bootstrap.min.js"></script>
</body>

</html>