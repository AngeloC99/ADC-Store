<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>Multikart - Premium Admin Template</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="../ProgettoEsame/Smarty/smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../ProgettoEsame/Smarty/smarty-dir/assets/css/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../ProgettoEsame/Smarty/smarty-dir/assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../ProgettoEsame/Smarty/smarty-dir/assets/css/admin.css">
</head>
<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"><a href="index.html"></a></div>
            </div>
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                    
                    
                    <li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i></a></li>
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="../ProgettoEsame/Smarty/smarty-dir/assets/images/dashboard/man.png" alt="header-user">
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li><a href="profilebe.html"><i data-feather="user"></i>Profilo</a></li>
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
                <div class="logo-wrapper"><a href="home.html"></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle blur-up lazyloaded" src="../ProgettoEsame/Smarty/smarty-dir/assets/images/dashboard/man.png" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">Bentornato {$nome}</h6>
                    <p>Area Amministratore</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="home.html"><i data-feather="home"></i><span>Home</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Prodotti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="category-page(infinite-scroll).tpl"><i class="fa fa-circle"></i>
                                    <span>Lista prodotti</span> <i class="fa fa-angle-right pull-right"></i>
                                </a>
                            
                            </li>
                            <li>
                                <a href="add-product.tpl"><i class="fa fa-circle"></i>
                                    <span>Aggiungi prodotto</span> <i class="fa fa-angle-right pull-right"></i>
                                </a>
                            
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
                                <h3>Aggiungi Prodotto
                                    <small>area amministratore</small>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="home.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Prodotti</li>
                                <li class="breadcrumb-item active">Aggiungi prodotto</li>
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
                                <h5>Aggiungi prodotto</h5>
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
                                        <form class="needs-validation add-product-form" novalidate="" name="upload" enctype="multipart/form-data" method="post" action="MainControl.php">
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Seleziona immagine :</label>
                                                    <input type="file" name="file_inviato" id="fileToUpload">
                                                    <input type="submit" value="Upload" name="carica">
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Nome prodotto :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" name='nome' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Marca :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" name='marca' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom02" class="col-xl-3 col-sm-4 mb-0">Prezzo (in €) :</label>
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" type="text" name='prezzo' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group row">
                                                    <label for="exampleFormControlSelect1" class="col-xl-3 col-sm-4 mb-0">Tipologia :</label>
                                                    <select class="form-control digits col-xl-8 col-sm-7" id="exampleFormControlSelect1" name='tipologia'>
                                                        <option>Carne</option>
                                                        <option>Pesce</option>
                                                        <option>Verdura</option>
                                                        <option>Uova latte e latticini</option>
                                                        <option>Salumi e formaggi</option>
                                                        <option>Frutta</option>
                                                        <option>Pane</option>
                                                        <option>Bevande</option>
                                                        <option>Gelati e surgelati</option>
                                                        <option>Cura della persona</option>
                                                        <option>Cura della casa</option>
                                                    </select>
                                                </div>
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
                                                        <textarea name="des"> </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offset-xl-3 offset-sm-4">
                                                <button type="submit" class="btn btn-primary" href="#" onclick="Funzione1()">Aggiungi</button>
                                                <a href="#" class="btn btn-light">Annulla</a>
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
<script src="../assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="../assets/js/icons/feather-icon/feather.min.js"></script>
<script src="../assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="../assets/js/sidebar-menu.js"></script>

<!-- touchspin js-->
<script src="../assets/js/touchspin/vendors.min.js"></script>
<script src="../assets/js/touchspin/touchspin.js"></script>
<script src="../assets/js/touchspin/input-groups.min.js"></script>

<!-- form validation js-->
<script src="../assets/js/dashboard/form-validation-custom.js"></script>

<!-- ckeditor js-->
<script src="../assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="../assets/js/editor/ckeditor/styles.js"></script>
<script src="../assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="../assets/js/editor/ckeditor/ckeditor.custom.js"></script>

<!-- Zoom js-->
<script src="../assets/js/jquery.elevatezoom.js"></script>
<script src="../assets/js/zoom-scripts.js"></script>

<!--Customizer admin-->
<script src="../assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="../assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="../assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="../assets/js/admin-script.js"></script>


<script>
    function Funzione1() {
        alert("Il prodotto è stato inserito correttamente.");
    }
</script>

</body>
</html>