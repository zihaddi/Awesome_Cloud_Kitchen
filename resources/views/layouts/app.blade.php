<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head >
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
        <link rel="stylesheet" href={{ asset('css/app.css') }}>
        <link rel="stylesheet" href={{ asset('js/app.js') }}>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
         

            <!-- Page Content -->
            <main>
                {{ $slot }}  
            </main>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <footer class="footer p-10 bg-base-200 text-base-content">
                <div>
                  <span class="footer-title">Services</span> 
                  <a class="link link-hover">Branding</a> 
                  <a class="link link-hover">Design</a> 
                  <a class="link link-hover">Marketing</a> 
                  <a class="link link-hover">Advertisement</a>
                </div> 
                <div>
                  <span class="footer-title">Company</span> 
                  <a class="link link-hover">About us</a> 
                  <a class="link link-hover">Contact</a> 
                  <a class="link link-hover">Jobs</a> 
                  <a class="link link-hover">Press kit</a>
                </div> 
                <div>
                  <span class="footer-title">Legal</span> 
                  <a class="link link-hover">Terms of use</a> 
                  <a class="link link-hover">Privacy policy</a> 
                  <a class="link link-hover">Cookie policy</a>
                </div> 
                <div>
                  <span class="footer-title">Newsletter</span> 
                  <div class="form-control w-80">
                    <label class="label">
                      <span class="label-text">Enter your email address</span>
                    </label> 
                    <div class="relative">
                      <input type="text" placeholder="username@site.com" class="input input-bordered w-full pr-16" /> 
                      <button class="btn btn-primary absolute top-0 right-0 rounded-l-none">Subscribe</button>
                    </div>
                  </div>
                </div>
              </footer>
        </div>
    </body>
</html>
