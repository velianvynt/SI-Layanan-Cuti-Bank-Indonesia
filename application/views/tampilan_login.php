<!DOCTYPE html>
<html lang="en" style="background : linear-gradient(to bottom right, #A0ABB1 , #A0ABB1);">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Informasi Layanan Cuti</title>

    <link rel="icon" href="<?php echo base_url();?>assets/images/logo-BI.png" type="image/ico" />

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
    <style>

    body{
        color:#ffffff;
    }

    .btn-success{
        background:#26B9;
        border: 1px solid #0000;
    }
    </style>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <div style="width : 350px; background: linear-gradient(to bottom right, #0F6C9F   , #0F6C9F   , #0F6C9F  ); margin: 80px auto; padding: 30px 20px;">
                    <li class="img-responsive">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url();?>assets/images/logo-BI.png"
                            class="user-image" alt="User Image" style="width : 100px; height: 100px; border-radius: 50%; position: absolute; top: 35px; left: calc(50% - 50px);">
                        </a>                
                    </li>
                <section class="login_content">
                    <form method="post" action="<?php echo base_url() ?>login/ambillogin">
                        <h1 class="text text-white">SI Layanan Cuti</h1>
                        <div>
                            <input type="text" class="form-control" required placeholder="Username" name="username" id="username" />
                        </div>
                        <div>
                            <input type="password" class="form-control" required placeholder="Password" name="password" id="password" />
                        </div>

                        <?= $this->session->flashdata('info'); ?>

                        <div>
                            <button class="btn btn-success submit" type="submit"><i class="fa fa-sign-in"></i> Login </button>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">
                                <a href="#signup" class="to_register"> </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <p>COPYRIGHT &copy; 2021 | KERJA PRAKTIK | SICUTI BANK INDONESIA PROVINSI BENGKULU</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>