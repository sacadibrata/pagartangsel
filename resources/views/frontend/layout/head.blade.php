<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">

    <title>PAGAR TANGSEL | {{ $title }}</title>

    <link href="{{ asset('dist/assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/libs/slick-carousel/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/libs/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dist/assets/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    <link href="{{ asset('dist/assets/libs/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/theme.min.css') }}">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google tag (gtag.js) -->

    <!-- End Tag -->
    <style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 400px;
			width: 600px;
			max-width: 100%;
			max-height: 100%;
		}

        .cloud-animation {
            position: relative;
            background: url('{{ asset('dist/assets/images/banner/bg2.png') }}');
            height: 50vh;
            animation: moveCloud 23s linear infinite; /* Ubah durasi dan efek animasi sesuai kebutuhan */
            background-size: cover;
            background-repeat: repeat-x;

        }

        body {
            background: url('{{ asset('dist/assets/images/svg-graphics/pattern.svg') }}');
            background-size : contain;
            background-color : #a0fde2;
        }

        .mobil {
            position: absolute;
            bottom: 0;
            height: 10;
            z-index: 2;
            margin-left: 20px;
        }

        @keyframes moveCloud {
            from {
                background-position: 0 0;
            } to {
                background-position: 100% 0;
            }
        }

        .preload-animation {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            border: 5px solid #ccc;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

	</style>

</head>
<body>
