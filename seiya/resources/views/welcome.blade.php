<x-hp-layout>
    <!-- About Section -->
    <div class="content" id="about">
        <div class="text-center mb-16"> <!-- Increased bottom margin -->
            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-800">About</h2>
            <p class="text-gray-600 mt-2 text-base sm:text-lg">～私たちについて～</p>
        </div>
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 mt-16"> <!-- Increased top margin -->
            <div class="w-full lg:w-1/2 max-w-xl mx-auto">
                <img src="{{ asset('images/20230727_044308398_iOS.jpg') }}" alt="About Image" class="w-full h-auto rounded-lg shadow-xl">
            </div>
            <div class="w-full lg:w-1/2 lg:pl-10">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-6">経歴 & スキル</h3>
                <p class="text-gray-600 text-base sm:text-lg leading-relaxed">
                    【経歴】<br>
                    2020年3月　高校を卒業<br>
                    2020年4月～2024年4月　営業職<br>
                    2024年1月～現在　映像制作・web制作・ProPro運営<br><br>
                    【スキル】<br>
                    PremierePro<br>
                    PhotoShop<br>
                    html・css<br>
                    Javascript<br>
                    ライブラリー：jQuery<br>
                    php<br>
                    フレームワーク：laravel<br><br>
                    【稼働時間】<br>
                    平日 8:00～23:00<br>
                    土日祝 21:00～24:00
                </p>
            </div>
        </div>
    </div>

    <!-- Business Section -->
    <div class="content" id="business">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-800">Business</h2>
            <p class="text-gray-600 mt-2 text-base sm:text-lg">～LCEで行っている事業を紹介～</p>
        </div>
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16 px-4 sm:px-6 lg:px-8 mb-16"> <!-- Added padding to sides and bottom margin -->
            <!-- First Business Section -->
            <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-lg mb-8 lg:mb-0">
                <h5 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">システム開発＆web制作</h5>
                <p class="text-gray-600 text-base sm:text-lg mb-4">
                    私たちが得意としているlaravelを利用しホームページ制作～システム開発・業務効率化システムを開発することが可能です！
                    料金の見積もりのご依頼は下記のお問い合わせからお願いします
                </p>
                <a href="#contact" class="text-blue-500 hover:text-blue-700 text-base sm:text-lg mt-4 inline-block">お問い合わせ</a>
            </div>
    
            <!-- Second Business Section -->
            <div class="w-full lg:w-1/2 bg-white p-6 rounded-lg shadow-lg mb-8 lg:mb-0">
                <h5 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-4">ProPro</h5>
                <p class="text-gray-600 text-base sm:text-lg mb-4">
                    1から学べるプログラミング教室を運営しております。現役のエンジニアから実際の工程通りに学ぶことができ、最終目標を転職の際に見劣りしないポートフォリオを作るのが目標となっております。
                </p>
                <a href="https://kindnesshumor.com/?p=4688" class="text-blue-500 hover:text-blue-700 text-base sm:text-lg mt-4 inline-block">詳細はこちら</a>
            </div>
        </div>
    </div>
    

    <!-- Blog Section -->
    <div class="content" id="works">
        <div class="text-center mb-16"> <!-- Increased bottom margin -->
            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-800">Blog</h2>
            <p class="text-gray-600 mt-2 text-base sm:text-lg">～skillや実績を紹介～</p>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16"> <!-- Added bottom margin -->
            <div class="space-y-8">
                @foreach ($article->take(5) as $articles)
                    <div class="flex flex-col lg:flex-row bg-white rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300 mb-8"> <!-- Added bottom margin -->
                        <img src="{{ asset('storage/images/'.$articles->image) }}" alt="Article Image" class="w-full lg:w-1/3 h-64 lg:h-64 object-cover rounded-t-lg lg:rounded-l-lg lg:rounded-t-none">
                        <div class="p-6 flex flex-col justify-between w-full lg:w-2/3">
                            <div>
                                <a href="{{ route('show', $articles) }}" class="text-blue-500 hover:text-blue-700 text-base sm:text-lg font-semibold">
                                    <h3 class="text-2xl text-gray-800 hover:underline cursor-pointer">{{$articles->title}}</h3>
                                </a>
                                <p class="text-gray-600 text-sm sm:text-base mt-2">Last updated: {{$articles->updated_at->format('M d, Y')}}</p>
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-700 text-base sm:text-lg lg:text-lg line-clamp-3">
                                    {{$articles->description}}
                                </p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('blog') }}" class="text-blue-500 hover:text-blue-700 text-base sm:text-lg">ブログ一覧</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Contact Section -->
    <div class="content" id="contact">
        <div class="text-center mb-16"> <!-- Increased bottom margin -->
            <h2 class="text-3xl sm:text-4xl font-semibold text-gray-800">Contact</h2>
            <p class="text-gray-600 mt-2 text-base sm:text-lg">すこしでも興味を持ってくれた人はこちらから</p>
        </div>
        <div class="contact-form max-w-4xl mx-auto mb-16"> <!-- Added bottom margin -->
            <form method="post" action="{{route('contact')}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col gap-8">
                    <div>
                        <label for="title" class="font-semibold leading-none text-lg sm:text-xl">件名</label>
                        <input type="text" name="title" class="w-full py-3 placeholder-gray-300 border border-gray-300 rounded-md text-lg sm:text-xl" id="title" value="{{old('title')}}" placeholder="Enter Title">
                    </div>
                    <div>
                        <label for="name" class="font-semibold leading-none text-lg sm:text-xl">名前</label>
                        <input type="text" name="name" class="w-full py-3 placeholder-gray-300 border border-gray-300 rounded-md text-lg sm:text-xl" id="name" value="{{old('name')}}" placeholder="Enter Name">
                    </div>
                    <div>
                        <label for="email" class="font-semibold leading-none text-lg sm:text-xl">メールアドレス</label>
                        <input type="text" name="email" class="w-full py-3 placeholder-gray-300 border border-gray-300 rounded-md text-lg sm:text-xl" id="email" value="{{old('email')}}" placeholder="Enter Email">
                    </div>
                    <div>
                        <label for="body" class="font-semibold leading-none text-lg sm:text-xl">本文</label>
                        <textarea name="body" class="w-full py-3 border border-gray-300 rounded-md text-lg sm:text-xl" id="body" cols="30" rows="6">{{old('body')}}</textarea>
                    </div>
                    <div class="mt-6 text-center">
                        <x-primary-button class="w-full sm:w-auto py-2 text-base sm:py-4 sm:text-xl">
                            送信する
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div
</x-hp-layout>