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
    <title>ADC Store - Carrelli Preferiti</title>

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
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Benvenuto in ADC Store!</li>
                                <li><i class="fa fa-phone" aria-hidden="true"></i>Contattaci: 123 - 4567890</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account">
                                <i class="fa fa-user" aria-hidden="true"></i> My Account
                                <ul class="onhover-show-div">
                                    <li>
                                        <a href="#" data-lng="en">
                                            Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-lng="es">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
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
                                <a href="javascript:void(0)" onclick="openNav()">
                                    <div class="bar-style"> <i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div id="mySidenav" class="sidenav">
                                    <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                    <nav>
                                        <div onclick="closeNav()">
                                            <div class="sidebar-back text-left">
                                                <i class="fa fa-angle-left pr-2" aria-hidden="true"></i> Back
                                            </div>
                                        </div>
                                        <!-- Vertical Menu -->
                                        <ul id="sub-menu" class="sm pixelstrap sm-vertical ">
                                            <li><a href="#">clothing</a>
                                                <ul class="mega-menu clothing-menu">
                                                    <li>
                                                        <div class="row m-0">
                                                            <div class="col-xl-4">
                                                                <div class="link-section">
                                                                    <h5>women's fashion</h5>
                                                                    <ul>
                                                                        <li><a href="#">dresses</a></li>
                                                                        <li><a href="#">skirts</a></li>
                                                                        <li><a href="#">westarn wear</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                        <li><a href="#">sport wear</a></li>
                                                                    </ul>
                                                                    <h5>men's fashion</h5>
                                                                    <ul>
                                                                        <li><a href="#">sports wear</a></li>
                                                                        <li><a href="#">western wear</a></li>
                                                                        <li><a href="#">ethic wear</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <div class="link-section">
                                                                    <h5>accessories</h5>
                                                                    <ul>
                                                                        <li><a href="#">fashion jewellery</a></li>
                                                                        <li><a href="#">caps and hats</a></li>
                                                                        <li><a href="#">precious jewellery</a></li>
                                                                        <li><a href="#">necklaces</a></li>
                                                                        <li><a href="#">earrings</a></li>
                                                                        <li><a href="#">wrist wear</a></li>
                                                                        <li><a href="#">ties</a></li>
                                                                        <li><a href="#">cufflinks</a></li>
                                                                        <li><a href="#">pockets squares</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <a href="#" class="mega-menu-banner"><img
                                                                        src="{$path}Smarty/smarty-dir/assets/images/mega-menu/fashion.jpg"
                                                                        alt="" class="img-fluid blur-up lazyload"></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">bags</a>
                                                <ul>
                                                    <li><a href="#">shopper bags</a></li>
                                                    <li><a href="#">laptop bags</a></li>
                                                    <li><a href="#">clutches</a></li>
                                                    <li><a href="#">purses</a>
                                                        <ul>
                                                            <li><a href="#">purses</a></li>
                                                            <li><a href="#">wallets</a></li>
                                                            <li><a href="#">leathers</a></li>
                                                            <li><a href="#">satchels</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">footwear</a>
                                                <ul>
                                                    <li><a href="#">sport shoes</a></li>
                                                    <li><a href="#">formal shoes</a></li>
                                                    <li><a href="#">casual shoes</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">watches</a>
                                            </li>
                                            <li><a href="#">Accessories</a>
                                                <ul>
                                                    <li><a href="#">fashion jewellery</a></li>
                                                    <li><a href="#">caps and hats</a></li>
                                                    <li><a href="#">precious jewellery</a></li>
                                                    <li><a href="#">more..</a>
                                                        <ul>
                                                            <li><a href="#">necklaces</a></li>
                                                            <li><a href="#">earrings</a></li>
                                                            <li><a href="#">wrist wear</a></li>
                                                            <li><a href="#">accessories</a>
                                                                <ul>
                                                                    <li><a href="#">ties</a></li>
                                                                    <li><a href="#">cufflinks</a></li>
                                                                    <li><a href="#">pockets squares</a></li>
                                                                    <li><a href="#">helmets</a></li>
                                                                    <li><a href="#">scarves</a></li>
                                                                    <li><a href="#">more...</a>
                                                                        <ul>
                                                                            <li><a href="#">accessory gift sets</a></li>
                                                                            <li><a href="#">travel accessories</a></li>
                                                                            <li><a href="#">phone cases</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#">belts & more</a></li>
                                                            <li><a href="#">wearable</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">house of design</a>
                                            </li>

                                            <li><a href="#">beauty & personal care</a>
                                                <ul>
                                                    <li><a href="#">makeup</a></li>
                                                    <li><a href="#">skincare</a></li>
                                                    <li><a href="#">premium beaty</a></li>
                                                    <li><a href="#">more</a>
                                                        <ul>
                                                            <li><a href="#">fragrances</a></li>
                                                            <li><a href="#">luxury beauty</a></li>
                                                            <li><a href="#">hair care</a></li>
                                                            <li><a href="#">tools & brushes</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">home & decor</a>
                                            </li>
                                            <li><a href="#">kitchen</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="brand-logo">
                                <a href="index.html"> <img src="{$path}Smarty/smarty-dir/assets/images/icon/logo.png"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
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
                                            <a href="#">Home</a>
                                            <ul>
                                                <li>
                                                    <a href="#">new demos <span class="new-tag">new</span></a>
                                                    <ul>
                                                        <li><a target="_blank" href="tools.html">tools</a></li>
                                                        <li><a target="_blank"
                                                                href="marketplace-demo.html">marketplace</a></li>
                                                        <li><a target="_blank" href="game.html">game</a></li>
                                                        <li><a target="_blank" href="gym-product.html">gym</a></li>
                                                        <li><a target="_blank" href="marijuana.html">marijuana</a></li>
                                                        <li><a target="_blank" href="left_sidebar-demo.html">left
                                                                sidebar</a></li>
                                                        <li><a target="_blank" href="jewellery.html">jewellery</a></li>
                                                        <li><a target="_blank" href="pets.html">pets</a></li>
                                                        <li><a target="_blank" href="metro.html">metro</a></li>
                                                        <li><a target="_blank" href="video-slider.html">video slider</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">clothing</a>
                                                    <ul>
                                                        <li><a target="_blank" href="index.html">fashion 1</a></li>
                                                        <li><a target="_blank" href="fashion-2.html">fashion 2</a></li>
                                                        <li><a target="_blank" href="fashion-3.html">fashion 3</a></li>
                                                        <li><a target="_blank" href="kids.html">kids</a></li>
                                                    </ul>
                                                </li>
                                                <li><a target="_blank" href="watch.html">watch</a></li>
                                                <li><a target="_blank" href="shoes.html">shoes</a></li>
                                                <li>
                                                    <a href="#">electronics</a>
                                                    <ul>
                                                        <li><a target="_blank" href="electronic-1.html">electronic 1</a>
                                                        </li>
                                                        <li><a target="_blank" href="electronic-2.html">electronic 2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a target="_blank" href="bags.html">bags</a></li>
                                                <li><a target="_blank" href="nursery.html">nursery</a></li>
                                                <li><a target="_blank" href="flower.html">flower</a></li>
                                                <li><a target="_blank" href="vegetables.html">vegetable</a></li>
                                                <li><a target="_blank" href="beauty.html">beauty</a></li>
                                                <li><a target="_blank" href="light.html">light</a></li>
                                                <li><a target="_blank" href="furniture.html">furniture</a></li>
                                                <li><a target="_blank" href="goggles.html">googles</a></li>
                                                <li>
                                                    <a href="#">basics</a>
                                                    <ul>
                                                        <li><a target="_blank" href="lookbook-demo.html">lookbook</a>
                                                        </li>
                                                        <li><a target="_blank" href="instagram-shop.html">instagram</a>
                                                        </li>
                                                        <li><a target="_blank" href="video.html">video</a></li>
                                                        <li><a target="_blank" href="parallax.html">parallax</a></li>
                                                        <li><a target="_blank" href="full-page.html">full page</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">shop</a>
                                            <ul>
                                                <li><a href="category-page.html">left sidebar</a></li>
                                                <li><a href="category-page(right).html">right sidebar</a></li>
                                                <li><a href="category-page(no-sidebar).html">no sidebar</a></li>
                                                <li><a href="category-page(sidebar-popup).html">sidebar popup</a></li>
                                                <li><a href="category-page(metro).html">metro <span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="category-page(full-width).html">full width <span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="category-page(infinite-scroll).tpl">infinite scroll</a>
                                                </li>
                                                <li><a href=category-page(3-grid).html>three grid</a></li>
                                                <li><a href="category-page(6-grid).html">six grid</a></li>
                                                <li><a href="category-page(list-view).html">list view</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">product</a>
                                            <ul>
                                                <li>
                                                    <a href="#">sidebar</a>
                                                    <ul>
                                                        <li><a href="product-page.html">left sidebar</a></li>
                                                        <li><a href="product-page(right-sidebar).html">right sidebar</a>
                                                        </li>
                                                        <li><a href="product-page(no-sidebar).html">no sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">thumbnail image</a>
                                                    <ul>
                                                        <li><a href="product-page(left-image).html">left image</a></li>
                                                        <li><a href="product-page(right-image).html">right image</a>
                                                        </li>
                                                        <li><a href="product-page(image-outside).html">image outside
                                                                <span class="new-tag">new</span></a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">three column</a>
                                                    <ul>
                                                        <li><a href="product-page(3-col-left).html">thumbnail left</a>
                                                        </li>
                                                        <li><a href="product-page(3-col-right).html">thumbnail right</a>
                                                        </li>
                                                        <li><a href="product-page(3-column).html">thubnail bottom</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="product-page(4-image).html">four image <span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="product-page(sticky).html">sticky</a></li>
                                                <li><a href="product-page(accordian).tpl">accordian</a></li>
                                                <li><a href="product-page(bundle).html">bundle<span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="product-page(image-swatch).html">image swatch <span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="product-page(vertical-tab).html">vertical tab</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega" id="hover-cls"><a href="#">features
                                                <div class="lable-nav">new</div>
                                            </a>
                                            <ul class="mega-menu full-mega-menu">
                                                <li>
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>portfolio</h5>
                                                                    </div>
                                                                    <div class="menu-content">
                                                                        <ul>
                                                                            <li><a href="grid-2-col.html">portfolio grid
                                                                                    2</a></li>
                                                                            <li><a href="grid-3-col.html">portfolio grid
                                                                                    3</a></li>
                                                                            <li><a href="grid-4-col.html">portfolio grid
                                                                                    4</a></li>
                                                                            <li><a href="masonary-2-grid.html">mesonary
                                                                                    grid 2</a></li>
                                                                            <li><a href="masonary-3-grid.html">mesonary
                                                                                    grid 3</a></li>
                                                                            <li><a href="masonary-4-grid.html">mesonary
                                                                                    grid 4</a></li>
                                                                            <li><a href="masonary-fullwidth.html">mesonary
                                                                                    full width</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>add to cart</h5>
                                                                    </div>
                                                                    <div class="menu-content">
                                                                        <ul>
                                                                            <li><a href="nursery.html">cart modal
                                                                                    popup</a></li>
                                                                            <li><a href="vegetables.html">qty. counter
                                                                                    <i class="fa fa-bolt icon-trend"
                                                                                        aria-hidden="true"></i></a></li>
                                                                            <li><a href="bags.html">cart top</a></li>
                                                                            <li><a href="shoes.html">cart bottom</a>
                                                                            </li>
                                                                            <li><a href="watch.html">cart left</a></li>
                                                                            <li><a href="tools.html">cart right</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>theme elements</h5>
                                                                    </div>
                                                                    <div class="menu-content">
                                                                        <ul>
                                                                            <li><a href="element-title.html">title</a>
                                                                            </li>
                                                                            <li><a href="element-banner.html">collection
                                                                                    banner</a></li>
                                                                            <li><a href="element-slider.html">home
                                                                                    slider</a></li>
                                                                            <li><a
                                                                                    href="element-category.html">category</a>
                                                                            </li>
                                                                            <li><a
                                                                                    href="element-service.html">service</a>
                                                                            </li>
                                                                            <li><a href="element-image-ratio.html">image
                                                                                    size ratio <i
                                                                                        class="fa fa-bolt icon-trend"
                                                                                        aria-hidden="true"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>product elements</h5>
                                                                    </div>
                                                                    <div class="menu-content">
                                                                        <ul>
                                                                            <li class="up-text"><a
                                                                                    href="element-productbox.html">product
                                                                                    box<span>10+</span></a></li>
                                                                            <li><a href="element-product-slider.html">product
                                                                                    slider</a></li>
                                                                            <li><a href="element-no_slider.html">no
                                                                                    slider</a></li>
                                                                            <li><a href="element-mulitiple_slider.html">multi
                                                                                    slider</a></li>
                                                                            <li><a href="element-tab.html">tab</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col mega-box">
                                                                <div class="link-section">
                                                                    <div class="menu-title">
                                                                        <h5>email template </h5>
                                                                    </div>
                                                                    <div class="menu-content">
                                                                        <ul>
                                                                            <li><a href="email-order-success.tpl">order
                                                                                    success</a></li>
                                                                            <li><a href="email-order-success-two.html">order
                                                                                    success 2</a></li>
                                                                            <li><a href="email-template.html">email
                                                                                    template</a></li>
                                                                            <li><a href="email-template-two.html">email
                                                                                    template 2</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages</a>
                                            <ul>
                                                <li>
                                                    <a href="#">vendor <span class="new-tag">new</span></a>
                                                    <ul>
                                                        <li><a href="vendor-dashboard.html">vendor dashboard</a></li>
                                                        <li><a href="vendor-profile.html">vendor profile</a></li>
                                                        <li><a href="become-vendor.html">become vendor</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#">account</a>
                                                    <ul>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                        <li><a href="cart.html">cart</a></li>
                                                        <li><a href="dashboard.html">Dashboard</a></li>
                                                        <li><a href="login.html">login</a></li>
                                                        <li><a href="register.tpl">register</a></li>
                                                        <li><a href="contact.html">contact</a></li>
                                                        <li><a href="forget_pwd.html">forget password</a></li>
                                                        <li><a href="profile.html">profile <span
                                                                    class="new-tag">new</span></a></li>
                                                        <li><a href="checkout.html">checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="about-page.html">about us</a></li>
                                                <li><a href="search.html">search</a></li>
                                                <li><a href="typography.html">typography <span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="review.html">review <span class="new-tag">new</span></a>
                                                </li>
                                                <li><a href="order-success.html">order success</a></li>
                                                <li>
                                                    <a href="#">compare</a>
                                                    <ul>
                                                        <li><a href="compare.html">compare</a></li>
                                                        <li><a href="compare-2.html">compare-2 <span
                                                                    class="new-tag">new</span></a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="collection.html">collection</a></li>
                                                <li><a href="lookbook.html">lookbook</a></li>
                                                <li><a href="sitemap.html">site map <span class="new-tag">new</span></a>
                                                </li>
                                                <li><a href="404.html">404</a></li>
                                                <li><a href="coming-soon.html">coming soon <span
                                                            class="new-tag">new</span></a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">blog</a>
                                            <ul>
                                                <li><a href="blog-page.html">left sidebar</a></li>
                                                <li><a href="blog(right-sidebar).html">right sidebar</a></li>
                                                <li><a href="blog(no-sidebar).html">no sidebar</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search">
                                            <div><img src="{$path}Smarty/smarty-dir/assets/images/icon/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-search" onclick="openSearch()"></i></div>
                                            <div id="search-overlay" class="search-overlay">
                                                <div>
                                                    <span class="closebtn" onclick="closeSearch()"
                                                        title="Close Overlay">×</span>
                                                    <div class="overlay-content">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputPassword1"
                                                                                placeholder="Search a Product">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary"><i
                                                                                class="fa fa-search"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-setting">
                                            <div><img src="{$path}Smarty/smarty-dir/assets/images/icon/setting.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-settings"></i></div>
                                            <div class="show-div setting">
                                                <h6>language</h6>
                                                <ul>
                                                    <li><a href="#">english</a> </li>
                                                    <li><a href="#">french</a> </li>
                                                </ul>
                                                <h6>currency</h6>
                                                <ul class="list-inline">
                                                    <li><a href="#">euro</a> </li>
                                                    <li><a href="#">rupees</a> </li>
                                                    <li><a href="#">pound</a> </li>
                                                    <li><a href="#">doller</a> </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart">
                                            <div><img src="{$path}Smarty/smarty-dir/assets/images/icon/cart.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-shopping-cart"></i></div>
                                            <ul class="show-div shopping-cart">
                                                <li>
                                                    <div class="media">
                                                        <a href="#"><img class="mr-3"
                                                                src="{$path}Smarty/smarty-dir/assets/images/fashion/product/1.jpg"
                                                                alt="Generic placeholder image"></a>
                                                        <div class="media-body">
                                                            <a href="#">
                                                                <h4>item name</h4>
                                                            </a>
                                                            <h4><span>1 x $ 299.00</span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="close-circle">
                                                        <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="media">
                                                        <a href="#"><img class="mr-3"
                                                                src="{$path}Smarty/smarty-dir/assets/images/fashion/product/2.jpg"
                                                                alt="Generic placeholder image"></a>
                                                        <div class="media-body">
                                                            <a href="#">
                                                                <h4>item name</h4>
                                                            </a>
                                                            <h4><span>1 x $ 299.00</span></h4>
                                                        </div>
                                                    </div>
                                                    <div class="close-circle">
                                                        <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="total">
                                                        <h5>subtotal : <span>$299.00</span></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="buttons">
                                                        <a href="cart.html" class="view-cart">view cart</a>
                                                        <a href="#" class="checkout">checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
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
                        <!-- <h2> {$cart} </h2> -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">carrelli</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            {if $carrelli != NULL}
                {section name=carrello loop=$carrelli}
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table cart-table table-responsive-xs">
                                <thead>
                                <h2>{$carrelli[carrello].nomeCarrello}</h2>
                                <h6>ID Carrello: {$carrelli[carrello].idCarrello}</h6>
                                <h5><b>Prodotti nel carrello</b></h5>
                                </thead>
                                <thead>
                                <tr class="table-head">
                                    <th scope="col">Nome</th>
                                    <th scope="col">quantità</th>
                                    <th scope="col">prezzo</th>
                                </tr>
                                </thead>
                                <tbody>
                                {section name=prod loop=$carrelli[carrello].prodotti}
                                    <tr>
                                        <td>{$carrelli[carrello].prodotti[prod].nome}</td>
                                        <td>
                                            <h2>{$carrelli[carrello].prodotti[prod].quantita}</h2>
                                        </td>
                                        <td>
                                            <h2 class="td-color">€ {$carrelli[carrello].prodotti[prod].prezzo}</h2>
                                        </td>
                                    </tr>
                                {/section}
                                </tbody>
                            </table>
                            <table class="table cart-table table-responsive-md">
                                <tfoot>
                                <tr>
                                    <td>Prezzo totale :</td>
                                    <td>
                                        <h2>€ {$carrelli[carrello].prezzoCarrello}</h2>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row cart-buttons">
                        <div class="col-6"><a href="{$path}GestioneCarrello/rievocaCarrelloInSessione/{$carrelli[carrello].idCarrello}" class="btn btn-solid">recupera carrello</a></div>
                        <div class="col-6"><a href="{$path}GestioneCarrello/eliminaCarrello/{$carrelli[carrello].idCarrello}" class="btn btn-solid">elimina carrello</a></div>
                    </div>
                    <br><br>
                    <hr style="border-top: 15px dashed red;">
                    <br><br>
                {/section}
            {else}
                <h1>OOOPS! Nessun carrello preferito!</h1>
                <h3>Corri ad approfittare dei migliaia di prodotti che ti offre ADC-Store!</h3>
                <h3>I nostri addetti si impegnano sempre a fornirti prodotti freschi e di qualità!</h3>
                <div class="row cart-buttons">
                    <div class="col-6"><a href="{$path}GestioneProdotti/recuperaProdotti" class="btn btn-solid">Inizia ad acquistare</a></div>
                    <div class="col-6"><a href="{$path}GestioneSchermate/recuperaHome" class="btn btn-solid">Torna alla Home</a></div>
                </div>
            {/if}
        </div>
    </section>
    <!--section end-->


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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col offset-xl-1">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>my account</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">mens</a></li>
                                    <li><a href="#">womens</a></li>
                                    <li><a href="#">clothing</a></li>
                                    <li><a href="#">accessories</a></li>
                                    <li><a href="#">featured</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>why we choose</h4>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="#">shipping & return</a></li>
                                    <li><a href="#">secure shopping</a></li>
                                    <li><a href="#">gallary</a></li>
                                    <li><a href="#">affiliates</a></li>
                                    <li><a href="#">contacts</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="sub-title">
                            <div class="footer-title">
                                <h4>store information</h4>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>Multikart Demo Store, Demo store India 345-659
                                    </li>
                                    <li><i class="fa fa-phone"></i>Call Us: 123-456-7898</li>
                                    <li><i class="fa fa-envelope-o"></i>Email Us: Support@Fiot.com</li>
                                    <li><i class="fa fa-fax"></i>Fax: 123456</li>
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
                            <p><i class="fa fa-copyright" aria-hidden="true"></i> 2017-18 themeforest powered by
                                pixelstrap</p>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('index.html')"
                                            class="btn new-tab-btn">Preview</button></div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('game.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('gym-product.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('tools.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('marijuana.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('metro.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('pets.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('video-slider.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('left_sidebar-demo.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('jewellery.html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo2"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('fashion-2.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo3"></div>
                                <div class="demo-text">
                                    <h4>Fashion</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('fashion-3.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo4"></div>
                                <div class="demo-text">
                                    <h4>Shoes</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('shoes.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo5"></div>
                                <div class="demo-text">
                                    <h4>Bags</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('bags.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo6"></div>
                                <div class="demo-text">
                                    <h4>Watch</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('watch.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo7"></div>
                                <div class="demo-text">
                                    <h4>Kids</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('kids.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo8"></div>
                                <div class="demo-text">
                                    <h4>Flower</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('flower.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo9"></div>
                                <div class="demo-text">
                                    <h4>Nursery</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('nursery.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo10"></div>
                                <div class="demo-text">
                                    <h4>Vegetables</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('vegetables.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo11"></div>
                                <div class="demo-text">
                                    <h4>Beauty</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('beauty.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo12"></div>
                                <div class="demo-text">
                                    <h4>Instagram Shop</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('instagram-shop.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects effect-2">
                            <div class="set-position">
                                <div class="layout-container demo13"></div>
                                <div class="demo-text">
                                    <h4>Lookbook</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('lookbook-demo.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo14"></div>
                                <div class="demo-text">
                                    <h4>Light</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('light.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo15"></div>
                                <div class="demo-text">
                                    <h4>Full Page</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('full-page.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo16"></div>
                                <div class="demo-text">
                                    <h4>Electronic-1</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('electronic-1.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo17"></div>
                                <div class="demo-text">
                                    <h4>Electronic-2</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('electronic-2.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects effect-2">
                            <div class="set-position">
                                <div class="layout-container demo18"></div>
                                <div class="demo-text">
                                    <h4>Video</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('video.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo19"></div>
                                <div class="demo-text">
                                    <h4>Goggles</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('goggles.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo20"></div>
                                <div class="demo-text">
                                    <h4>Parallax</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('parallax.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo21"></div>
                                <div class="demo-text">
                                    <h4>Furniture</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('furniture.html')"
                                            class="btn new-tab-btn">Preview</button></div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo24"></div>
                                <div class="demo-text">
                                    <h4>right sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(right).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo23"></div>
                                <div class="demo-text">
                                    <h4>no sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(no-sidebar).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo25"></div>
                                <div class="demo-text">
                                    <h4>popup</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(sidebar-popup).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(metro).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(full-width).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo26"></div>
                                <div class="demo-text">
                                    <h4>infinite scroll</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(infinite-scroll).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo54"></div>
                                <div class="demo-text">
                                    <h4>three grid</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(3-grid).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo55"></div>
                                <div class="demo-text">
                                    <h4>six grid</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(6-grid).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo56"></div>
                                <div class="demo-text">
                                    <h4>list view</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('category-page(list-view).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(4-image).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo33"></div>
                                <div class="demo-text">
                                    <h4>left sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page.html')"
                                            class="btn new-tab-btn">Preview</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo36"></div>
                                <div class="demo-text">
                                    <h4>right sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(right-sidebar).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo34"></div>
                                <div class="demo-text">
                                    <h4>no sidebar</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(no-sidebar).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(bundle).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(image-swatch).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo32"></div>
                                <div class="demo-text">
                                    <h4>left image</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(left-image).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo35"></div>
                                <div class="demo-text">
                                    <h4>right image</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(right-image).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(image-outside).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo27"></div>
                                <div class="demo-text">
                                    <h4>3-col left</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(3-col-left).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo28"></div>
                                <div class="demo-text">
                                    <h4>3-col right</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(3-col-right).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo29"></div>
                                <div class="demo-text">
                                    <h4>3-col bottom</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(3-column).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo37"></div>
                                <div class="demo-text">
                                    <h4>sticky</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(sticky).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects">
                            <div class="set-position">
                                <div class="layout-container demo30"></div>
                                <div class="demo-text">
                                    <h4>accordian</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(accordian).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 text-center demo-effects mb-0">
                            <div class="set-position">
                                <div class="layout-container demo38"></div>
                                <div class="demo-text">
                                    <h4>vertical tab</h4>
                                    <div class="btn-group demo-btn" role="group" aria-label="Basic example"> <button
                                            type="button" onClick="window.open('product-page(vertical-tab).html')"
                                            class="btn new-tab-btn">Preview</button> </div>
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
                    <a href="https://themeforest.net/item/multikart-responsive-ecommerce-html-template/22809967?s_rank=1"
                        target="_blank" class="btn btn-block purchase_btn"><i class="fa fa-shopping-cart"
                            aria-hidden="true"></i> purchase Multikart now!</a>
                    <a href="https://themeforest.net/item/multikart-responsive-angular-ecommerce-template/22905358?s_rank=3"
                        target="_blank" class="btn btn-block purchase_btn"><img src="{$path}Smarty/smarty-dir/assets/images/icon/angular.png"
                            alt="" class="img-fluid"> Multikart Angular</a>
                    <a href="https://themeforest.net/item/multikart-responsive-react-ecommerce-template/23067773?s_rank=2"
                        target="_blank" class="btn btn-block purchase_btn"><img src="{$path}Smarty/smarty-dir/assets/images/icon/react.png"
                            alt="" class="img-fluid"> Multikart React</a>
                    <a href="https://themeforest.net/item/multikart-multipurpose-shopify-sections-theme/23093831?s_rank=1"
                        target="_blank" class="btn btn-block purchase_btn"><img src="{$path}Smarty/smarty-dir/assets/images/icon/shopify.png"
                            alt="" class="img-fluid"> Multikart Shopify</a>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->


    <!-- tap to top start -->
    <div class="tap-top">
        <div><i class="fa fa-angle-double-up"></i></div>
    </div>

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
    </script>
</body>

</html>