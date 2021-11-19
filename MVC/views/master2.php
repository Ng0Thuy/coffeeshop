<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Meta Coffee | Dự án 1 | Nhóm 2</title>
    <link rel="shortcut icon" href="<?= BASE_URL ?>/MVC/public/images/icon_logo.png" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/grid.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/base.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/style.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/themify-icons/themify-icons.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/MVC/public/css/style2.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="app">
    <span class="scroll-top show-scroll" id="toTop">
            <i class="scroll-top__icon fas fa-chevron-up"></i>
        </span>
        <?php require_once "./mvc/views/blocks/header2.php"; ?>
        <?php require_once "./mvc/views/Page/Site/" . $data["Page"] . ".php" ?>
        <?php require_once "./mvc/views/blocks/footer.php"; ?>
    </div>
    <!-- ============================= Javascript ===================================== -->
    <script src="<?= BASE_URL ?>/MVC/public/js/sroll.js"></script>
    <script src="<?= BASE_URL ?>/MVC/public/js/slider.js"></script>
</body>

</html>