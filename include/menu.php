<body>
    <div class="d-flex flex-column flex-md-row">
        <!-- Sidebar -->
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" 
             style="width: 200px; height: 100vh; position: fixed;">
            <div class="d-flex justify-content-center mb-3">
                <img src="assets/image/Logo.png" alt="Profile Image" 
                     class="rounded-circle" width="80" height="80">
            </div>
            <hr class="text-secondary">

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/index.php" class="nav-link text-white">
                        <i class="fa-solid fa-house"></i>
                        <span class="menu-text">Home</span>
                    </a>
                </li>
                <li>
                    <a href="/product-edit.php" class="nav-link text-white">
                        <i class="fa-solid fa-list"></i>
                        <span class="menu-text">Product Edit</span>
                    </a>
                </li>
                <li>
                    <a href="/product-list.php" class="nav-link text-white">
                        <i class="fa-solid fa-list"></i>
                        <span class="menu-text">Product List</span>
                    </a>
                </li>
                <li>
                    <a href="/cart.php" class="nav-link text-white">
                        <i class="fa-solid fa-shopping-cart"></i>
                        <span class="menu-text">Cart (<?php echo count($_SESSION['cart'] ?? []); ?>)</span>
                    </a>
                </li>
                <li>
                    <a href="/Logout.php" class="nav-link text-white">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span class="menu-text">Logout</span>
                    </a>
                </li>
            </ul>
            <hr class="text-secondary">
        </div>

    </div>

    <script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <style>
        .sidebar {
            width: 200px;
            height: 100vh;
            background-color: #343a40;
            transition: width 0.3s ease;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            font-size: 16px;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        .nav-link:hover {
            background-color: #495057;
            border-radius: 5px;
        }

        .nav-link i {
            font-size: 18px;
            margin-right: 10px;
        }

        .menu-text {
            display: inline;
            transition: opacity 0.3s ease;
        }

        /* Content */
        .content {
            padding-top: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .nav-link {
                padding-left: 20px;
                justify-content: center;
            }

            .nav-link i {
                margin-right: 0;
            }

            .menu-text {
                display: none;
            }

            .content {
                margin-left: 60px;
            }
        }
    </style>
</body>
