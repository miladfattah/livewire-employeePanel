<div class="w-full text-gray-700 bg-white dark:text-gray-200 dark:bg-gray-800">
    <div x-data="{ open: false }" class="flex flex-col md:flex-row-reverse max-w-screen-xl px-4 mx-auto  md:items-center md:justify-between  md:px-6 lg:px-8">
        <div class="flex flex-row items-center justify-between p-4">
            <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="/" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">استخدام شو</a>
        </div>
        {{-- <livewire:search-post /> --}}
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row">
            <a class="px-4 py-2 mt-2 text-sm font-semibold {{ request()->routeIs('home') ? 'text-gray-900 bg-gray-200' : ' bg-transparent ' }} rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/">صفحه اصلی</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold {{ request()->routeIs('article.index') ? 'text-gray-900 bg-gray-200' : ' bg-transparent ' }} rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('article.index')}}">مقالات</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold {{ request()->routeIs('about.index') ? 'text-gray-900 bg-gray-200' : ' bg-transparent ' }} rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('about.index')}}">درباره ما</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold {{ request()->routeIs('contact.index') ? 'text-gray-900 bg-gray-200' : ' bg-transparent ' }} rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{route('contact.index')}}">تماس‌باما</a>
            @auth
            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('dashboard') }}">داشبورد</a>
            @else
            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('login') }}">ورود</a>
            @endauth
        </nav>
    </div>
</div>