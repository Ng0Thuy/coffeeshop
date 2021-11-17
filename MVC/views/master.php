<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meta Coffee | Dự án 1 | Nhóm 2</title>
    <link rel="shortcut icon" href="http://localhost/DuAn1/MVC/public/images/icon_logo.png" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/grid.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/base.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/style.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/themify-icons/themify-icons.css" />
</head>

<body>
    <div class="app">
        <?php require_once "./mvc/views/blocks/header.php"; ?>
        <?php require_once "./mvc/views/Page/Site/" . $data["Page"] . ".php" ?>
        <?php require_once "./mvc/views/blocks/footer.php"; ?>
    </div>
    <!-- ============================= Javascript ===================================== -->
    <script src="<?= BASE_URL ?>/MVC/public/js/click_btn.js"></script>
    <script src="<?= BASE_URL ?>/MVC/public/js/sroll.js"></script>
    <script src="<?= BASE_URL ?>/MVC/public/js/slider.js"></script>
    <script src="<?= BASE_URL ?>/MVC/public/js/login.js"></script>
</body>

</html>