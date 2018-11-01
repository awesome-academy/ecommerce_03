<!DOCTYPE html>
<html lang="en">
<head>
    <title>@lang('message.home')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    {{ Html::style(asset('css/all.css')) }}
    {{ Html::style(asset('resources/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')) }}
</head>
<body class="animsition">

    <header class="header1">
        <div class="container-menu-header">
            <div class="topbar">
                <div class="topbar-social">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                    <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                </div>

                <span class="topbar-child1">
                    @lang('message.free_ship')
                </span>

                <div class="topbar-child2">
                </div>
            </div>

            <div class="wrap_header">
                <a href="index.html" class="logo">
                    <img src="images/icons/logo.png" alt="IMG-LOGO">
                </a>

                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="index.html">@lang('message.home')</a>
                                <ul class="sub_menu">
                                    <li><a href="index.html"></a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="product.html">@lang('message.shop')</a>
                            </li>

                            <li>
                                <a href="blog.html">@lang('message.blog')</a>
                            </li>

                            <li>
                                <a href="contact.html">@lang('message.contact')</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header-icons">
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                    </a>

                    <span class="linedivide1"></span>

                    <div class="header-wrapicon2">
                        <img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti"></span>

                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                            </ul>

                            <div class="header-cart-total">
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        @lang('message.view_cart')
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        @lang('message.check_out')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
