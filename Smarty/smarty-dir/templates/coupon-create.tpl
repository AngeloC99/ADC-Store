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
    <title>ADC-Store - Crea Buono</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/flag-icon.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/jsgrid.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{$path}Smarty/smarty-dir/assets/css/admin.css">
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
                    <h6 class="mt-3 f-14">{$nome}</h6>
                    <p>Area Amministratore</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="{$path}GestioneSchermate/recuperaHome"><i data-feather="home"></i><span>Home</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Prodotti</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{$path}GestioneProdotti/recuperaProdotti"><i class="fa fa-circle"></i>Lista Prodotti</a></li>
                            <li><a href="{$path}GestioneProdotti/recuperaAggiungiProdotto"><i class="fa fa-circle"></i>Aggiungi Prodotto</a></li>

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
                                <h3>Crea Buono
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{$path}GestioneSchermate/recuperaHome"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Buoni Sconto </li>
                                <li class="breadcrumb-item active">Crea Buono</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>Dettagli Buono Sconto</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                        </ul>
                        <form class="needs-validation" action="{$path}GestioneBuoni/inviaBuono" method="post">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Codice :</label>
                                                <input class="form-control col-md-7" id="cod" type="text" value="" name="codice" readonly="readonly" required>
                                                <input type="button"
                                                       name="genera"
                                                       id="genCod"
                                                       value="Genera codice"
                                                       onclick="Funzione2()"/>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Email destinatario :</label>
                                                <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="email" name='email' required="">
                                                <div class="valid-feedback">Ok!</div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Ammontare :</label>
                                                <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="number" name='ammontare' required="" min="1">
                                                <div class="valid-feedback">Ok!</div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label for="validationCustom01" class="col-xl-3 col-sm-4 mb-0">Tipo di importo :</label>
                                                <select class="form-control col-xl-8 col-sm-7" required name="percentuale">
                                                    <option>Percentuale</option>
                                                    <option>Assoluto</option>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-md-4">Messaggio(opzionale) : </label>
                                                <input class="form-control col-xl-8 col-sm-7" id="validationCustom01" type="text" name="messaggio" placeholder="Lascia qui il tuo messaggio...">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary" href="{$path}GestioneBuoni/recuperaCreazioneBuono" >INVIA</button>
                            </div>
                        </form>
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

<!-- Jsgrid js-->
<script src="{$path}Smarty/smarty-dir/assets/js/jsgrid/jsgrid.min.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/jsgrid/griddata-users.js"></script>
<script src="{$path}Smarty/smarty-dir/assets/js/jsgrid/jsgrid-users.js"></script>

<!--Customizer admin-->
<script src="{$path}Smarty/smarty-dir/assets/js/admin-customizer.js"></script>

<!-- lazyload js-->
<script src="{$path}Smarty/smarty-dir/assets/js/lazysizes.min.js"></script>

<!--right sidebar js-->
<script src="{$path}Smarty/smarty-dir/assets/js/chat-menu.js"></script>

<!--script admin-->
<script src="{$path}Smarty/smarty-dir/assets/js/admin-script.js"></script>

<!--function genera per il codice del buono-->
<script>
    function Funzione2(){
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
        var string_length = 13;
        var randomstring = '';
        for (var x=0;x<string_length;x++) {
            var letterOrNumber = Math.floor(Math.random() * 2);
            if (letterOrNumber == 0) {
                var newNum = Math.floor(Math.random() * 9);
                randomstring += newNum;
            } else {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum,rnum+1);
            }

        }
        document.getElementById("cod").value='BS'+randomstring;
    }
</script>

<script>
    function Funzione1() {
        alert("Inoltro del buono in corso, premere ok per proseguire...");
    }
</script>

</body>
</html>







