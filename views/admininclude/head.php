    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php if(isset($_SESSION['Usrnm'])): ?>
    <title>MIPSS | Admin: <?php echo $_SESSION['Usrnm']; ?></title>
    <?php endif; ?>
    <link rel="stylesheet" href="<?php assets("libs/bootstrap/version/3.3.2/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php assets("libs/metismenu/version/1.1.3/css/metisMenu.min.css"); ?>">
    <link rel="stylesheet" href="<?php assets("libs/startmin/version/0.0.1/css/startmin.css"); ?>">
    <link rel="stylesheet" href="<?php assets("libs/fontawesome/version/5.15.4/css/all.min.css"); ?>"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->