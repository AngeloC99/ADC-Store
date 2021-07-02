<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{$path}Smarty/smarty-dir/assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{$path}Smarty/smarty-dir/assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>ADC-Store - Aggiungi Premio</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/Smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/Smarty-dir/assets/css/flag-icon.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/Smarty-dir/assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/Smarty-dir/assets/css/admin.css">
</head>
<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none">
                <div class="logo-wrapper"><a href="homeAdmin.tpl"><img class="blur-up lazyloaded" src="{$path}Smarty/smarty-dir/assets/images/dashboard/logo.png" alt=""></a></div>
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
                    <div><img class="img-60 rounded-circle blur-up lazyloaded" src="{$path}Smarty/smarty-dir/assets/images/dashboard/man.png" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">{$nomeadmin}</h6>
                    <p>Area Amministratore.</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{$path}GestioneSchermate/recuperaHome"><i data-feather="home"></i><span>Home</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Prodotti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{$path}GestioneProdotti/recuperaProdotti"><i class="fa fa-circle"></i>Lista Prodotti</a></li>
                            <li><a href="{$path}GestioneProdotti/recuperaAggiungiProdotto"><i class="fa fa-circle"></i>Aggiungi un prodotto</a></li>

                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Premi</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href={$path}GestionePunti/recuperaPremi><i class="fa fa-circle"></i>Lista Premi</a></li>
                            <li><a href="{$path}GestioneSchermate/recuperaAggiungiPremi"><i class="fa fa-circle"></i>Aggiungi un premio</a></li>

                        </ul>
                    </li>                    
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Clienti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{$path}GestioneUtenti/recuperaClienti"><i class="fa fa-circle"></i>Lista Clienti</a></li>
                        </ul>
                            </li>
                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Buoni Sconto</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{$path}GestioneBuoni/recuperaCreazioneBuono"><i class="fa fa-circle"></i>Regala Buono</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Profilo</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{$path}GestioneSchermate/apriProfilo"><i class="fa fa-circle"></i>Visita Profilo</a></li>
                        </ul>
                        <ul class="sidebar-submenu">
                            <li><a href="{$path}GestioneUtenti/logout"><i class="fa fa-circle"></i>Logout</a></li>
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
                                <li class="breadcrumb-item"><a href="{$path}GestioneSchermate/recuperaHome"><i data-feather="home"></i></a></li>
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
                                        <form name="dati" class="needs-validation add-product-form" novalidate="" enctype="multipart/form-data" method="post">
                                            <div class="form">
                                                <div class="form-group mb-3 row">
                                                    <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Seleziona immagine :</label>
                                                    <input type="file" name="file_inviato" id="fileToUpload" required="">
                                                    <div class="valid-feedback">Ok!</div>

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
                                                    <input class="form-control col-xl-8 col-sm-7" id="validationCustom02" type="number" min="1" name='punti' required="">
                                                    <div class="valid-feedback">Ok!</div>
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-sm-4 mb-0">Quantità :</label>
                                                    <fieldset class="qty-box col-xl-9 col-xl-8 col-sm-7 pl-0">
                                                        <div class="input-group">
                                                            <input class="touchspin" type="number" min="1" name='quantita' value="1" required ="">
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
                                                <button type="submit" onclick="funzione()" class="btn btn-primary">aggiungi</button>
                                                <a href="{$path}GestionePunti/recuperaAggiungiPremio" class="btn btn-light">Annulla</a>
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
                        <p class="mb-0">2020-21 Progetto di Programmazione Web</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end-->

    </div>

</div>

<!-- latest jquery-->
<script src="{$path}Smarty/smarty-dir/assets/js/jquery-3.3.1.min.js"></script>

<!-- Bootstrap js-->
<script src="{$path}Smarty/smarty-dir/assets/js/popper.min.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/bootstrap.js"></script>

<!-- feather icon js-->
<script src="{$path}Smarty/smarty-dir/assets/js/icons/feather-icon/feather.min.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="{$path}Smarty/smarty-dir/assets/js/sidebar-menu.js"></script>

<!-- touchspin js-->
<script src="{$path}Smarty/smarty-dir/assets/js/touchspin/vendors.min.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/touchspin/touchspin.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/touchspin/input-groups.min.js"></script>

<!-- form validation js-->
<script src="{$path}Smarty/smarty-dir/assets/js/dashboard/form-validation-custom.js"></script>

<!-- ckeditor js-->
<script src="{$path}Smarty/smarty-dir/assets/js/editor/ckeditor/ckeditor.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/editor/ckeditor/styles.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/editor/ckeditor/ckeditor.custom.js"></script>

<!-- Zoom js-->
<script src="{$path}Smarty/smarty-dir/assets/js/jquery.elevatezoom.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/zoom-scripts.js"></script>

<!--Customizer admin-->
<script src="{$path}Smarty/smarty-dir/assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="{$path}Smarty/smarty-dir/assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="{$path}Smarty/smarty-dir/assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="{$path}Smarty/smarty-dir/assets/js/admin-script.js"></script>


<script>
    function funzione() {
        var nomepremio = document.dati.nome.value;
        var marca = document.dati.marca.value;
        var punti = document.dati.punti.value;
        var quantita = document.dati.quantita.value;
        var imm = document.getElementById("fileToUpload");
        var nomefile = imm.value;
        if ( (nomepremio == "") || (marca == "") || (nomefile == "") || (punti == 0) || (quantita == 0) || (typeof imm == "undefined") || (typeof imm == null)){
            alert("compila bene i campi!");
        }
        else {
            alert( "Il premio è stato aggiunto correttamente!");
            document.dati.action = "{$path}GestionePunti/aggiungiPremio";
            document.dati.submit();
        }
    }
</script>

</body>
</html>
