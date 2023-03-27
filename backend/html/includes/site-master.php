<?php

    $page = substr(basename($_SERVER['PHP_SELF']), 0, -4);

    if ($_SERVER['HTTP_HOST'] != 'localhost') {

        $baseurl = "http://herosolutions.com.pk/breera/v-s-honey/";

    } else {

        $baseurl = "http://localhost/work/v-s-honey/";

    }

?>



<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="title" content="V & S">
<meta name="description" content="V & S">
<meta property="og:type" content="website">
<meta property="og:url" content="<?= $baseurl ?>">
<meta property="og:title" content="V & S">
<meta property="og:description" content="V & S">
<meta property="og:image" content="<?= $baseurl ?>images/logo.png">
<meta property="twitter:card" content="thumbnail">
<meta property="twitter:url" content="<?= $baseurl ?>">
<meta property="twitter:title" content="V & S">
<meta property="twitter:description" content="V & S">
<meta property="twitter:image" content="<?= $baseurl ?>images/logo.png">

<!-- Css files -->

<!-- Bootstrap Css -->

<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/bootstrap.min.css">

<!-- Main Css -->

<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/mycss.css?v=0.1">
<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/dashboard.css?v=0.2">
<!-- Media-Query Css -->

<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/responsive.css?v=0.2">

<!-- commonCss Css -->
<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/lightgallery.min.css">
<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/uicons-regular-rounded.css">

<link type="text/css" rel="stylesheet" href="<?= $baseurl ?>css/commonCss.css">

<!-- Favicon -->

<!-- <link type="image/png" rel="icon" href="<?= $baseurl ?>images/favicon.png"> -->

