<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('client/assets/images/favicon.jpg') }}" rel="shortcut icon" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('client/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/fontawesome-free-5.15.4-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('client/assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">

    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}">


    <title>@yield('title')</title>
    <meta name="description" content="@yield('desc')">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:site_name" content="{{ $options['site_name'] }}">
    <link rel="canonical" href="@yield('canonical')">
    <meta property="og:description" content="@yield('og-desc')">
    <meta property="og:type" content="@yield('og-type')">
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:url" content="@yield('og-url')">
    <meta property="article:modified_time" content="@yield('article-modified_time')">
    <meta property="og:image" content="@yield('og-image')">



</head>
