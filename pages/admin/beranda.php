<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Admin</title>
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="pages/admin/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        .beranda-header {
            color: #333;
            padding: 30px 20px;
            text-align: center;
            font-size: 30px;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .beranda-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 60px 20px;
        }

        .beranda-container .card {
            background-color: #ffffff;
            border: 1px solid rgba(44, 62, 80, 0.2);
            border-radius: 12px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .beranda-container .username {
            font-size: 28px;
            font-weight: 600;
            color: #2c3e50;
            margin: 10px 0;
        }

        .beranda-container .subtitle {
            font-size: 16px;
            color: #555;
        }

        .beranda-footer {
            width: 100%;
            margin-top: 50px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php include "includes/header.php" ?>
    <?php include "includes/sidebar.php" ?>

    <div class="kelola">
        <header class="beranda-header">
            Selamat Datang di Panel Admin
        </header>

        <div class="beranda-container">
            <div class="card">
                <p>Halo,</p>
                <p class="username"><?= $_SESSION['name'] ?></p>
                <p class="subtitle">Semoga harimu menyenangkan di Kota Cimahi 🌿</p>
            </div>
        </div>

        <footer class="beranda-footer">
            © 2025 CIMAHI. All rights reserved.
        </footer>
    </div>

    <script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>