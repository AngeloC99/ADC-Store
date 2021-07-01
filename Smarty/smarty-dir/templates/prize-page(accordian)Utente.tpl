<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="ADCStore">
    <meta name="keywords" content="ADCStore">
    <meta name="author" content="ADCStore">
    <link rel="icon" href="{$path}Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="{$path}Smarty/smarty-dir/assets/images/favicon/1.png" type="image/x-icon">
    <title>ADC-Store - Dettagli premio</title>

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
                                    <li><a href="{$path}GestioneSchermate/apriProfilo">Profilo</a>

                                    </li>
                                    <li>
                                        <a href="{$path}GestionePunti/recuperaPremi">Premi</a>
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
                        <h2>dettagli premio</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{$path}GestioneSchermate/recuperaHome">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Premi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product-slick">
                            <div><img src="data:{$mime};base64,{$dati}" width="150" height="250" alt=""
                                      class="img-fluid blur-up lazyload image_zoom_cls-0">
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <h2>{$nome}</h2>
                        <h5 style="color: #5a6268">ID Premio: {$id}</h5>
                        <div class="product-icon mb-3">
                            <div class="row product-accordion">
                                <div class="col-sm-12">
                                    <br>
                                    <h5 style="color: #5a6268"><b>Marca</b>: {$marca}</h5>
                                    <h5 style="color: #5a6268"><b>Disponibili</b>: {$quantita} unità</h5>
                                    <br>
                                    <h3 style="color: #0a0100">Descrizione premio</h3>
                                    <p>{$descrizione}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right product-form-box">
                            <h3>{$punti} punti</h3>

                            <form method="post" name="dati">

                                <div class="product-description border-product">
                                
                                    <h6 class="product-title">Quantità:</h6>
                                    <div class="qty-box">
                                        <input type="number" name="quantita" class="form-control input-number" value="1" min="1" max="{$quantita}">
                                    </div>

                                    <h6 class="product-title">Indirizzo di spedizione:</h6>
                                    <div class="field-label">
                                        <select name="indirizzo">
                                            {section name=ind loop=$indirizzi}
                                                <option value="{$indirizzi[ind].identificativo}">{$indirizzi[ind].indirizzo}</option>
                                            {/section}
                                        </select>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <button type="submit" onclick="Funzione()" class="btn btn-solid">acquista</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- product-tab starts -->



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




<!-- Add to cart modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Il prodotto
                                                    <span>è stato aggiunto</span>
                                                    <span>correttamente al carrello.</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="cart.html" class="view-cart btn btn-solid">Vai al Carrello</a>
                                                <a href="order.html" class="checkout btn btn-solid">Check out</a>
                                                <a href="category-page(infinite-scroll).html" class="continue btn btn-solid">Continua lo shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="data:{$premio.mime};base64,{$premio.dati}" width="150" height="250" alt="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add to cart modal popup end-->


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

    <!-- Zoom js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/jquery.elevatezoom.js"></script>

    <!-- Theme js-->
    <script src="{$path}Smarty/smarty-dir/assets/js/script.js"></script>

    <script>
        function openSearch() {
            document.getElementById("search-overlay").style.display = "block";
        }

        function closeSearch() {
            document.getElementById("search-overlay").style.display = "none";
        }

        function Funzione() {

            var quantita = document.dati.quantita.value;

            if ( {$quantita} == 0){
                alert("Il premio non è al momento disponibile!")
            }
            
            else{

                if ( quantita == 0 ){
                    alert("Inserisci una quantità valida!")
                }

                else if ( {$puntiutente} >= {$punti} * quantita )
                {
                    alert("Il premio le verrà inviato all'indirizzo selezionato entro una settimana!");
                    document.dati.action = "{$path}GestionePunti/acquistaPremio/{$id}";
                    document.dati.submit();
                }

                else {
                    alert("Non hai punti a sufficienza!");

                }
            }
        }    
    </script>
</body>

</html>