<?php
/* Smarty version 3.1.39, created on 2021-06-29 17:18:09
  from 'C:\Users\david\public_html\ADC-Store\Smarty\smarty-dir\templates\category-page(infinite-scroll).tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60db39b13047f6_04591783',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91ccfd1df376168d50448c0eb8151e90ebaa636e' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ADC-Store\\Smarty\\smarty-dir\\templates\\category-page(infinite-scroll).tpl',
      1 => 1624979764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60db39b13047f6_04591783 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon">
    <title>ADC Store - Prodotti</title>

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

    <!-- Price range icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/price-range.css">

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
                                    <?php if ($_smarty_tpl->tpl_vars['loggato']->value) {?>
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
                                    <?php } else { ?>
                                        <li><a href="#">Clienti</a>
                                            <ul>
                                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaLogin">Accedi</a></li>
                                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneUtenti/recuperaCreazioneAccount">Registrazione</a></li>
                                            </ul>
                                        </li>
                                    <?php }?>
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
                        <h2>Lista Prodotti</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHome">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">prodotti</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        
                        
                    </div>
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="top-banner-wrapper">
                                        <a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                        <div class="top-banner-content small-section">
                                            <h2>Prodotti in vendita</h2>
                                            <h5>ADC-Store si impegna a fornire prodotti di qualità per soddisfare le esigenze di tutti i suoi clienti.
                                            </h5>
                                            <p>A tavola ci si incontra, si chiacchiera, ci si rilassa, si ride… talvolta ci si punzecchia, ma il buon cibo, soprattutto se acquistato su ADC-Store, fa da paciere. E’ capace di restituire il buonumore persino al termine di una giornata faticosa.
                                            (Antonino Cannavacciuolo)</p>
                                        </div>
                                    </div>
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                aria-hidden="true"></i> Filter</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Prodotti attualmente disponibili</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/2.png" alt="" class="product-2-layout-view"></li>
                                                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/3.png" alt="" class="product-3-layout-view"></li>
                                                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/4.png" alt="" class="product-4-layout-view"></li>
                                                                <li><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/6.png" alt="" class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">24 Prodotti Per Pagina
                                                                </option>
                                                                <option value="Low to High">50 Prodotti Per Pagina
                                                                </option>
                                                                <option value="Low to High">100 Prodotti Per Pagina
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Ordina Prodotti</option>
                                                                <option value="Low to High">50 Prodotti</option>
                                                                <option value="Low to High">100 Prodotti</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-wrapper-grid product-load-more">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['prodotti']->value, 'prod', false, 'id');
$_smarty_tpl->tpl_vars['prod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->do_else = false;
?>

                                                <div class="row margin-res">
                                                <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                	<img class="flex" src="data:<?php echo $_smarty_tpl->tpl_vars['prod']->value['formato'];?>
;charset=utf-8;base64,<?php echo $_smarty_tpl->tpl_vars['prod']->value['dati'];?>
" width="200" height="300"/>
                                                                </a>
                                                            </div>
                                                            <div class="cart-info cart-wrap">
                                                                <button data-toggle="modal" data-target="#addtocart" title="Add to cart"><i
                                                                        class="ti-shopping-cart"></i></button> <a href="javascript:void(0)" title="Add to Wishlist"><i
                                                                        class="ti-heart" aria-hidden="true"></i></a> <a href="#" data-toggle="modal" data-target="#quick-view" title="Quick View"><i
                                                                        class="ti-search" aria-hidden="true"></i></a> <a href="compare.html" title="Compare"><i
                                                                        class="ti-reload" aria-hidden="true"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                <div class="rating"></div>
                                                                <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneProdotti/recuperaDettagli/<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
">
                                                                    <h4><?php echo $_smarty_tpl->tpl_vars['prod']->value['nome'];?>
</h4>
                                                                    <h5><?php echo $_smarty_tpl->tpl_vars['prod']->value['marca'];?>
</h5>
                                                                </a>
                                                                <h5><?php echo $_smarty_tpl->tpl_vars['prod']->value['descrizione'];?>

                                                                </h5>
                                                                <h4> <?php echo $_smarty_tpl->tpl_vars['prod']->value['prezzo'];?>
€</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                        </div>
                                        <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">carica altri prodotti</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->



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
                            <?php if ($_smarty_tpl->tpl_vars['loggato']->value) {?>
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
                            <?php } else { ?>
                                <div class="footer-title">
                                    <h4>Entra in ADC-Store</h4>
                                </div>
                                <div class="footer-contant">
                                    <ul>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaLogin">Accedi al tuo account</a></li>
                                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneUtenti/recuperaCreazioneAccount">Crea un account</a></li>
                                    </ul>
                                </div>
                            <?php }?>

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
                                <h4>informationi</h4>
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

    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/pro3/1.jpg" alt="" class="img-fluid blur-up lazyload"></div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2>Women Pink Shirt</h2>
                                <h3>$32.96</h3>
                                <ul class="color-variant">
                                    <li class="bg-light0"></li>
                                    <li class="bg-light1"></li>
                                    <li class="bg-light2"></li>
                                </ul>
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                                </div>
                                <div class="product-description border-product">
                                    <div class="size-box">
                                        <ul>
                                            <li class="active"><a href="#">s</a></li>
                                            <li><a href="#">m</a></li>
                                            <li><a href="#">l</a></li>
                                            <li><a href="#">xl</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-left-minus" data-type="minus" data-field=""><i
                                                        class="ti-angle-left"></i></button> </span>
                                            <input type="text" name="quantity" class="form-control input-number" value="1"> <span class="input-group-prepend"><button type="button"
                                                    class="btn quantity-right-plus" data-type="plus" data-field=""><i
                                                        class="ti-angle-right"></i></button></span></div>
                                    </div>
                                </div>
                                <div class="product-buttons"><a href="#" class="btn btn-solid">add to cart</a> <a href="#" class="btn btn-solid">view detail</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->


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
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo1"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('index.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo43">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>game</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('game.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo44">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>gym</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('gym-product.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo45">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>tools</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('tools.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo46">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>marijuana</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('marijuana.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo47">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>metro</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('metro.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo48">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>pets</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('pets.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo49">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>video slider</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('video-slider.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo50">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>left menu</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('left_sidebar-demo.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo51">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>jewellery</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('jewellery.html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo2"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('fashion-2.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo3"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('fashion-3.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo4"></div>
                                <div class="demo-text">
                                    <h4>Shoes</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('shoes.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo5"></div>
                                <div class="demo-text">
                                    <h4>Bags</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('bags.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo6"></div>
                                <div class="demo-text">
                                    <h4>Watch</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('watch.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo7"></div>
                                <div class="demo-text">
                                    <h4>Kids</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('kids.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo8"></div>
                                <div class="demo-text">
                                    <h4>Flower</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('flower.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo9"></div>
                                <div class="demo-text">
                                    <h4>Nursery</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('nursery.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo10"></div>
                                <div class="demo-text">
                                    <h4>Vegetables</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('vegetables.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo11"></div>
                                <div class="demo-text">
                                    <h4>Beauty</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('beauty.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo12"></div>
                                <div class="demo-text">
                                    <h4>Instagram Shop</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('instagram-shop.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects effect-2">
                            <div class="set-position">
                                <div class="layout-container demo13"></div>
                                <div class="demo-text">
                                    <h4>Lookbook</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('lookbook-demo.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo14"></div>
                                <div class="demo-text">
                                    <h4>Light</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('light.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo15"></div>
                                <div class="demo-text">
                                    <h4>Full Page</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('full-page.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo16"></div>
                                <div class="demo-text">
                                    <h4>Electronic-1</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('electronic-1.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo17"></div>
                                <div class="demo-text">
                                    <h4>Electronic-2</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('electronic-2.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects effect-2">
                            <div class="set-position">
                                <div class="layout-container demo18"></div>
                                <div class="demo-text">
                                    <h4>Video</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('video.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo19"></div>
                                <div class="demo-text">
                                    <h4>Goggles</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('goggles.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo20"></div>
                                <div class="demo-text">
                                    <h4>Parallax</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('parallax.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo21"></div>
                                <div class="demo-text">
                                    <h4>Furniture</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('furniture.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h4>shop</h4>
                </div>
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo22"></div>
                                <div class="demo-text">
                                    <h4>left sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo24"></div>
                                <div class="demo-text">
                                    <h4>right sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(right).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo23"></div>
                                <div class="demo-text">
                                    <h4>no sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(no-sidebar).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo25"></div>
                                <div class="demo-text">
                                    <h4>popup</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(sidebar-popup).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo52">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>metro</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(metro).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo53">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>full width</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(full-width).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo26"></div>
                                <div class="demo-text">
                                    <h4>infinite scroll</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(infinite-scroll).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo54"></div>
                                <div class="demo-text">
                                    <h4>three grid</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(3-grid).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo55"></div>
                                <div class="demo-text">
                                    <h4>six grid</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(6-grid).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo56"></div>
                                <div class="demo-text">
                                    <h4>list view</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('category-page(list-view).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="setting-title">
                    <h4>product</h4>
                </div>
                <div class="setting-contant">
                    <div class="row demo-section">
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo40">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>four image </h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(4-image).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo33"></div>
                                <div class="demo-text">
                                    <h4>left sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page.html')" class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo36"></div>
                                <div class="demo-text">
                                    <h4>right sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(right-sidebar).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo34"></div>
                                <div class="demo-text">
                                    <h4>no sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(no-sidebar).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo41">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>bundle</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(bundle).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo42">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>image swatch</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(image-swatch).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo32"></div>
                                <div class="demo-text">
                                    <h4>left image</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(left-image).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo35"></div>
                                <div class="demo-text">
                                    <h4>right image</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(right-image).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo31">
                                    <div class="ribbon-1"><span>n</span><span>e</span><span>w</span></div>
                                </div>
                                <div class="demo-text">
                                    <h4>image outside</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(image-outside).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo27"></div>
                                <div class="demo-text">
                                    <h4>3-col left</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(3-col-left).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo28"></div>
                                <div class="demo-text">
                                    <h4>3-col right</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(3-col-right).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo29"></div>
                                <div class="demo-text">
                                    <h4>3-col bottom</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(3-column).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo37"></div>
                                <div class="demo-text">
                                    <h4>sticky</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(sticky).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo30"></div>
                                <div class="demo-text">
                                    <h4>accordian</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(accordian).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo38"></div>
                                <div class="demo-text">
                                    <h4>vertical tab</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button type="button" onClick="window.open('product-page(vertical-tab).html')" class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <a href="https://themeforest.net/item/multikart-responsive-ecommerce-html-template/22809967?s_rank=1" target="_blank" class="btn btn-block purchase_btn"><i class="fa fa-shopping-cart"
                            aria-hidden="true"></i> purchase Multikart now!</a>
                    <a href="https://themeforest.net/item/multikart-responsive-angular-ecommerce-template/22905358?s_rank=3" target="_blank" class="btn btn-block purchase_btn"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/angular.png" alt="" class="img-fluid"> Multikart Angular</a>
                    <a href="https://themeforest.net/item/multikart-responsive-react-ecommerce-template/23067773?s_rank=2" target="_blank" class="btn btn-block purchase_btn"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/react.png" alt="" class="img-fluid"> Multikart React</a>
                    <a href="https://themeforest.net/item/multikart-multipurpose-shopify-sections-theme/23093831?s_rank=1" target="_blank" class="btn btn-block purchase_btn"><img src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/images/icon/shopify.png" alt="" class="img-fluid"> Multikart Shopify</a>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->


    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>
    <!-- tap to top end -->


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

    <!-- price range js -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/price-range.js"><?php echo '</script'; ?>
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
