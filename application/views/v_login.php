<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistem Poin Of Sales</title>
  <!-- omahbaba -->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/login/img/icon.png"/>
    <!-- <meta name="Sistem Penjualan Oemah Babah" content=""> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/login/img/icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/style.css">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->     
    <section class="fxt-template-animation fxt-template-layout4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-12 fxt-bg-wrap">
                    <!-- omahbaba -->
                    <div class="fxt-bg-img" data-bg-image="<?php echo base_url() ?>assets/login/img/figure/bg4-l.jpg">
                        <!-- garam -->
                        <!-- <div class="fxt-bg-img" data-bg-image="<?php echo base_url() ?>assets/garam/company.jpg"> -->
                        <div class="fxt-header">
                            <div class="fxt-transformY-50 fxt-transition-delay-1">
                                <!-- <a href="login-4.html" class="fxt-logo"><img src="<?php echo base_url() ?>assets/login/img/logo-4.png" alt="Logo"></a> -->
                            </div>
                            <div class="fxt-transformY-50 fxt-transition-delay-2">
                                <!-- <h1>Halaman Login</h1> -->
                            </div>
                            <!-- <div class="fxt-transformY-50 fxt-transition-delay-3">
                                <p>Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit. Vesti at bulum nec odio aea the dumm ipsumm ipsum that dolocons rsus mal suada and fadolorit to the dummy consectetur elit the Lorem Ipsum genera.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 fxt-bg-color">
                    <div class="fxt-content">
                        <div class="fxt-form">
                            <div class="box-body">
                                <?php if ($this->session->flashdata('SUCCESS')) { ?>
                                   <div class="alert alert-success alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fa fa-check"></i> Success!</h5>
                                      Data berhasil di perbarui.
                                    </div>                 
                                  <?php } ?>
                                </div>
                            <form class="login100-form validate-form" action="<?php echo site_url('C_Login/cek_login'); ?>" method="post">
                                <div class="form-group">  
                                    <label for="email" class="input-label">Username</label>                                              
                                    <input type="text" id="username" class="form-control" name="username" placeholder="username" required="required">
                                </div>
                                <div class="form-group">  
                                    <label for="password" class="input-label">Password</label>                                               
                                    <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                                    <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="fxt-checkbox-area">
                                        <div class="checkbox">
                                            <input id="checkbox1" type="checkbox">
                                            <label for="checkbox1">Keep me logged in</label>
                                        </div>
                                        <a href="<?php echo base_url() ?>assets/login/forgot-password-4.html" class="switcher-text">Forgot Password</a>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <button type="submit" class="fxt-btn-fill">Login Disini</button>
                                </div>
                            </form>                            
                        </div> 
                        <!-- <div class="fxt-footer">
                            <p>Don't have an account?<a href="register-4.html" class="switcher-text">Register</a></p>
                        </div>                             -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jquery-->
    <script src="<?php echo base_url() ?>assets/login/js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url() ?>assets/login/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url() ?>assets/login/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?php echo base_url() ?>assets/login/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?php echo base_url() ?>assets/login/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>assets/login/js/main.js"></script>

</body>

</html>