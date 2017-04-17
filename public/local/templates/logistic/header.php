<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title><?$APPLICATION->ShowTitle()?></title>
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="<?=P_ASSETS?>img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?=P_ASSETS?>img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=P_ASSETS?>img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=P_ASSETS?>img/favicon/apple-touch-icon-114x114.png">
    <!-- Template Basic Images End -->

    <!-- Bootstrap (latest) Grid Styles Only -->
    <style>html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}h1{font-size:2em;margin:0.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace, monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:bold}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}*:before,*:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0)}body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}input,button,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#337ab7;text-decoration:none}a:hover,a:focus{color:#23527c;text-decoration:underline}a:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}figure{margin:0}img{vertical-align:middle}.img-responsive{display:block;max-width:100%;height:auto}.img-rounded{border-radius:6px}.img-thumbnail{padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;display:inline-block;max-width:100%;height:auto}.img-circle{border-radius:50%}hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}.sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}[role="button"]{cursor:pointer}.container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}.row{margin-left:-15px;margin-right:-15px}.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width:768px){.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}.clearfix:before,.clearfix:after,.container:before,.container:after,.container-fluid:before,.container-fluid:after,.row:before,.row:after{content:" ";display:table}.clearfix:after,.container:after,.container-fluid:after,.row:after{clear:both}.center-block{display:block;margin-left:auto;margin-right:auto}.pull-right{float:right !important}.pull-left{float:left !important}.hide{display:none !important}.show{display:block !important}.invisible{visibility:hidden}.text-hide{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0}.hidden{display:none !important}.affix{position:fixed}@-ms-viewport{width:device-width}.visible-xs,.visible-sm,.visible-md,.visible-lg{display:none !important}.visible-xs-block,.visible-xs-inline,.visible-xs-inline-block,.visible-sm-block,.visible-sm-inline,.visible-sm-inline-block,.visible-md-block,.visible-md-inline,.visible-md-inline-block,.visible-lg-block,.visible-lg-inline,.visible-lg-inline-block{display:none !important}@media (max-width:767px){.visible-xs{display:block !important}table.visible-xs{display:table !important}tr.visible-xs{display:table-row !important}th.visible-xs,td.visible-xs{display:table-cell !important}}@media (max-width:767px){.visible-xs-block{display:block !important}}@media (max-width:767px){.visible-xs-inline{display:inline !important}}@media (max-width:767px){.visible-xs-inline-block{display:inline-block !important}}@media (min-width:768px) and (max-width:991px){.visible-sm{display:block !important}table.visible-sm{display:table !important}tr.visible-sm{display:table-row !important}th.visible-sm,td.visible-sm{display:table-cell !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-block{display:block !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline{display:inline !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline-block{display:inline-block !important}}@media (min-width:992px) and (max-width:1199px){.visible-md{display:block !important}table.visible-md{display:table !important}tr.visible-md{display:table-row !important}th.visible-md,td.visible-md{display:table-cell !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-block{display:block !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline{display:inline !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline-block{display:inline-block !important}}@media (min-width:1200px){.visible-lg{display:block !important}table.visible-lg{display:table !important}tr.visible-lg{display:table-row !important}th.visible-lg,td.visible-lg{display:table-cell !important}}@media (min-width:1200px){.visible-lg-block{display:block !important}}@media (min-width:1200px){.visible-lg-inline{display:inline !important}}@media (min-width:1200px){.visible-lg-inline-block{display:inline-block !important}}@media (max-width:767px){.hidden-xs{display:none !important}}@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none !important}}@media (min-width:992px) and (max-width:1199px){.hidden-md{display:none !important}}@media (min-width:1200px){.hidden-lg{display:none !important}}.visible-print{display:none !important}@media print{.visible-print{display:block !important}table.visible-print{display:table !important}tr.visible-print{display:table-row !important}th.visible-print,td.visible-print{display:table-cell !important}}.visible-print-block{display:none !important}@media print{.visible-print-block{display:block !important}}.visible-print-inline{display:none !important}@media print{.visible-print-inline{display:inline !important}}.visible-print-inline-block{display:none !important}@media print{.visible-print-inline-block{display:inline-block !important}}@media print{.hidden-print{display:none !important}}</style>

    <!-- Header CSS (first screen styles from header.min.css) - inserted in the build of the project -->
    <style>.loader{background:#fff;bottom:0;height:100%;left:0;position:fixed;right:0;top:0;width:100%;z-index:9999}::-webkit-input-placeholder{color:#666;opacity:1}:-moz-placeholder{color:#666;opacity:1}::-moz-placeholder{color:#666;opacity:1}:-ms-input-placeholder{color:#666;opacity:1}body input:focus:required:invalid,body input:required:valid,body textarea:focus:required:invalid,body textarea:required:valid{color:#666}body{font-size:16px;min-width:320px;position:relative;line-height:1.6;font-family:Muller,sans-serif;overflow-x:hidden}.big_container .inf .title,.header,.slider_mobile .item .inf .content,.slider_mobile .item .inf .title,.slider_mobile .item .inf a{font-family:Roboto,sans-serif}.slider_mobile{background-color:#e2e2e2}.slider_mobile .item{position:relative;display:block;width:100%;padding:150px 0 15px;background-size:cover;background-repeat:no-repeat;background-position:center center}.slider_mobile .item .inf{position:relative;display:block}.slider_mobile .item .inf .theme{display:inline-block;padding:0 5px;font-size:12px;background-color:#007dba;color:#fff}.slider_mobile .item .inf .title{font-weight:700;font-size:12px;line-height:1.2;color:#fff;padding:15px 0 10px}.slider_mobile .item .inf .content{font-size:12px;line-height:1.2;color:#fff;padding:0 50px 15px 0}.slider_mobile .item .inf a{position:relative;display:inline-block;padding:2px 5px;border:1px solid #fff;color:#fff;-webkit-border-radius:5px;border-radius:5px;font-size:12px;text-decoration:none}.header,.header .city ul a,section.nav_buttom{display:block;position:relative}section.nav_buttom{width:100%;height:0;background-color:#fff;-webkit-transition:.2s;transition:.2s}.header{background:#fff;font-weight:700;font-size:12px}.header .group-box-right .search span,.header .group-box-right .socki ul li:nth-child(1) a,.header .group-box-right .socki ul li:nth-child(2) a,.header .group-box-right .socki ul li:nth-child(3) a{background-image:url(img/fullicon.png);background-repeat:no-repeat}.nav nav ul li a,.nav nav ul li ul.next_menu li a{font-family:roboto,sans-serif;font-weight:700;text-decoration:none}.header .city ul{list-style-type:none;padding:0;margin:0}.header .city ul a{float:left;margin:15px 15px 14px 0;color:#000;line-height:1.2;border-bottom:1px solid transparent;text-decoration:none;-webkit-transition:.5s;transition:.5s}.header .city ul a:hover{border-bottom:1px solid #000}.header .group-box-right{position:relative;display:inline-block;float:right;text-align:right;height:40px}.header .group-box-right .socki{position:relative;display:block;width:93px;float:left}.header .group-box-right .socki ul{list-style-type:none;padding:0;margin:0}.header .group-box-right .socki ul li{position:relative;display:block}.header .group-box-right .socki ul li a{position:relative;display:block;float:left;margin:12px 5px 0 0;width:24px;height:24px;-webkit-border-radius:4px;border-radius:4px;background-color:#007dba;-webkit-transition:.5s;transition:.5s}.header .group-box-right .search,.nav nav,.nav nav ul{float:right} .header .group-box-right .search{margin: 0 0 0 15px;} .header .group-box-right .socki ul li a:hover{margin-top:10px}.header .group-box-right .socki ul li:nth-child(1) a{background-position:2px 1px}.header .group-box-right .socki ul li:nth-child(2) a{background-position:-22px 1px}.header .group-box-right .socki ul li:nth-child(3) a{background-position:-75px 1px}.header .group-box-right .search input{position:relative;display:block;float:right;width:0;padding:2px 0;border:1px solid #cdcdcd;margin:12px 0 0 5px;-webkit-border-radius:5px;border-radius:5px;font-size:12px;outline:0;opacity:0;-webkit-transition:1s;transition:1s}.header .group-box-right .search input:focus{opacity:1;width:165px;padding:2px 5px}.header .group-box-right .search span{position:absolute;display:block;content:'';right:0;top:14px;width:22px;-webkit-border-radius:4px;border-radius:4px;height:21px;background-position:-52px -1px;z-index:20;cursor:pointer}.nav,.nav nav{position:relative}.header .group-box-right .search:hover input{opacity:1;width:165px;padding:2px 5px}.nav{display:block;background-color:#101013}.nav .logo,.nav nav{display:inline-block}.nav:hover~.nav_buttom{height:45px}.nav .logo{margin:25px 0}.nav nav{width:100%}.nav nav ul{list-style-type:none;margin:-95px 0 0;padding:0}.nav nav ul li{float:left}.nav nav ul li:hover{background-color:#007dba}.nav nav ul li:hover>ul.next_menu{height:45px;opacity:1;visibility:visible}.nav nav ul li ul.next_menu{position:absolute;display:block;width:100%;height:0;padding:0 20px;margin-top:0;left:0;background-color:#fff;-webkit-transition:.5s;transition:.5s;z-index:10;opacity:0;visibility:hidden}.nav nav ul li ul.next_menu:after{content:"";position:absolute;top:0;bottom:0;left:-9999px;right:0;border-left:9999px solid #fff;-webkit-box-shadow:9999px 0 0 #fff;box-shadow:9999px 0 0 #fff;z-index:-1}.nav nav ul li ul.next_menu li{float:left;padding:15px 20px 15px 0}.nav nav ul li ul.next_menu li:hover{background-color:transparent}.nav nav ul li ul.next_menu li a{position:relative;display:block;padding:0;background-color:transparent;font-size:12px;line-height:1.2;border-bottom:1px solid transparent;color:#101013}.nav nav ul li ul.next_menu li a:hover{color:#007dba;border-color:#007dba}.nav nav ul li a{position:relative;display:block;padding:35px 15px;font-size:16px;-webkit-transition:.5s;transition:.5s;color:#fff}.nav nav ul .active a,.nav nav ul li a:hover{background-color:#007dba}.nav .nav_mobile{position:relative;display:inline-block;float:right}.nav .nav_mobile svg{display:block;width:40px;height:40px;margin-top:22px}.big_container,.mini_container{width:50%;background-size:cover;background-repeat:no-repeat;background-position:center center}.head_slider{position:relative;display:block;height:470px}.big_container{position:relative;display:inline-block;float:left;padding-left:15px;height:100%}.big_container .inf{position:absolute;display:block;bottom:15px}.big_container .inf .theme{display:inline-block;padding:0 5px;font-size:14px;background-color:#007dba;color:#fff}.big_container .inf .title{font-weight:700;font-size:20px;line-height:1.2;color:#fff;padding:20px 0 25px}.big_container .inf .content,.big_container .inf a{font-size:14px;font-family:Roboto,sans-serif;color:#fff}.big_container .inf .content{height: 110px; overflow: hidden; line-height:1.2;padding:0 50px 15px 0}.big_container .inf a{position:relative;display:inline-block;padding:2px 5px;border:1px solid #fff;-webkit-border-radius:5px;border-radius:5px;text-decoration:none}.mini_container{position:relative;display:block;float:right;height:50%;padding-left:15px}.mini_container .inf{position:absolute;display:block;bottom:15px}.mini_container .inf .theme{display:inline-block;padding:2px 5px 0;font-size:14px;background-color:#007dba;color:#fff}.mini_container .inf .title{font-family:Roboto,sans-serif;font-weight:700;font-size:12px;line-height:1.2;color:#fff;padding:15px 0 10px}.mini_container .inf .content{height: 80px; overflow: hidden; font-family:Roboto,sans-serif;font-size:12px;line-height:1.2;color:#fff;padding:0 50px 15px 0}.mini_container .inf a{position:relative;display:inline-block;padding:2px 5px;border:1px solid #fff;color:#fff;-webkit-border-radius:5px;border-radius:5px;font-family:Roboto,sans-serif;font-size:12px;text-decoration:none}.linenews,.linenews .right_bar{display:block;position:relative}.linenews{background-color:#22222b}.linenews .right_bar{padding:25px 0 30px}.linenews .right_bar .title{font-family:muller,sans-serif;font-weight:700;color:#fff}.linenews .right_bar .news_doc_right{margin-bottom:15px}.linenews .right_bar ul.tabs{margin:0;padding:15px 0;list-style-type:none;font-family:Roboto,sans-serif;font-size:12px}.linenews .right_bar ul.tabs li{position:relative;display:inline-block;padding:2px 7px;margin:3px 2px;-webkit-border-radius:3px;border-radius:3px;background-color:#49495e;color:#afafb3;cursor:pointer;-webkit-transition:.5s;transition:.5s}.linenews .right_bar .items a:hover,.linenews .right_bar ul.tabs li:hover{background-color:#1487bf;color:#fff}.linenews .right_bar .items{position:relative;display:block}.linenews .right_bar .items a{position:relative;display:block;padding:5px 10px 5px 0;font-family:Muller,sans-serif;font-size:12px;line-height:1.4;text-decoration:none;color:#fff;-webkit-transition:.3s;transition:.3s}.linenews .right_bar .items a:hover{font-size:12px}.linenews .right_bar .items a:hover .d_right{border-color:#1487bf}.linenews .right_bar .items a:before{position:absolute;display:block;content:'';width:30px;top:0;left:-30px;height:100%;opacity:0;background-color:#1487bf;-webkit-transition:.3s;transition:.3s}.linenews .right_bar .items a:hover:before{opacity:1}.linenews .right_bar .items a span{color:#1487bf;padding-right:10px;-webkit-transition:.3s;transition:.3s}.linenews .right_bar .items a:hover span{color:#fff}.linenews .right_bar .items a .d_right{display:block;color:#9e9eae;line-height:1.2;font-family:Roboto,sans-serif;font-size:12px;padding:10px 0 15px;border-bottom:1px solid #fff}.linenews .right_bar .all a{position:relative;display:inline-block;padding:20px 0 0;line-height:1.2;border-bottom:1px solid transparent;color:#fff;font-weight:700;font-size:12px;text-decoration:none;-webkit-transition:.5s;transition:.5s}.linenews .right_bar .all a:hover{border-bottom:1px solid #fff}</style>

    <!-- Load CSS, CSS Localstorage & WebFonts Main Function -->
    <script>!function(e){"use strict";function t(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)};function n(t,n){return e.localStorage&&localStorage[t+"_content"]&&localStorage[t+"_file"]===n};function a(t,a){if(e.localStorage&&e.XMLHttpRequest)n(t,a)?o(localStorage[t+"_content"]):l(t,a);else{var s=r.createElement("link");s.href=a,s.id=t,s.rel="stylesheet",s.type="text/css",r.getElementsByTagName("head")[0].appendChild(s),r.cookie=t}}function l(e,t){var n=new XMLHttpRequest;n.open("GET",t,!0),n.onreadystatechange=function(){4===n.readyState&&200===n.status&&(o(n.responseText),localStorage[e+"_content"]=n.responseText,localStorage[e+"_file"]=t)},n.send()}function o(e){var t=r.createElement("style");t.setAttribute("type","text/css"),r.getElementsByTagName("head")[0].appendChild(t),t.styleSheet?t.styleSheet.cssText=e:t.innerHTML=e}var r=e.document;e.loadCSS=function(e,t,n){var a,l=r.createElement("link");if(t)a=t;else{var o;o=r.querySelectorAll?r.querySelectorAll("style,link[rel=stylesheet],script"):(r.body||r.getElementsByTagName("head")[0]).childNodes,a=o[o.length-1]}var s=r.styleSheets;l.rel="stylesheet",l.href=e,l.media="only x",a.parentNode.insertBefore(l,t?a:a.nextSibling);var c=function(e){for(var t=l.href,n=s.length;n--;)if(s[n].href===t)return e();setTimeout(function(){c(e)})};return l.onloadcssdefined=c,c(function(){l.media=n||"all"}),l},e.loadLocalStorageCSS=function(l,o){n(l,o)||r.cookie.indexOf(l)>-1?a(l,o):t(e,"load",function(){a(l,o)})}}(this);</script>

    <!-- Load Fonts CSS Start -->
    <script>
      loadCSS( "<?=P_ASSETS?>css/fonts.min.css?ver=1.0.0", false, "all" ); // Loading fonts, if the site is located in a subfolder
      //loadLocalStorageCSS( "webfonts", "css/fonts.min.css?ver=1.0.0" ); // Loading fonts, if the site is at the root
    </script>
    <!-- Load Fonts CSS End -->

    <!-- Load Custom CSS Start -->

    <script>loadCSS( "<?=P_ASSETS?>css/main.min.css?ver=1.0.0", false, "all" );</script>
    <!-- Load Custom CSS End -->

    <!-- Load Custom CSS Compiled without JS Start -->
    <noscript>
        <link rel="stylesheet" href="<?=P_ASSETS?>css/fonts.min.css">
        <link rel="stylesheet" href="<?=P_ASSETS?>css/main.min.css">
    </noscript>
    <!-- Load Custom CSS Compiled without JS End -->

    <!-- Custom Browsers Color Start -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#1487bf">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1487bf">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1487bf">
    <!-- Custom Browsers Color End -->
    <?$APPLICATION->ShowHead();?>

</head>

<body>
<?$APPLICATION->ShowPanel()?>
<div class="loader"></div>

<div canvas="container">

    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?$APPLICATION->IncludeComponent("bitrix:menu",
                        "region",
                        Array(
                            "ROOT_MENU_TYPE" => "region",	// Тип меню для первого уровня
                            "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                            "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                            "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                            "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                            "MAX_LEVEL" => "1",	// Уровень вложенности меню
                            "CHILD_MENU_TYPE" => "countries",	// Тип меню для остальных уровней
                            "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "DELAY" => "N",	// Откладывать выполнение шаблона меню
                            "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        ),
                        false
                    );?>
                </div>
                <div class="col-md-6 hidden-xs hidden-sm">
                    <div class="group-box-right">
                        <div class="socki">
                            <ul>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#"></a>
                                </li>
                                <li>
                                    <a href="#"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="search">
                            <span></span>
                            <input id="searchsite" type="text" placeholder="Поиск">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <a href="/" class="hidden-xs">
                            <img src="<?=P_ASSETS?>img/logo.png" alt="«Logistic.ru» - логистика, транспорт, таможня">
                        </a>
                        <a href="/" class="hidden-lg hidden-md hidden-sm">
                            <img src="<?=P_ASSETS?>img/logo-mobile.png" alt="«Logistic.ru» - логистика, транспорт, таможня">
                        </a>
                    </div>
                    <nav class="hidden-xs hidden-sm">
                        <ul>
                            <li class="active"><a href="index.html">Главное</a></li>
                            <li><a href="news.html">Новости</a>
                                <ul class="next_menu">
                                    <li><a href="news.html">Транспорт</a></li>
                                    <li><a href="news.html">Таможня и ФТС</a></li>
                                    <li><a href="news.html">Складная логистика</a></li>
                                    <li><a href="news.html">Экономика и Бизнес</a></li>
                                    <li><a href="news.html">Технологии</a></li>
                                    <li><a href="news.html">Логистика нефти и газа</a></li>
                                    <li><a href="news.html">Хроника катастров</a></li>
                                    <li><a href="news.html">Спецпроекты</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Аналитика</a>
                                <ul class="next_menu">
                                    <li><a href="stat.html">Статьи</a></li>
                                    <li><a href="intervie.html">Интервью</a></li>
                                    <li><a href="doc.html">Акты и документы</a></li>
                                    <li><a href="presrelise.html">Пресс-релизы компании</a></li>
                                </ul>
                            </li>
                            <li><a href="meroprijatij.html">Мероприятия</a></li>
                            <li><a href="stringcompany.html">Каталог Компании</a></li>
                            <li><a href="#">Тренды</a></li>
                        </ul>
                    </nav>
                    <div class="nav_mobile hidden-lg hidden-md">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="85" height="55" viewBox="0 0 85 55">
                            <image width="85" height="55" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFUAAAA3CAMAAABKF/Y5AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAP1BMVEUAAAD///////////////////////////////////////////////////////////////////////////8AAABDBdx4AAAAE3RSTlMAHpbf+/yXRfFEIfCY4fnzR0aVYWau9QAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAB9SURBVFjD7ZVZDoAgDAVfBVxYRO3976qGK7QfJG8OMCEN7QCQJUS1IoVV8LHtZsrBfgC5GEtVS0Y1l6pWNAdrw+lgPZ3e6jPX3M2lPQOX+X+9/zWQpSUzZWpjtwghUyGPYWNjeNhYNpaNZWMJIQOXO+Bys3zuKxvLxk7U2BfmsMjPLBWLqgAAAABJRU5ErkJggg=="/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    Array(
        "AREA_FILE_RECURSIVE" => "N",
        "AREA_FILE_SHOW" => "sect",
        "AREA_FILE_SUFFIX" => "top",
        "EDIT_TEMPLATE" => ""
    )
);?>