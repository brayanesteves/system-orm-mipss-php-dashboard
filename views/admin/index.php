<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['Usrnm'])): ?>
    <h1>Admin: <span><?php echo $_SESSION['Usrnm']; ?></span></h1>
    <?php else: redirect('/login'); ?>
    <?php endif; ?>
</body>
</html>