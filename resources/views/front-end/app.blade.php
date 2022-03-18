<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-site-verification" content="lmLB5Ar4e2H6Od0SjDwAwY_iorn1E9J1k4HT5XEfwbQ" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta property="og:type" content="image">
	<meta property="og:title" content="Bách Diệp Trà Sen">
	<meta property="og:url" content="www.bachdieptra.com">
	<meta property="og:description" content="Với mong muốn được chia sẻ những câu chuyện buồn vui giản dị bên ấm trà nóng thơm nồng vị Sen Tây Hồ, chúng tôi tạo ra một món quà đậm sắc vị Hà Thành với Sen Tây Hồ kết hợp với Trà Thái Nguyên hảo hạng, để tạo thành một đặc phẩm Bách Diệp Trà Sen.">
	<meta property="og:image" content="{{ asset('images/logo.png') }}">
	<meta property="og:site_name" content="Bachdieptra">
    <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myStyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/myScript.js') }}"></script>
    <script src="https://kit.fontawesome.com/732f1c5837.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <title>Bách Diệp Trà Sen</title>
</head>
<body>
    @include('front-end.components.header')
    @yield('content')
    @include('front-end.components.footer')
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61de8c7df7cf527e84d1b37c/1fp6l9j59';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>
