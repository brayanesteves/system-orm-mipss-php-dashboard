<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MIPSS | Login</title>
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
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php url("login/signin"); ?>" method="POST">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter username..." name="username" type="text" required autocomplete="off" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                            <br />
                            <?php if(Session::has("status") && Session::has("message")){ ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Title:</strong> <?php echo Session::get("message"); ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php assets("libs/jquery/version/2.1.3/js/jquery.min.js"); ?>"></script>
        <script src="<?php assets("libs/bootstrap/version/3.3.2/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php assets("libs/metismenu/version/1.1.3/js/metisMenu.min.js"); ?>"></script>
        <script src="<?php assets("libs/startmin/version/0.0.1/js/startmin.js"); ?>"></script>

    </body>
</html>
