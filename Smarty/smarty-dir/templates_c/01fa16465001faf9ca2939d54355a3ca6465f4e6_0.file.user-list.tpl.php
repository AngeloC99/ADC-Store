<?php
/* Smarty version 3.1.39, created on 2021-06-28 20:03:59
  from 'C:\Users\david\public_html\ADC-Store\Smarty\smarty-dir\templates\user-list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60da0f0f0c3a98_07675705',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '01fa16465001faf9ca2939d54355a3ca6465f4e6' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ADC-Store\\Smarty\\smarty-dir\\templates\\user-list.tpl',
      1 => 1624903435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60da0f0f0c3a98_07675705 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>ADC-Store</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/flag-icon.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/jsgrid.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/admin.css">
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
                        <h6 class="mt-3 f-14"><?php echo $_smarty_tpl->tpl_vars['nomeadmin']->value;?>
</h6>
                    <p>Area Amministratore</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHome"><i data-feather="home"></i><span>Home</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Prodotti</span><i class="fa fa-angle-right pull-right"></i></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneProdotti/recuperaProdotti"><i class="fa fa-circle"></i>Lista Prodotti</a></li>
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneProdotti/recuperaAggiungiProdotto"><i class="fa fa-circle"></i>Aggiungi Prodotto</a></li>

                                </ul>

                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Premi</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestionePunti/recuperaPremi"><i class="fa fa-circle"></i>Lista Premi</a></li>
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
                                <h3>Lista clienti
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Clienti</li>
                                <li class="breadcrumb-item active">Lista clienti</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>Dettagli clienti</h5>
                    </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table cart-table table-responsive-xs">
                                        <thead>
                                        <tr class="table-head">
                                            <th scope="col">Nome</th>
                                            <th scope="col">Cognome</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Password</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clienti']->value, 'cl', false, 'id');
$_smarty_tpl->tpl_vars['cl']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['cl']->value) {
$_smarty_tpl->tpl_vars['cl']->do_else = false;
?>
                                            <tr>
                                                <td>
                                                    <a><?php echo $_smarty_tpl->tpl_vars['cl']->value['nome'];?>
</a>
                                                </td>
                                                <td>
                                                    <a><?php echo $_smarty_tpl->tpl_vars['cl']->value['cognome'];?>
</a>
                                                </td>
                                                <td>
                                                    <a><?php echo $_smarty_tpl->tpl_vars['cl']->value['email'];?>
</a>
                                                </td>
                                                <td>
                                                    <a><?php echo $_smarty_tpl->tpl_vars['cl']->value['password'];?>
</a>
                                                </td>

                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                </div>
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">Copyright 2019 © Multikart All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->
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

<!-- Jsgrid js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jsgrid/jsgrid.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jsgrid/griddata-users.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jsgrid/jsgrid-users.js"><?php echo '</script'; ?>
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

</body>
</html>
<?php }
}
