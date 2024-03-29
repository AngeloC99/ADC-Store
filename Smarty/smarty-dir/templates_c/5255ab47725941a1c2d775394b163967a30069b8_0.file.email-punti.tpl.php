<?php
/* Smarty version 3.1.39, created on 2021-06-25 10:35:59
  from 'C:\Users\david\public_html\ProgettoEsame\Smarty\smarty-dir\templates\email-punti.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60d5956f5faa09_74732376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5255ab47725941a1c2d775394b163967a30069b8' => 
    array (
      0 => 'C:\\Users\\david\\public_html\\ProgettoEsame\\Smarty\\smarty-dir\\templates\\email-punti.tpl',
      1 => 1624609079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60d5956f5faa09_74732376 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>Multikart | Email template </title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <style type="text/css">
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Lato', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        h5 {
            margin: 10px;
            color: #777;
        }

        .text-center {
            text-align: center
        }

        .main-bg-light {
            background-color: #fafafa;
        }

        .title {
            color: #444444;
            font-size: 22px;
            font-weight: bold;
            margin-top: 0px;
            margin-bottom: 10px;
            padding-bottom: 0;
            text-transform: uppercase;
            display: inline-block;
            line-height: 1;
        }

        .menu {
            width: 100%;
        }

        .menu li a {
            text-transform: capitalize;
            color: #444;
            font-size: 16px;
            margin-right: 15px
        }

        .main-logo {
            width: 180px;
            padding: 10px 20px;
            margin-bottom: -5px;
        }

        .product-box .product {
            text-align: center;
            position: relative;
        }

        .product-info {
            margin-top: 15px;
        }

        .product-info h6 {
            line-height: 1;
            margin-bottom: 0;
            padding-bottom: 5px;
            font-size: 14px;
            font-family: "Open Sans", sans-serif;
            color: #777;
            margin-top: 0;
        }

        .product-info h4 {
            font-size: 16px;
            color: #444;
            font-weight: 700;
            margin-bottom: 0;
            margin-top: 5px;
            padding-bottom: 5px;
            line-height: 1;
        }

        .footer-social-icon tr td img {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>

<body style="margin: 20px auto;">
    <table align="center" border="0" cellpadding="0" cellspacing="0"
        style="background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr class="header">
                            <td align="left" valign="top">
                                <img src="../assets/images/email-temp/logo.png" class="main-logo">
                            </td>
                 
                        </tr>
                    </table>
                  
                </td>
                <th width="60%" style="background-color: #ff9933;padding: 30px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td class="h2-white left pb20"
                                style="color:#ffffff; font-family: 'Roboto', sans-serif; font-size:52px; line-height:50px; text-transform:uppercase; font-weight:bold; text-align:left; padding-bottom:20px;">
                                hai ricevuto dei punti <br> in regalo!</td>
                        </tr>

                    </table>
                </th>
            </tr>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:30px;">
        <thead>
            <tr>
                <h4 class="title" style="width: 100%; text-align:center;margin-top: 50px;">L'utente:</h4>
                <p style="font-size:23px; margin:5"><?php echo $_smarty_tpl->tpl_vars['nome']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['cognome']->value;?>
  </p>
                <p style="font-size:18px; margin:5;">ti ha regalato </p>
                <p style="font-size:26px; margin:5;"><?php echo $_smarty_tpl->tpl_vars['punti']->value;?>
 punti! </p>
                <p style="font-size:18px; margin:5;" ><?php echo $_smarty_tpl->tpl_vars['messaggio']->value;?>
 </p>

            </tr>
        </thead>
    </table>

   
    <table class="main-bg-light text-center" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="margin-top:30px;">
        <tr>
            <td style="padding: 30px;">
                <div>
                    <h4 class="title" style="margin:0"></h4>
                </div>
                <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon" align="center"
                    class="text-center" style="margin-top:20px;">
                    <tr>
                        <td>
                            <a href="#"><img src="../assets/images/email-temp/facebook.png" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="../assets/images/email-temp/youtube.png" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="../assets/images/email-temp/twitter.png" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="../assets/images/email-temp/gplus.png" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="../assets/images/email-temp/linkedin.png" alt=""></a>
                        </td>
                        <td>
                            <a href="#"><img src="../assets/images/email-temp/pinterest.png" alt=""></a>
                        </td>
                    </tr>
                </table>

                 <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                    <tr>
                        <td>
                            <a href="#" style="font-size:13px">Visita il sito www.adcstore.it (quando sarà pronto!)</a>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>

    </td>
    </tr>
    </tbody>
    </table>
</body>

</html><?php }
}
