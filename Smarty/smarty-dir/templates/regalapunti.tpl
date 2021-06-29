<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{$path}Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="{$path}Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon">

    <title>ADC Store - Regala punti</title>



    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/fontawesome.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/slick-theme.css">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/animate.css">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/themify-icons.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/color1.css" media="screen" id="color">

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
                        <a href="{$path}GestioneSchermate/recuperaHome"> <img src="{$path}Smarty/smarty-dir/assets/images/icon/logo.png"
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
                                        <a href="{$path}GestioneSchermate/recuperaHome">Home</a>
                                    </li>
                                    <li>
                                        <a href="{$path}GestioneProdotti/recuperaProdotti">Prodotti</a>
                                    </li>
                                    <li>
                                        <a href="{$path}GestionePunti/recuperaPremi">Premi</a>
                                    </li>
                                    <li><a href="">Account</a>
                                        <ul>
                                            <li><a href="{$path}GestioneSchermate/apriProfilo" data-lng="en">Il mio profilo ADC-Store</a></li>
                                            <li><a href="{$path}GestioneSchermate/recuperaGestioneCarrello" data-lng="en">Carrello della spesa</a></li>
                                            <li><a href="{$path}GestioneUtenti/logout" data-lng="en">Logout</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{$path}GestioneSchermate/chiSiamo">Chi siamo</a>
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
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2"
                                                    aria-hidden="true"></i></div>
                                            <a href="{$path}GestioneSchermate/recuperaHomeAdmin">Home</a>
                                        </li>
                                        <li>
                                            <a href="{$path}GestioneSchermate/apriProfilo">profilo</a>
                                        </li>
                                        <li>
                                            <a href="{$path}GestioneProdotti/recuperaProdotti">prodotti</a>
                                        </li>
                                        <li ><a href="{$path}GestionePunti/recuperaPremi">premi</a>
                                        <li >    
                                    </ul>                
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{$path}GestioneSchermate/recuperaHome">Home</a></li>
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
                                    <input type="number" min ="1" class="form-control" id="lname" placeholder="Inserisci I Punti - max: {$puntimax}" name="punti"
                                        required min="1" max="{$puntimax}">
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


                    <div class="col">
                        <div style="padding: 50" class="sub-title">
                            <div class="footer-title">
                                <h4>Informazioni store</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>ADC Store, Avezzano(AQ)
                                    </li>
                                    <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                    <li><i class="fa fa-envelope-o"></i>Email Us: adcstore2021@gmail.com</li>
                                    <li><i class="fa fa-fax"></i>Fax: 123456</li>
                                </ul>
                            </div>

                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{$path}Smarty/smarty-dir/assets/images/icon/logo.png" alt=""></div>
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
                                <li><a href="{$path}GestioneSchermate/apriProfilo">Il tuo profilo</a></li>
                                <li><a href="{$path}GestioneCarrello/recuperaCarrello">Il tuo carrello ADC-Store</a></li>
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
                                    <a href="{$path}GestioneSchermate/chiSiamo">Chi siamo</a>
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
                                <a href=""><img src="{$path}Smarty/smarty-dir/assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{$path}Smarty/smarty-dir/assets/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{$path}Smarty/smarty-dir/assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{$path}Smarty/smarty-dir/assets/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href=""><img src="{$path}Smarty/smarty-dir/assets/images/icon/discover.png" alt=""></a>
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
    <script src="{$path}Smarty/smarty-dir/assets/js/jquery-3.3.1.min.js"></script>

    <!-- menu js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/menu.js"></script>

    <!-- lazyload js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/lazysizes.min.js"></script>

    <!-- popper js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/popper.min.js"></script>

    <!-- slick js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/slick.js"></script>

    <!-- Bootstrap js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/bootstrap.js"></script>

    <!-- Bootstrap Notification js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/bootstrap-notify.min.js"></script>

    <!-- Theme js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/script.js"></script>

    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }

        function funzione() {
            var email = document.dati.emaildest.value;
            var punti = document.dati.punti.value;            
            if ( {$puntimax} == 0) {
                alert("Non hai punti a sufficienza!")

            }    

            else if ( (email == "") || (email == "undefined")){
                alert( "Inserisci un destinatario valido")
                
            }

            else if ( (punti == 0) || (punti > {$puntimax})){

                alert("Inserisci una quantità di punti valida!");
            }

            else { 
                alert("I punti sono stati inviati correttamente!");
                document.dati.action = "{$path}GestionePunti/regalarePunti";
                document.dati.submit();
            }    



        } 
        

    </script>
</body>

</html>