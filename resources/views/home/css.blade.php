 <!-- Basic -->
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <!-- Mobile Metas -->
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 <!-- Site Metas -->
 <meta name="keywords" content="" />
 <meta name="description" content="" />
 <meta name="author" content="" />
 <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

 <title>
     Ecommerce
 </title>

 <!-- slider stylesheet -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

 <!-- bootstrap core css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

 <!-- Custom styles for this template -->
 <link href="{{ asset('css/style.css') }} " rel="stylesheet" />
 <!-- responsive style -->
 <link href="{{ asset('css/responsive.css') }} " rel="stylesheet" />

 <style>
     /*****************globals*************/
     body {
         font-family: 'open sans';
         overflow-x: hidden;
     }

     img {
         max-width: 100%;
     }

     .preview {
         display: -webkit-box;
         display: -webkit-flex;
         display: -ms-flexbox;
         display: flex;
         -webkit-box-orient: vertical;
         -webkit-box-direction: normal;
         -webkit-flex-direction: column;
         -ms-flex-direction: column;
         flex-direction: column;
     }

     @media screen and (max-width: 996px) {
         .preview {
             margin-bottom: 20px;
         }
     }

     .preview-pic {
         -webkit-box-flex: 1;
         -webkit-flex-grow: 1;
         -ms-flex-positive: 1;
         flex-grow: 1;
     }

     .preview-thumbnail.nav-tabs {
         border: none;
         margin-top: 15px;
     }

     .preview-thumbnail.nav-tabs li {
         width: 18%;
         margin-right: 2.5%;
     }

     .preview-thumbnail.nav-tabs li img {
         max-width: 100%;
         display: block;
     }

     .preview-thumbnail.nav-tabs li a {
         padding: 0;
         margin: 0;
     }

     .preview-thumbnail.nav-tabs li:last-of-type {
         margin-right: 0;
     }

     .tab-content {
         overflow: hidden;
     }

     .tab-content img {
         width: 100%;
         -webkit-animation-name: opacity;
         animation-name: opacity;
         -webkit-animation-duration: .3s;
         animation-duration: .3s;
     }

     .card {
         margin-top: 50px;
         background: #eee;
         padding: 3em;
         line-height: 1.5em;
     }

     @media screen and (min-width: 997px) {
         .wrapper {
             display: -webkit-box;
             display: -webkit-flex;
             display: -ms-flexbox;
             display: flex;
         }
     }


     .colors {
         -webkit-box-flex: 1;
         -webkit-flex-grow: 1;
         -ms-flex-positive: 1;
         flex-grow: 1;
     }

     .product-title,
     .price,
     .sizes,
     .colors {
         text-transform: UPPERCASE;
         font-weight: bold;
     }

     .checked,
     .price span {
         color: #ff9f1a;
     }

     .price {
         margin-bottom: 15px;
         margin-top: 11px;
     }

     .product-title,
     .product-description,
     .vote,
     .sizes {
         margin-bottom: 15px;
     }

     .product-title {
         margin-top: 0;
     }

     .size {
         margin-right: 10px;
     }

     .size:first-of-type {
         margin-left: 40px;
     }

     .color {
         display: inline-block;
         vertical-align: middle;
         margin-right: 10px;
         height: 2em;
         width: 2em;
         border-radius: 2px;
     }

     .color:first-of-type {
         margin-left: 20px;
     }

     .like {
         background: #ff9f1a;
         padding: 1.2em 1.5em;
         border: none;
         text-transform: UPPERCASE;
         font-weight: bold;
         color: #fff;
         -webkit-transition: background .3s ease;
         transition: background .3s ease;
     }

     .add-to-cart:hover,
     .like:hover {
         background: #b36800;
         color: #fff;
     }

     .not-available {
         text-align: center;
         line-height: 2em;
     }

     .not-available:before {
         font-family: fontawesome;
         content: "\f00d";
         color: #fff;
     }

     .orange {
         background: #ff9f1a;
     }

     .green {
         background: #85ad00;
     }

     .blue {
         background: #0076ad;
     }

     .tooltip-inner {
         padding: 1.3em;
     }

     @-webkit-keyframes opacity {
         0% {
             opacity: 0;
             -webkit-transform: scale(3);
             transform: scale(3);
         }

         100% {
             opacity: 1;
             -webkit-transform: scale(1);
             transform: scale(1);
         }
     }

     @keyframes opacity {
         0% {
             opacity: 0;
             -webkit-transform: scale(3);
             transform: scale(3);
         }

         100% {
             opacity: 1;
             -webkit-transform: scale(1);
             transform: scale(1);
         }
     }

     .shopping-cart {
         position: relative;
         display: inline-flex;
         align-items: center;
     }

     .cart-count {
         position: absolute;
         top: -10px;
         /* Sesuaikan dengan posisi vertikal yang diinginkan */
         right: -10px;
         /* Sesuaikan dengan posisi horizontal yang diinginkan */
         background-color: red;
         color: white;
         border-radius: 50%;
         padding: 2px 6px;
         /* Sesuaikan ukuran padding */
         font-size: 12px;
         /* Sesuaikan ukuran font */
     }

     /* mycart */
     @media (min-width: 1025px) {
         .h-custom {
             height: 100vh !important;
         }
     }

     /* view cart */
     .card-body .d-flex .ms-3 {
         display: flex;
         flex-direction: column;
         justify-content: center;
     }

     .card-body .d-flex .me-3 {
         display: flex;
         flex-direction: column;
         align-items: flex-end;
     }

     .card-body .fw-normal {
         font-weight: normal;
     }

     .nav-item.active .nav-link {
         font-weight: bold;
         color: #007bff;
         /* Gaya yang sesuai dengan tema Anda */
     }




     /*# sourceMappingURL=style.css.map */
 </style>