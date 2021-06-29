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
    <title>Dettagli premio</title>

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

    <!-- loader start -->
    <div class="loader_skeleton">
        <header>
            <div class="top-header d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact">
                                <ul>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i>Call Us: 123 - 456 - 7890</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <ul class="header-dropdown">
                                <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                </li>
                                <li class="onhover-dropdown mobile-account">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="navbar">
                                    <a href="javascript:void(0)">
                                        <div class="bar-style"><i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="brand-logo">
                                    <a href="index.html"><img src="{$path}Smarty/smarty-dir/assets/images/icon/logo.png"
                                            class="img-fluid blur-up lazyload" alt=""></a>
                                </div>
                            </div>
                            <div class="menu-right pull-right">
                                <div>
                                    <nav>
                                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                </div>
                                <div>
                                    <div class="icon-nav d-none d-sm-block">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h2>product</h2>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <nav aria-label="breadcrumb" class="theme-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">premi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader end -->


    <!-- header start -->
    <header>
        <div class="mobile-fix-option"></div>
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Benvenuti in ADC Store</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <ul class="header-dropdown">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">

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
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                        </li>
                                    </ul>
                                </div>
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
                            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
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
                                    class="img-fluid blur-up lazyload image_zoom_cls-0"></div>

                        </div>

                    </div>
                        <div class="product-right product-description-box">
                            <h2>{$nome}</h2>

                            <div class="product-icon mb-3">
                                <form class="d-inline-block">
                                    <div class="row product-accordion">
                                        <div class="col-sm-12">
                                            <div class="accordion theme-accordion" id="accordionExample">

                                                </div>
                                </form>
                            </div>
                        </div>

                            <div class="row product-accordion">
                                <div class="col-sm-12">
                                    <div class="accordion theme-accordion" id="accordionExample">


                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0"><button class="btn btn-link" type="button"
                                                        data-toggle="collapse" data-target="#collapseTwo"
                                                        aria-expanded="true" aria-controls="collapseTwo">Decrizione premio</button></h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>{$descrizione}</p>
                                                    <div class="single-product-tables detail-section">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Marca: </td>
                                                                    <td>{$marca}</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product-right product-form-box">
                            <h3>{$punti} punti</h3>

                            <form method="post" action="{$path}GestionePunti/acquistaPremio/{$id}">

                                <div class="product-description border-product">
                                
                                    <h6 class="product-title">Quantità:</h6>
                                    <div class="qty-box">

                                        <input type="number" name="quantita" class="form-control input-number" value="1" min="1" max="{$quantita}">

                                    </div>
                                
                                </div>
                                <div class="product-buttons">
                                    <button type="submit" onclick="funzione()" class="btn btn-solid">acquista</button>
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
                                    <a href="#"><img src="{$path}Smarty/smarty-dir/assets/images/icon/visa.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{$path}Smarty/smarty-dir/assets/images/icon/mastercard.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{$path}Smarty/smarty-dir/assets/images/icon/paypal.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{$path}Smarty/smarty-dir/assets/images/icon/american-express.png" alt=""></a>
                                </li>
                                <li>
                                    <a href="#"><img src="{$path}Smarty/smarty-dir/assets/images/icon/discover.png" alt=""></a>
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

        function funzione(){
            alert("Il premio verrà inviato al suo indirizzo predefinito!")
        }
    </script>
</body>

</html>