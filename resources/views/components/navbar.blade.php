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
            <a href="/login" class="text-yellow-700 bg-yellow-300 bg-opacity-0 hover:bg-opacity-80 transition duration-200 hover:text-white font-medium sm:text-base text-xs inline-flex items-center rounded-lg h-10 pr-3 -ml-3 pl-6">
                <span class="sm:inline-block hidden">
                  ورود
                </span>
                <span class="mr-1">
                  <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.4" d="M6.67065 6.4847C6.67065 4.27199 8.53019 2.47095 10.8157 2.47095H15.3587C17.6387 2.47095 19.4935 4.26748 19.4935 6.47567V16.5109C19.4935 18.7246 17.6349 20.5265 15.3494 20.5265H10.8064C8.52646 20.5265 6.67065 18.7291 6.67065 16.52V15.6714V6.4847Z" fill="currentColor"></path>
                    <path d="M14.5621 11.0056L11.8827 8.37941C11.6058 8.10858 11.1602 8.10858 10.8841 8.38122C10.6091 8.65386 10.61 9.09351 10.886 9.36434L12.3531 10.8025H3.04688C2.65717 10.8025 2.34082 11.1139 2.34082 11.4985C2.34082 11.8822 2.65717 12.1927 3.04688 12.1927H12.3531L10.886 13.6318C10.61 13.9026 10.6091 14.3423 10.8841 14.6149C11.0226 14.7512 11.2033 14.8198 11.3848 14.8198C11.5645 14.8198 11.7452 14.7512 11.8827 14.6167L14.5621 11.9905C14.695 11.8596 14.7702 11.6827 14.7702 11.4985C14.7702 11.3134 14.695 11.1365 14.5621 11.0056Z" fill="currentColor"></path>
                  </svg>
                </span>
              </a>
              <a href="/register" class="sm:inline-flex hidden bg-yellow-300 text-white hover:opacity-80  duration-75 font-medium sm:text-base text-xs items-center rounded-lg h-10 px-3 ">
                <span>
                    عضویت
                </span>
                <span class="mr-1">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4" d="M19.3827 8.78099H18.2966V7.71911C18.2966 7.26576 17.933 6.89612 17.485 6.89612C17.0379 6.89612 16.6734 7.26576 16.6734 7.71911V8.78099H15.5892C15.1412 8.78099 14.7776 9.15063 14.7776 9.60398C14.7776 10.0573 15.1412 10.427 15.5892 10.427H16.6734V11.4898C16.6734 11.9431 17.0379 12.3128 17.485 12.3128C17.933 12.3128 18.2966 11.9431 18.2966 11.4898V10.427H19.3827C19.8297 10.427 20.1943 10.0573 20.1943 9.60398C20.1943 9.15063 19.8297 8.78099 19.3827 8.78099" fill="currentColor"></path>
                        <path d="M8.90975 13.681C5.25731 13.681 2.13892 14.265 2.13892 16.598C2.13892 18.9301 5.23834 19.5351 8.90975 19.5351C12.5613 19.5351 15.6806 18.9511 15.6806 16.6181C15.6806 14.2851 12.5812 13.681 8.90975 13.681" fill="currentColor"></path>
                        <path opacity="0.4" d="M8.90984 11.459C11.3966 11.459 13.39 9.43996 13.39 6.92114C13.39 4.40232 11.3966 2.38232 8.90984 2.38232C6.42308 2.38232 4.42969 4.40232 4.42969 6.92114C4.42969 9.43996 6.42308 11.459 8.90984 11.459" fill="currentColor"></path>
                    </svg>
                </span>
            </a>
            @endauth
        </nav>
    </div>
</div>