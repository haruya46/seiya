<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LinkCreativeEncourage</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @hasSection('description')
    <meta name="description" content="@yield('description')">
    @else
        <meta name="description" content="動画編集を依頼するならLCE 個人事業主の特権でどこよりもローコストで出来ます！まずはお問い合わせ！">
    @endif
    <script>
        (function(d) {
            var config = {
                    kitId: 'diq2pfe',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement,
                t = setTimeout(function() {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout),
                tk = d.createElement("script"),
                f = false,
                s = d.getElementsByTagName("script")[0],
                a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {}
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3X6XFYD0WP"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){
            w[l]=w[l]||[];
            w[l].push({'gtm.start': new Date().getTime(), event:'gtm.js'});
            var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),
                dl=l!='dataLayer'?'&l='+l:'';
            j.async=true;
            j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
            f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TVB6F599');
    </script>
    <!-- End Google Tag Manager -->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-3X6XFYD0WP');
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TVB6F599"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- Logo / Title -->
            <h1 class="text-2xl sm:text-xl font-semibold text-blue-600">LinkCreativeEncourage</h1>
            
            <!-- Mobile Hamburger Menu -->
            <div class="lg:hidden">
                <button id="hamburger" class="text-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="hidden lg:flex space-x-6 text-lg">
                <ul class="flex space-x-6">
                    <li><a href="{{ route('welcome') }}" class="hover:text-blue-500">Home</a></li>
                    <li><a href="{{ url('/#about') }}" class="hover:text-blue-500">About</a></li>
                    <li><a href="{{ url('/#business') }}" class="hover:text-blue-500">Business</a></li>
                    <li><a href="{{ route('blog') }}" class="hover:text-blue-500">Blog</a></li>
                    <li><a href="{{ url('/#contact') }}" class="hover:text-blue-500">Contact</a></li>
                </ul>
            </nav>

            <!-- Mobile Menu (Hidden by default) -->
            <div id="mobile-menu" class="lg:hidden absolute top-16 right-4 bg-white shadow-lg rounded-md w-40 space-y-4 p-4 hidden">
                <ul class="space-y-4 text-lg">
                    <li><a href="{{ route('welcome') }}" class="hover:text-blue-500">Home</a></li>
                    <li><a href="{{ url('/#about') }}" class="hover:text-blue-500">About</a></li>
                    <li><a href="{{ url('/#business') }}" class="hover:text-blue-500">Business</a></li>
                    <li><a href="{{ route('blog') }}" class="hover:text-blue-500">Blog</a></li>
                    <li><a href="{{ url('/#contact') }}" class="hover:text-blue-500">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="py-12">
        {{ $slot }}
    </main>

    <!-- Footer (optional) -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 LinkCreativeEncourage. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle mobile menu visibility
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobile-menu');
        
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
