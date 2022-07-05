
<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Hauleasy</title>
	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	<meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url().'assets/admin/images/icon.png' ?>" />

<!--	<link rel="icon" type="image/png" href=" --><?php //echo base_url().'assets/images/icon.png' ?><!--"  />-->

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COpen+Sans:400,700,800" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/bootstrap/css/bootstrap.min.css' ?> ">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/animate/animate.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/simple-line-icons/css/simple-line-icons.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'vendor/owl.carousel/assets/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/owl.carousel/assets/owl.theme.default.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/vendor/magnific-popup/magnific-popup.min.css' ?>">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/theme.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/theme-elements.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/theme-blog.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/theme-shop.css' ?>">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/demos/demo-landing.css' ?>">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/skin-landing.css' ?>">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css' ?>">

    <!-- Head Libs -->
    <script src="<?php echo base_url().'assets/vendor/modernizr/modernizr.min.js"' ?>"></script>
    <style>
        .caption h1, .caption p{
            color: #ffffff !important;
        }
        .caption h1 span{
            font-weight: lighter;
        }
        .download .row.align-items-center div h2{
            color: #1D75BC;
        }
        html .bg-color-dark-scale-2{
            background-color: #DEDEDE !important;
        }
        .bg-color-dark-scale-2.box h4, .bg-color-dark-scale-2.box p{
            color: #008BCC !important;
        }
        .bg-color-dark-scale-2.box p{
            color: #707070 !important;
        }
        #footer {
            background: #DEDEDE !important;
        }
        .image-box h4{
            color: white !important;
        }
        section.toggle{
            border-top: 1px solid #E1E1E1;
        }
        .btn-link::before , .toggle > label:before {
            /*content: " ";*/
        url("<?php echo base_url().'assets/images/faq-down.svg' ?>");
            position: absolute;
            top: 15px;
            left: 14px !important;
            border-color: #CCC;
            border-top: 0px solid;
            border-right:0px solid;
            width: 8px;
            height: 8px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transition: top 0.3s, -webkit-transform 0.3s;
            transition: top 0.3s, -webkit-transform 0.3s;
            transition: transform 0.3s, top 0.3s;
            transition: transform 0.3s, top 0.3s, -webkit-transform 0.3s;
            -webkit-transform: rotate(-45deg) translate3d(0, -50%, 0);
            transform: rotate(0deg) translate3d(0, -50%, 0);
            -webkit-transform-origin: 35%;
            transform-origin: 35%;
        }
        .btn-link.collapsed::before , .toggle.active > label:before {
            top: 30px;
            -webkit-transform: rotate(135deg);
            transform: rotate(180deg);
        }
        html .toggle-primary .toggle.active > label {
            background-color: #fafafa;
            border-color: #0088cc;
            color: #000000;
        }
        .btn-link, .toggle > label {
            -webkit-transition: all .15s ease-out;
            transition: all .15s ease-out;
            background: none;
            border-left: none;
            border-radius: 0;
            color: #000000 !important;
            font-size: 18px;
            font-weight: bold;
            display: block;
            min-height: 20px;
            padding: 12px 20px 12px 30px !important;
            position: relative;
            cursor: pointer;
        }
        .footer div h5{
            font-size: 20px !important;
            font-weight: bold;
            color: #707070;

        }
        #footer h5{
            color: #707070;
        }
        .footer div p, .footer div p .footer-links{
            font-size: 15px ;
            color: #707070 !important;
        }
        .d-sm-none{
            display: block !important;
        }
        .d-lg-none{
            display: none !important;
        }


        .accordion .card:first-of-type, .accordion .card:not(:first-of-type):not(:last-of-type), .accordion .card:last-of-type{
            border: none;
            border-radius: 0px;
            border-top: 1px solid #E1E1E1;
        }
        .card-header{
            background-color: #fafafa !important;
        }
        html, html .bg-orange {
            background-color: #F89521 !important;
            color: #ffffff;
        }
        html, html .bg-gray {
            background-color: #EDEDED !important;

        }
        .title{
            color: #008BCC !important;
        }
        .stake-title{
            font-size: 32px;
            color: #008BCC;
        }
        .faq-title{
            color: #008BCC;
            font-weight: bold;
            padding-right: 200px
        }
        .card {
            border: none;
            border-radius: 0px;
            background-color: #EDEDED;
            padding: 20px;
            padding-left: 30px;
        }
        .card-body {
            background-color: transparent !important;
            padding-left: 15px !important;
            padding-bottom: 0px;
            padding-top: 5px;
        }
        .card-header {
            background-color: transparent !important;
            padding-left: 15px !important;
            padding-top: 0px;
            border-bottom: 0px !important;

        }
        .card-header:first-child {
            border-radius: 0px !important;
        }
        .card:hover {
            background-color: #DEDEDE !important;
            border-radius: 10px !important;
            padding: 20px;
            padding-left: 28px
        }
        .card:hover .card-header, .card:hover .card-body {
            border-left: 2px solid #F89521 !important;
            background-color: #DEDEDE
            border-radius: 10px !important;
            padding-left: 20px
        }
        .owl-dots{
            text-align: left !important;
            margin-left: 100px;
        }
        .owl-nav{
            text-align: right !important;
        }
        .owl-carousel .owl-dots .owl-dot.active span, .owl-carousel .owl-dots .owl-dot:hover span {
            background-color: #F89523;

        }
        .owl-theme .owl-dots .owl-dot span {
            background-color: #ffffff;
            border: 1px solid #F89523;
        }

        .owl-carousel .owl-nav button[class*="owl-"] {
            background-color: unset;
            border-color: none;
            color: #FFF;
        }
        .owl-carousel .owl-nav button.owl-prev:before {
            content: url("<?php echo base_url().'assets/images/arrow-left.svg' ?>");

        }
        .owl-carousel .owl-nav button.owl-next:before {
            content: url("<?php echo base_url().'assets/images/arrow-right.svg' ?>");
        }
        .owl-carousel .owl-nav button[class*="owl-"]:hover, .owl-carousel .owl-nav button[class*="owl-"].hover {
            background-color: unset;
            border-color: unset;
        }
        .cover-bg{
            display: flex;
            background-color: #fff;
            padding: 10px;
            border-radius: 6px;
        }
        .cover-input{
            flex-grow: 1;
            height: 100%;
            margin: 5px 0px;
            border: 0px;
        }
        .cover-send-btn{
            padding: 10px 30px;

        }
        .dropdown-item {
            padding: 0px !important
        }
        .dropdown:hover .dropdown-toggle {
            border-bottom: 1px solid #F89521;
            color: #fff !important;
        }
        html .bg-blue{
            background-color: #008BCC !important;
        }

        @media (min-width: 992px) {
            .col-lg-3x {
                -ms-flex: 0 0 20%;
                flex: 0 0 20%;
                max-width: 20%;
            }

        }
        @media (max-width: 991px) {
            #section-concept{
                background-image: none !important;
            }
            .caption{
                padding: 5px 40px;
                text-align: center;
            }
            .caption h1{
                font-size: 32px !important;
            }
            .caption p img{
                width: 100px;
            }
            .phone {
                text-align: center;
                margin-top: -50px;
            }
            .phone img{
                height: auto;

            }
            h2.text-9{
                font-size: 30px !important;
                margin-top: 40px;
            }
            p.text-1rem.text-color-default{
                padding-bottom: 0px !important;
                margin-bottom: 15px !important;
                font-size: 16px !important;
                text-align: center;

            }
            section.section {
                padding: 10px 0 !important;
            }
            .download .row.align-items-center div{
                text-align: center;
            }
            .download .row.align-items-center div h2{
                font-size: 24px !important;
            }
            .download .row.align-items-center div p{
                font-size: 14px !important;
            }
            .d-sm-none{
                display: none !important;
            }
            .d-lg-none{
                display: block !important;
            }
            .phone-about{
                height: 300px!important;
            }
            .section.testimonial-g{
                background-image: none !important;
                background-color: #1774BA !important;
            }

            .footer div.col-md-6{
                margin-bottom: 40px !important;
            }
            .footer div h5.text-3.mb-3{
                font-size: 25px !important;
            }
            .footer div p{
                font-size: 16px !important;
                margin-bottom: 10px !important;
            }

            .box.rounded img{
                width: 100%;
            }


        }
    </style>
</head>

<body data-spy="scroll" data-target=".scroll" class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">


</body>

</html>
