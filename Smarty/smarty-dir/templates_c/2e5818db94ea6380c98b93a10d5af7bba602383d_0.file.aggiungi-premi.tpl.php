<?php
/* Smarty version 3.1.39, created on 2021-06-28 20:58:36
  from 'C:\Users\david\public_html\ADC-Store\Smarty\smarty-dir\templates\aggiungi-premi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60da1bdcdfeb55_90249643',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2e5818db94ea6380c98b93a10d5af7bba602383d' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ADC-Store\\Smarty\\smarty-dir\\templates\\aggiungi-premi.tpl',
      1 => 1624906714,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60da1bdcdfeb55_90249643 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>ADC-Store Aggiungi Premio</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/Smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/Smarty-dir/assets/css/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/Smarty-dir/assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/Smarty-dir/assets/css/admin.css">
</head>
<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"><a href="homeAdmin.tpl"><img class="blur-up lazyloaded" src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/dashboard/logo.png" alt=""></a></div>
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">


                    <li><a class="text-dark" href="#" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>


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
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle blur-up lazyloaded" src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/dashboard/man.png" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">Bentornato <?php echo $_smarty_tpl->tpl_vars['nomeadmin']->value;?>
</h6>
                    <p>Area Amministratore.</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHomeAdmin"><i data-feather="home"></i><span>Home</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Prodotti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="product-list.tpl"><i class="fa fa-circle"></i>Lista Prodotti</a></li>
                            <li><a href="add-product.html"><i class="fa fa-circle"></i>Aggiungi un prodotto</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Premi</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href=<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestionePunti/recuperaPremi><i class="fa fa-circle"></i>Lista Premi</a></li>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaAggiungiPremi"><i class="fa fa-circle"></i>Aggiungi un premio</a></li>

                        </ul>
                    </li>                    
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Clienti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneUtenti/recuperaClienti"><i class="fa fa-circle"></i>Lista Clienti</a></li>
                        </ul>
                            </li>
                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Buoni Sconto</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneBuoni/recuperaCreazioneBuono"><i class="fa fa-circle"></i>Regala Buono</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Profilo</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/apriProfilo"><i class="fa fa-circle"></i>Visita Profilo</a></li>
                        </ul>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneUtenti/logout"><i class="fa fa-circle"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page Sidebar Ends-->

        

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
                                <li class="breadcrumb-item"><a href="home.html"><i data-feather="home"></i></a></li>
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
                                                

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-7">
                                        <form class="needs-validation add-product-form" novalidate=""  enctype="multipart/form-data" method="post" action="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestionePunti/aggiungiPremio">
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Seleziona immagine :</label>
                                                    <input type="file" name="file_inviato" id="fileToUpload">

                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Nome premio :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" name='nome' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Marca :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" name='marca' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Punti necessari :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" type="text" name='punti' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Quantità :</label>
                                                    <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                                        <div class="input-group">
                                                            <input class="touchspin" type="text" name='quantita' value="1">
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4">Aggiungi una descrizione :</label>
                                                    <div class="col-xl-8 col-sm-7 pl-0 description-sm">
                                                        <textarea name="descrizione" cols="60" rows="5"> </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" onclick="Funzione1()" class="btn btn-primary"/>aggiungi</button>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestionePunti/recuperaAggiungiPremio" class="btn btn-light">Annulla</a>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>

<!-- Bootstrap js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/bootstrap.js"><?php echo '</script'; ?>
>

<!-- feather icon js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/icons/feather-icon/feather.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/icons/feather-icon/feather-icon.js"><?php echo '</script'; ?>
>

<!-- Sidebar jquery-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/sidebar-menu.js"><?php echo '</script'; ?>
>

<!-- touchspin js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/touchspin/vendors.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/touchspin/touchspin.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/touchspin/input-groups.min.js"><?php echo '</script'; ?>
>

<!-- form validation js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/dashboard/form-validation-custom.js"><?php echo '</script'; ?>
>

<!-- ckeditor js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/editor/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/editor/ckeditor/styles.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/editor/ckeditor/adapters/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/editor/ckeditor/ckeditor.custom.js"><?php echo '</script'; ?>
>

<!-- Zoom js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jquery.elevatezoom.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/zoom-scripts.js"><?php echo '</script'; ?>
>

<!--Customizer admin-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/admin-customizer.js"><?php echo '</script'; ?>
>

<!-- lazyload js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/lazysizes.min.js"><?php echo '</script'; ?>
>

<!--right sidebar js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/chat-menu.js"><?php echo '</script'; ?>
>

<!--script admin-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/admin-script.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    function Funzione1() {
        alert("Il premio è stato inserito correttamente.");
    }
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
