<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" class="bg-template dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-[#f9fafb]">
        <div class="min-h-screen font-Vazir text-gray-900 antialiased dark:bg-gray-700">
        <x-navbar></x-navbar>
           <div class="container mx-auto">
             {{ $slot }}
           </div>
        </div>
    </body>


    <script src="{{asset('js/swiper-bundle.min.js')}}"></script>

    <script>
      var swiper = new Swiper(".firstSwiper", {
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 1,
            spaceBetween: 20
          },
          480: {
            slidesPerView: 2,
            spaceBetween: 30
          },
          // when window width is >= 768
          768: {
            slidesPerView: 2,
            spaceBetween: 40
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 40
          },
          1248: {
            slidesPerView: 4,
            spaceBetween: 40
          },
        }
      });


    </script>
</html>