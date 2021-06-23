<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="Smarty/smarty-dir/assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="Smarty/smarty-dir/assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>Aggiungi un premio</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="Smarty/smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="Smarty/smarty-dir/assets/css/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="Smarty/smarty-dir/assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="Smarty/smarty-dir/assets/css/admin.css">
</head>
<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"><a href="index.html"><img class="blur-up lazyloaded" src="Smarty/smarty-dir/assets/images/icon/logo.png" alt=""></a></div>
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="Smarty/smarty-dir/assets/images/dashboard/man.png" alt="header-user">
                            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li><a href="#"><i data-feather="user"></i>Profilo</a></li>
                            <li><a href="#"><i data-feather="log-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        <div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="index.html"><img  class="blur-up lazyloaded" src="Smarty/smarty-dir/assets/images/icon/logo.png" alt=""></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle blur-up lazyloaded" src="Smarty/smarty-dir/assets/images/dashboard/man.png" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">{$nomeadmin}</h6>
                    <p>amministratore.</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="index.html"><i data-feather="home"></i><span>Home</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Prodotti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="product-list.tpl"><i class="fa fa-circle"></i>Lista Prodotti</a></li>
                            <li><a href="add-product.html"><i class="fa fa-circle"></i>Aggiungi un prodotto</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Premi</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="product-list.tpl"><i class="fa fa-circle"></i>Lista Premi</a></li>
                            <li><a href="add-product.html"><i class="fa fa-circle"></i>Aggiungi un premio</a></li>

                        </ul>
                    </li>                    
                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Buoni Sconto</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="coupon-list.tpl"><i class="fa fa-circle"></i>List Coupons</a></li>
                            <li><a href="coupon-create.tpl"><i class="fa fa-circle"></i>Create Coupons </a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Utenti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="user-list.html"><i class="fa fa-circle"></i>User List</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>Login</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->


        <!-- Right sidebar Ends-->

        <div class="page-body">

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Aggiungi un premio
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Premi</li>
                                <li class="breadcrumb-item active">Aggiungi un premio</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Aggiungi un premio</h5>
                            </div>
                            <div class="card-body">
                                <div class="row product-adding">
                                    <div class="col-xl-5">
                                        <div class="add-product">
                                            <div class="row">
                                                <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                                    <img src="Smarty/smarty-dir/assets/images/pro3/1.jpg" alt="" class="img-fluid image_zoom_1 blur-up lazyloaded">
                                                </div>
                                                <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                                    <ul class="file-upload-product">
                                                        <li><div class="box-input-file"><input class="upload" type="file" name="file"><i class="fa fa-plus"></i></div></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <form class="needs-validation add-product-form" novalidate=""
                                        action="MainControl.php">
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Nome: </label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" required="" name="nome">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Marca :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" type="text" required="" name="marca">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Quantità :</label>
                                                    <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                                        <div class="input-group">
                                                            <input class="touchspin" type="text" value="1">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Punti necessari : </label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" required="" name="punti">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-sm-4">Descrizione :</label>
                                                    <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                        <textarea id="editor1" name="descrizione" cols="60" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary">Aggiungi</button>
                                                <button type="button" class="btn btn-light">Exit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>


    </div>

</div>

<!-- latest jquery-->
<script src="Smarty/smarty-dir/assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="Smarty/smarty-dir/assets/js/popper.min.js"></script>
<script src="Smarty/smarty-dir/assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="Smarty/smarty-dir/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="Smarty/smarty-dir/assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="Smarty/smarty-dir/assets/js/sidebar-menu.js"></script>

<!-- touchspin js-->
<script src="Smarty/smarty-dir/assets/js/touchspin/vendors.min.js"></script>
<script src="Smarty/smarty-dir/assets/js/touchspin/touchspin.js"></script>
<script src="Smarty/smarty-dir/assets/js/touchspin/input-groups.min.js"></script>

<!-- form validation js-->
<script src="Smarty/smarty-dir/assets/js/dashboard/form-validation-custom.js"></script>

<!-- ckeditor js-->


<!-- Zoom js-->
<script src="Smarty/smarty-dir/assets/js/jquery.elevatezoom.js"></script>
<script src="Smarty/smarty-dir/assets/js/zoom-scripts.js"></script>

<!--Customizer admin-->
<script src="Smarty/smarty-dir/assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="Smarty/smarty-dir/assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="Smarty/smarty-dir/assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="Smarty/smarty-dir/assets/js/admin-script.js"></script>

</body>
</html>
