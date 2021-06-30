<?php
/* Smarty version 3.1.39, created on 2021-06-30 12:22:13
  from 'C:\Users\david\public_html\ADC-Store\Smarty\smarty-dir\templates\regalapunti.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60dc45d56a8073_40230164',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7c15abc6cb1be80d96f3c868978ccc060a4234d' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ADC-Store\\Smarty\\smarty-dir\\templates\\regalapunti.tpl',
      1 => 1625048530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60dc45d56a8073_40230164 (Smarty_Internal_Template $_smarty_tpl) {
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

    <title>ADC Store - Regala punti</title>



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
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/apriProfilo">Profilo</a>
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
                        <h2>regala dei punti</h2>
                    </div>
                </div>               
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/recuperaHome">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">regala punti</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>regala dei punti</h3>

                    <div class="theme-card">
                        <form class="theme-form" method="post" name="dati">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">A chi vuoi regalare i punti?</label>
                                    <input type="Email" class="form-control" id="fname" placeholder="Email Del Destinatario" name="emaildest"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Quanti punti vuoi regalare?</label>
                                    <input type="number" min ="1" class="form-control" id="lname" placeholder="Inserisci I Punti - max: <?php echo $_smarty_tpl->tpl_vars['puntimax']->value;?>
" name="punti"
                                        required min="1" max="<?php echo $_smarty_tpl->tpl_vars['puntimax']->value;?>
">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">Vuoi lasciare un messaggio?</label>
                                    <input type="text" class="form-control" id="email" placeholder="Messaggio" name="Messaggio">
                                </div>
                                <button type="submit" onclick="funzione()" class="btn btn-solid">invia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->


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

        function funzione(){
            var email = document.dati.emaildest.value;
            var punti = document.dati.punti.value;
            var bool = false;



           /* for ( var key in <?php echo $_smarty_tpl->tpl_vars['utenti']->value;?>
){
                if ( email == <?php echo $_smarty_tpl->tpl_vars['utenti']->value;?>
[key] ){
                    bool = true;
                }
            }*/

            if ( <?php echo $_smarty_tpl->tpl_vars['puntimax']->value;?>
 == 0) {
                alert("Non hai punti a sufficienza!")

            }

            else if ( (email == "") || (email == "undefined") || !(email.includes("@"))){
                alert( "Inserisci un destinatario valido")

            }

            else if ( (punti == 0) || (punti > <?php echo $_smarty_tpl->tpl_vars['puntimax']->value;?>
)){

                alert("Inserisci una quantità di punti valida!");
            }

            else {
                alert("I punti sono stati inviati correttamente!");
                document.dati.action = "<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestionePunti/regalarePunti";
                document.dati.submit();
            }
        }
 
        

    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
