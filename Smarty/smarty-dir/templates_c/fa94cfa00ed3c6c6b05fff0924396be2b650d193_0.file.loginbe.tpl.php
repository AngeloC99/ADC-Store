<?php
/* Smarty version 3.1.39, created on 2021-06-30 00:13:28
  from 'C:\Users\david\public_html\ADC-Store\Smarty\smarty-dir\templates\loginbe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60db9b081dbc19_17985602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa94cfa00ed3c6c6b05fff0924396be2b650d193' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ADC-Store\\Smarty\\smarty-dir\\templates\\loginbe.tpl',
      1 => 1624997048,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60db9b081dbc19_17985602 (Smarty_Internal_Template $_smarty_tpl) {
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
    <title>ADC Store - Login Admin</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/themify.css">

    <!-- slick icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/css/slick-theme.css">

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
    <div class="authentication-box">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-0 card-left">
                    <div class="card bg-primary">
                        <div class="svg-icon">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 viewBox="0 0 468.52 468.52" style="enable-background:new 0 0 468.52 468.52;" xml:space="preserve">
<g>
	<path style="fill:#E6E6E6;" d="M468.52,102.595v251.88c0,11.14-7.571,20.52-17.86,23.25c-1.98,0.531-4.06,0.81-6.2,0.81H38.58
		c-13.29,0-24.061-10.77-24.061-24.06v-251.88c0-13.29,10.771-24.06,24.061-24.06h405.88c2.14,0,4.22,0.28,6.2,0.81
		C460.949,82.075,468.52,91.455,468.52,102.595"/>
    <path style="fill:#B3B3B3;" d="M468.518,102.591v23.94h-454v-23.94c0-13.29,10.771-24.06,24.06-24.06h405.88
		C457.747,78.532,468.518,89.302,468.518,102.591"/>
    <rect x="42.099" y="141.002" style="fill:#999999;" width="118.901" height="16.532"/>
    <polyline style="fill:#FFFFFF;" points="442.383,222.765 256.652,222.765 256.652,354.496 442.383,354.496 442.383,222.765 	"/>
    <polyline style="fill:#13c9ca;" points="434.552,329.733 265.552,329.733 265.552,346.265 434.552,346.265 434.552,329.733 	"/>
    <polyline style="fill:#a5a5a5;" points="286.552,297.744 265.552,297.744 265.552,314.276 286.552,314.276 286.552,297.744 	"/>
    <polyline style="fill:#ffbc58;" points="350.552,265.754 265.552,265.754 265.552,282.286 350.552,282.286 350.552,265.754 	"/>
    <polyline style="fill:#999999;" points="411.552,233.765 265.552,233.765 265.552,250.297 411.552,250.297 411.552,233.765 	"/>
    <circle style="fill:#a5a5a5;" cx="47.517" cy="102.532" r="15"/>
    <circle style="fill:#ffbc58;" cx="87.517" cy="102.532" r="15"/>
    <path style="fill:#EEEEEE;" d="M463.696,88.139c3.027,4.024,4.822,9.029,4.822,14.453v23.94h-23.321
		c0.04,35.899-19.42,70.584-53.444,88.347c-2.102,0.921-4.223,1.779-6.365,2.574l2.774,5.313h54.222v131.731H298.563l7.326,24.038
		h138.57c2.14,0,4.22-0.28,6.2-0.81c10.29-2.73,17.86-12.11,17.86-23.25v-251.88C468.52,97.17,466.725,92.164,463.696,88.139
		 M463.657,88.088c0.012,0.016,0.023,0.031,0.036,0.047C463.681,88.12,463.669,88.103,463.657,88.088 M463.621,88.04
		c0.008,0.01,0.015,0.02,0.023,0.03C463.636,88.06,463.629,88.05,463.621,88.04 M463.59,87.999c0.003,0.004,0.006,0.008,0.009,0.012
		C463.596,88.007,463.593,88.003,463.59,87.999"/>
    <path style="fill:#CBCBCB;" d="M444.46,78.535h-11.739c0.396,0.716,0.784,1.437,1.165,2.167c7.655,14.662,11.293,30.36,11.31,45.83
		h23.321v-23.94c0-5.424-1.795-10.429-4.822-14.453l0,0c-0.001-0.001-0.002-0.002-0.003-0.003l0,0
		c-0.012-0.016-0.023-0.031-0.036-0.047l0,0c-0.005-0.006-0.009-0.012-0.014-0.018l0,0c-0.008-0.01-0.015-0.02-0.023-0.03l0,0
		c-0.007-0.01-0.014-0.019-0.022-0.029l0,0c-0.003-0.004-0.006-0.008-0.009-0.012l0,0c-3.187-4.171-7.708-7.269-12.93-8.654
		C448.68,78.815,446.6,78.535,444.46,78.535"/>
    <path style="fill:#FFFFFF;" d="M442.383,222.765h-54.222l5.326,10.202c-0.519,0.271-1.04,0.537-1.561,0.798h19.626v16.532H266.807
		l4.711,15.457h79.034v16.532h-73.996l4.711,15.458h5.285v16.532h-0.246l4.711,15.457h143.536v16.532H296.055l2.509,8.231h143.819
		V222.765"/>
    <polyline style="fill:#6EC6EB;" points="434.552,329.733 291.016,329.733 296.055,346.265 434.552,346.265 434.552,329.733 	"/>
    <polyline style="fill:#FDA589;" points="286.552,297.744 281.267,297.744 286.306,314.276 286.552,314.276 286.552,297.744 	"/>
    <polyline style="fill:#FBE98E;" points="350.552,265.754 271.518,265.754 276.556,282.286 350.552,282.286 350.552,265.754 	"/>
    <path style="fill:#EEEEEE;" d="M246.265,126.531h-17.178l29.329,96.234h62.908c-1.465-0.282-2.926-0.591-4.384-0.929l-1.001-0.232
		c-24.282-7.625-45.651-24.51-58.362-48.855C249.857,157.962,246.221,142.128,246.265,126.531"/>
    <path style="fill:#CBCBCB;" d="M258.73,78.535h-44.27l14.628,47.996h17.178c0.028-10.08,1.594-20.062,4.587-29.594
		C252.852,90.569,255.489,84.4,258.73,78.535"/>
    <path style="fill:#FFFFFF;" d="M321.324,222.765h-62.908l7.136,23.415v-12.415h53.983l3.362-10.708
		C322.373,222.963,321.848,222.866,321.324,222.765"/>
    <path style="fill:#BABABA;" d="M411.552,233.765h-19.626c-14.25,7.129-29.421,10.514-44.383,10.514
		c-10.173,0-20.251-1.566-29.869-4.586l1.861-5.928h-53.983v12.415l1.255,4.117h144.745V233.765"/>
    <path style="fill:#CECECE;" d="M385.387,217.453c-6.196,2.3-12.551,4.073-18.994,5.313h21.767L385.387,217.453"/>
    <path style="fill:#DBDBDB;" d="M388.161,222.765h-21.767c-7.428,1.428-14.973,2.147-22.536,2.147
		c-6.999,0-14.015-0.616-20.959-1.855l-3.362,10.708h72.391c0.521-0.261,1.042-0.527,1.561-0.798L388.161,222.765"/>
    <path style="fill:#A4A4A4;" d="M391.926,233.765h-72.391l-1.861,5.928c9.618,3.02,19.696,4.586,29.869,4.586
		C362.505,244.279,377.677,240.894,391.926,233.765"/>
    <path style="fill:#DBDBDB;" d="M345.64,27.261c-15.507,0-31.24,3.637-45.936,11.309c-17.955,9.374-31.855,23.466-40.973,39.961
		h173.987c-12.828-23.18-33.641-39.288-57.199-46.682C365.898,28.829,355.817,27.261,345.64,27.261"/>
    <polyline style="fill:#9F9F9F;" points="432.719,78.532 258.732,78.532 258.73,78.535 432.721,78.535 432.719,78.532 	"/>
    <path style="fill:#CECECE;" d="M445.196,126.531H246.265c-0.044,15.597,3.592,31.43,11.312,46.218
		c12.711,24.345,34.08,41.23,58.362,48.855l1.001,0.232c1.458,0.338,2.919,0.647,4.384,0.929h45.069
		c6.443-1.239,12.797-3.012,18.994-5.313c2.142-0.795,4.263-1.653,6.365-2.574C425.776,197.115,445.237,162.431,445.196,126.531"/>
    <path style="fill:#B2B2B2;" d="M432.721,78.535H258.73c-3.241,5.865-5.878,12.033-7.878,18.402
		c-2.993,9.532-4.559,19.515-4.587,29.594h198.931c-0.017-15.469-3.656-31.168-11.31-45.83
		C433.505,79.972,433.117,79.251,432.721,78.535"/>
    <path style="fill:#DBDBDB;" d="M366.393,222.765h-45.069c0.524,0.101,1.049,0.198,1.574,0.292
		c6.945,1.239,13.96,1.855,20.959,1.855C351.42,224.912,358.965,224.193,366.393,222.765"/>
    <path style="fill:#ffbc58;" d="M345.73,113.225l-5.24,16.69l-24.55,78.18c-24.28-7.62-45.65-24.51-58.36-48.85
		c-12.71-24.35-14.35-51.53-6.73-75.81l83.46,26.2L345.73,113.225z"/>
    <path style="fill:#13c9ca;" d="M393.49,219.465c-7.48,3.9-15.23,6.76-23.08,8.63c-17.7,4.21-35.91,3.38-52.74-1.91l26.47-84.29
		l3.32-10.59L393.49,219.465z"/>
    <path style="fill:#a5a5a5;" d="M391.75,201.375l-46.02-88.15l-11.42-3.59l-83.46-26.2c7.63-24.29,24.51-45.66,48.85-58.37
		c2.55-1.33,5.12-2.54,7.73-3.62c22.27-9.33,46.35-9.93,68.09-3.1c24.29,7.62,45.66,24.5,58.37,48.85
		C459.3,115.885,440.44,175.955,391.75,201.375z"/>
    <polyline style="fill:#FFFFFF;" points="226.383,168.765 40.652,168.765 40.652,354.496 226.383,354.496 226.383,168.765 	"/>
    <polyline style="fill:#2BE0C6;" points="93.6,254.001 57.602,254.001 57.602,343.996 93.6,343.996 93.6,254.001 	"/>
    <polyline style="fill:#ffbc58;" points="151.517,224.002 115.518,224.002 115.518,343.996 151.517,343.996 151.517,224.002 	"/>
    <polyline style="fill:#a5a5a5;" points="209.432,191.004 173.435,191.004 173.435,343.996 209.432,343.996 209.432,191.004 	"/>
    <polyline style="fill:#13c9ca;" points="242.83,325.765 242.83,454.765 0,454.765 0,325.765 242.83,325.765 	"/>
    <polyline style="fill:#F2F2F2;" points="15,439.765 15,340.765 227.826,340.765 227.826,439.765 15,439.765 	"/>
    <polyline style="fill:#a5a5a5;" points="108.064,430.978 87.408,408.6 78.664,420.466 71.9,415.483 86.68,395.426 106.349,416.734
		137.239,360.959 160.785,398.8 188.393,349.552 195.722,353.66 161.162,415.307 137.661,377.538 108.064,430.978 	"/>
    <rect x="26" y="357.765" style="fill:#999999;" width="27" height="11"/>
    <rect x="26" y="384.765" style="fill:#999999;" width="27" height="11"/>
    <rect x="26" y="411.765" style="fill:#999999;" width="27" height="11"/>
    <polyline style="fill:#6EC6EB;" points="242.83,325.765 209.432,325.765 173.435,325.765 151.517,325.765 115.518,325.765
		93.6,325.765 92.88,325.765 97.451,340.765 227.826,340.765 227.826,439.765 127.619,439.765 132.19,454.765 242.83,454.765
		242.83,325.765 	"/>
    <polyline style="fill:#F6F6F6;" points="227.826,340.765 97.451,340.765 115.542,400.135 137.239,360.959 160.785,398.8
		188.393,349.552 195.722,353.66 161.162,415.307 137.661,377.538 118.951,411.32 127.619,439.765 227.826,439.765 227.826,340.765
			"/>
    <polyline style="fill:#FDA589;" points="188.393,349.552 160.785,398.8 137.239,360.959 115.542,400.135 118.951,411.32
		137.661,377.538 161.162,415.307 195.722,353.66 188.393,349.552 	"/>
    <path style="fill:#CCCCCC;" d="M393.695,417.909l8.485-20.662l25.251,25.251c1.464,1.464,3.387,2.199,5.303,2.192
		c1.923,0,3.84-0.728,5.303-2.192c2.934-2.934,2.927-7.679,0-10.607l-25.251-25.251l20.669-8.492l-78.559-38.792L393.695,417.909z"
    />
    <path style="fill:#808080;" d="M393.695,417.909l8.485-20.662l25.251,25.251c1.464,1.464,3.387,2.199,5.303,2.192
		c1.923,0,3.84-0.728,5.303-2.192l-83.142-83.142L393.695,417.909z"/>
</g>
</svg>
                        </div>

                        <div class="single-item">
                            <div>
                                <div>
                                    <h3>Bentornato/a in ADC Store</h3>
                                    <p>Benvenuti nel portale d'accesso per l'area riservata ai soli amministratori. Se sei un amministratore accedi inserendo le tue credenziali, altrimenti torna alla Home.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7 p-0 card-right">
                    <div class="card tab2-card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="top-profile-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><span class="icon-user mr-2"></span>Login</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="top-tabContent">
                                <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                                    <form class="form-horizontal auth-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneUtenti/loginAdmin">
                                        <div class="form-group">
                                            <input required="" name="email" type="email" class="form-control" placeholder="Email" id="exampleInputEmail1">
                                        </div>
                                        <div class="form-group">
                                            <input required="" name="password" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-button">
                                            <button class="btn btn-primary" type="submit">Accedi</button>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                                    <form class="form-horizontal auth-form">
                                        <div class="form-group">
                                            <input required="" name="login[username]" type="email" class="form-control" placeholder="Email" id="exampleInputEmail12">
                                        </div>
                                        <div class="form-group">
                                            <input required="" name="login[password]" type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input required="" name="login[password]" type="password" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-terms">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                                <label class="custom-control-label" for="customControlAutosizing1"><span>I agree all statements in <a href=""  class="pull-right">Terms &amp; Conditions</a></span></label>
                                            </div>
                                        </div>
                                        <div class="form-button">
                                            <button class="btn btn-primary" type="submit">Register</button>
                                        </div>
                                        <div class="form-footer">
                                            <span>Or Sign up with social platforms</span>
                                            <ul class="social">
                                                <li><a class="icon-facebook" href=""></a></li>
                                                <li><a class="icon-twitter" href=""></a></li>
                                                <li><a class="icon-instagram" href=""></a></li>
                                                <li><a class="icon-pinterest" href=""></a></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
GestioneSchermate/showHome" class="btn btn-primary back-btn"><i data-feather="arrow-left"></i>Torna alla Home</a>
        </div>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/slick.js"><?php echo '</script'; ?>
>

<!-- Jsgrid js-->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jsgrid/jsgrid.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jsgrid/griddata-invoice.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
Smarty/smarty-dir/assets/js/jsgrid/jsgrid-invoice.js"><?php echo '</script'; ?>
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
<?php echo '<script'; ?>
>
    $('.single-item').slick({
            arrows: false,
            dots: true
        }
    );
<?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
