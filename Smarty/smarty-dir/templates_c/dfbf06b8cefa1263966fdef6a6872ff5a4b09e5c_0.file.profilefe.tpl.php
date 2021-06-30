<?php
/* Smarty version 3.1.39, created on 2021-06-30 12:19:42
  from 'C:\Users\david\public_html\ADC-Store\Smarty\smarty-dir\templates\profilefe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60dc453ed45a03_97088596',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dfbf06b8cefa1263966fdef6a6872ff5a4b09e5c' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ADC-Store\\Smarty\\smarty-dir\\templates\\profilefe.tpl',
      1 => 1625045234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60dc453ed45a03_97088596 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon" />
    <title>Profilo Utente</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/color1.css" media="screen" id="color">


</head>

<body>


<!-- header start -->
<header>
    <div class="mobile-fix-option"></div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">

                    <div class="brand-logo">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHome"> <img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/logo.png"
                                                                              class="img-fluid blur-up lazyload" alt=""></a>
                    </div>

                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <div class="toggle-nav">
                                    <i class="fa fa-bars sidebar-bar"></i>
                                </div>
                                <!-- Horizontal menu -->
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                                                   aria-hidden="true"></i></div>
                                   </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHome">Home</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneProdotti/recuperaProdotti">Prodotti</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestionePunti/recuperaPremi">Premi</a>
                                    </li>
                                    <li><a href="">Account</a>
                                        <ul>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/apriProfilo" data-lng="en">Il mio profilo ADC-Store</a></li>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaGestioneCarrello" data-lng="en">Carrello della spesa</a></li>
                                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneUtenti/logout" data-lng="en">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/chiSiamo">Chi siamo</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->


    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Il tuo profilo ADC-Store</h2>
                    </div>
                </div>

                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHome">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">profilo</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- personal deatail section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>DETTAGLI PERSONALI</h1>

                        <div class="form-row">
                            <div class="col-md-6">
                                <h4>Nome:</h4><br>
                                <h3><?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
</h3>

                            </div>
                            <div class="col-md-6">
                                <h4>Cognome:</h4><br>
                                <h2><?php echo $_smarty_tpl->tpl_vars['cognome']->value;?>
</h2>
                            </div>
                            <div class="col-md-6" >
                                <h4>Email:</h4><br>
                                <h2><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</h2>
                            </div>
                            <div class="col-md-6">
                                <h4>Punti accumulati:</h4><br>
                                <h2><?php echo $_smarty_tpl->tpl_vars['punti']->value;?>
</h2>
                            </div>
                        </div>
                    <br><br>
                    <br><br>
                    <div class="row cart-buttons">
                        <div class="col-6"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneBuoni/recuperaBuoni" class="btn btn-solid">Buoni sconto</a></div>
                        <div class="col-6"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaFormPunti" class="btn btn-solid">Regala punti</a></div>
                    </div>
                    <br><br>
                    <div class="row cart-buttons">
                        <div class="col-6"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaGestioneCarte" class="btn btn-solid">Carte di credito</a></div>
                        <div class="col-6"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaGestioneIndirizzi" class="btn btn-solid">Indirizzi</a></div>
                    </div>
                    <br><br>
                    <div class="row cart-buttons">
                        <div class="col-6"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaGestioneCarrelliSalvati" class="btn btn-solid">Carrelli preferiti</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- address section start -->
    <section class="contact-page register-page section-b-space">
        <div class="container">
        </div>
    </section>
    <!-- Section ends -->


<!-- footer start -->
<footer class="footer-light">
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/logo.png" alt=""></div>
                        <p>ADC-Store è la tua catena di supermercati di fiducia in Italia, grazie a un modello originale d’impresa. Noi poniamo al centro i nostri clienti, sempre. </p> <br>
                        <p style="color: #0a0100">Seguici sulle nostre pagine social per non perderti nuove offerte!</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href=""><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Il tuo ADC-Store</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/apriProfilo">Il tuo profilo</a></li>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneCarrello/recuperaCarrello">Il tuo carrello ADC-Store</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Scopri di più</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/chiSiamo">Chi siamo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>informazioni</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>ADC Store
                                </li>
                                <li><i class="fa fa-phone"></i>Chiamaci: 3314166000</li>
                                <li><i class="fa fa-envelope-o"></i>Scrivici: ADCStore@gmail.com</li>
                                <li><i class="fa fa-fax"></i>Fax: 1234567890</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2020-21 Progetto di Programmazione Web</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->



<!-- theme setting -->
    <a href="javascript:void(0)" onclick="openSetting()">
        <div class="setting-sidebar" id="setting-icon">
            <div>
                <i class="fa fa-cog" aria-hidden="true"></i>
            </div>
        </div>
    </a>
    <div id="setting_box" class="setting-box">
        <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
        <div class="setting_box_body">
            <div onclick="closeSetting()">
                <div class="sidebar-back text-left"><i class="fa fa-angle-left pr-2" aria-hidden="true"></i> Back</div>
            </div>
            <div class="setting-body">
                <div class="setting-title">
                    <h4>layout</h4>
                </div>
                
                <div class="setting-title">
                    <h4>color picker</h4>
                </div>
                <div class="setting-contant">
                    <ul class="color-box">
                        <li>
                            <input id="ColorPicker1" type="color" value="#ff4c3b" name="Background">
                            <span>theme deafult color</span>
                        </li>
                    </ul>
                </div>
                <div class="setting-title">
                    <h4>RTL</h4>
                </div>
                <div class="setting-contant">
                    <ul class="setting_buttons">
                        <li class="active" id="ltr_btn"><a href="javascript:void(0)" class="btn setting_btn">LTR</a>
                        </li>
                        <li id="rtl_btn"><a href="javascript:void(0)" class="btn setting_btn">RTL</a></li>
                    </ul>
                </div>
                <div class="buy_btn">
                    <a href="https://themeforest.net/item/multikart-responsive-ecommerce-html-template/22809967?s_rank=1"
                        target="_blank" class="btn btn-block purchase_btn"><i class="fa fa-shopping-cart"
                            aria-hidden="true"></i> purchase Multikart now!</a>
                    <a href="https://themeforest.net/item/multikart-responsive-angular-ecommerce-template/22905358?s_rank=3"
                        target="_blank" class="btn btn-block purchase_btn"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/angular.png"
                            alt="" class="img-fluid"> Multikart Angular</a>
                    <a href="https://themeforest.net/item/multikart-responsive-react-ecommerce-template/23067773?s_rank=2"
                        target="_blank" class="btn btn-block purchase_btn"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/react.png"
                            alt="" class="img-fluid"> Multikart React</a>
                    <a href="https://themeforest.net/item/multikart-multipurpose-shopify-sections-theme/23093831?s_rank=1"
                        target="_blank" class="btn btn-block purchase_btn"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/shopify.png"
                            alt="" class="img-fluid"> Multikart Shopify</a>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->

    <!-- tap to top -->
    <div class="tap-top">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top End -->


    <!-- latest jquery-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>

    <!-- menu js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/menu.js"><?php echo '</script'; ?>
>

    <!-- lazyload js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/lazysizes.min.js"><?php echo '</script'; ?>
>

    <!-- popper js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/popper.min.js"><?php echo '</script'; ?>
>

    <!-- slick js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/slick.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/bootstrap.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Notification js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/bootstrap-notify.min.js"><?php echo '</script'; ?>
>

    <!-- Theme js-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/script.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }
    <?php echo '</script'; ?>
>

</body>

</html><?php }
}
