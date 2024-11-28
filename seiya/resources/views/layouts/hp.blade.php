<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(session('robots'))
    <meta name="robots" content="{{ session('robots') }}">
    @else
    <meta name="robots" content="{{ session('robots', 'index') }}">
    @endif

    <title>LinkCreativeEncourage</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
     <!-- Scripts -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
        @if(session('created'))
        <div class="alert alert-success">{{session('created')}}</div>
        @endif
</head>

<body class="bg-gray-50 text-gray-900 font-sans antialiased flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-screen bg-black text-white shadow-lg transform -translate-x-full lg:translate-x-0 transition-transform">
        <div class="p-4 flex justify-between items-center">
            <p class="text-lg font-bold">Menu</p>
            <!-- User Info -->
            <div>
                @auth
                <span class="text-sm"><a href="{{ route('profile.edit') }}">{{ Auth::user()->name }}さん</a></span>
                @else
                <a href="{{ route('login') }}" class="text-sm bg-blue-700 px-3 py-1 rounded hover:bg-blue-600">ログイン</a>
                @endauth
            </div>
        </div>

        <!-- Search Bar -->
        <div class="px-4 py-2">
            <form action="" >
                <label for="site-search" class="sr-only">サイト内検索</label>
                <div class="relative">
                    <input type="text" id="site-search" name="query" placeholder="現在ご利用できません"
                        class="w-full px-4 py-2 rounded bg-gray-100 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button type="submit"
                        class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 16l-3.5-3.5M20 20l-5.5-5.5m0 0a6.5 6.5 0 1 1 0-9.182 6.5 6.5 0 0 1 0 9.182z" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>

        <nav>
            <ul class="space-y-4 px-4">
                <li><a href="{{ route('blog') }}" class="block hover:bg-blue-700 p-2 rounded">学習</a></li>
                <li><a href="{{ route('Board') }}" class="block hover:bg-blue-700 p-2 rounded">小さな成功掲示板</a></li>
                <li><a href="{{ route('question') }}" class="block hover:bg-blue-700 p-2 rounded">Q&A</a></li>
                <li><a href="{{ route('foam') }}" class="block hover:bg-blue-700 p-2 rounded">お問い合わせ</a></li>
                <li><a href="{{ route('site') }}" class="block hover:bg-blue-700 p-2 rounded">サイトについて</a></li>
                @can('admin')
                <li><a href="{{ route('posts.index') }}" class="block hover:bg-blue-700 p-2 rounded">(管理）記事一覧</a></li>
                <li><a href="{{ route('posts.create') }}" class="block hover:bg-blue-700 p-2 rounded">(管理）記事投稿</a></li>
                @endcan
            </ul>
        </nav>
        <footer class="p-4 text-sm text-center">
            &copy; 2024 LCE
        </footer>
    </aside>

    <!-- Main Content -->
    <div class="flex-grow lg:ml-64">
        <!-- Header -->
        <header class="bg-black shadow-md py-4">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-white">LinkCreativeEncourage</h1>
                <!-- Hamburger Menu -->
                <button id="hamburger" class="text-blue-600 focus:outline-none lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-black text-white py-6">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; 2024 LinkCreativeEncourage. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Script for sidebar toggle -->
    <script>
        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
        //サマーノート
        jQuery(document).ready(function($) {
            $('#summernote').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 500,
                callbacks: 
                {
                    onImageUpload : function(files, editor, welEditable) 
                    {
                        for(var i = files.length - 1; i >= 0; i--) 
                        {
                            sendFile(files[i], this);
                        }
                    }
                } 
            });
            function sendFile(file, el) {
                var form_data = new FormData();
                form_data.append('file', file);
                        $.ajax({
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            data: form_data,
                            type: "POST",
                            contentType: false,
                            url:  'temp',
                            cache: false,
                            processData: false,
                            success: function (url) {
                                $(el).summernote('editor.insertImage', url);
                            },
                        });
            }
        });
    </script>
</body>



</html>
