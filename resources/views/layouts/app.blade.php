<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
   
    </head>
    <body>
    <x-jet-banner />
    <div x-data="{ isOpen: false }" class="flex h-screen bg-gray-50 dark:bg-gray-900">
      <!-- Desktop sidebar -->
      <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a href="/" class="mr-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#" >
                استخدام شو
            </a>
            <ul class="mt-6">
                <li class="relative px-6 py-3">
                    <span
                    class="absolute inset-y-0 right-0 w-1 bg-purple-600 rounded-tl-lg rounded-bl-lg"
                    aria-hidden="true"
                    ></span>
                    <a
                    class="inline-flex items-center w-full text-sm font-semibold  {{ request()->routeIs('dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                    href="{{route('dashboard')}}"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">  <g transform="matrix(1.7142857142857142,0,0,1.7142857142857142,0,0)"><g>    <rect x="8.5" y="6.5" width="5" height="7" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>    <rect x="8.5" y="0.5" width="5" height="3.01" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>    <rect x="0.5" y="0.5" width="5" height="7" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>    <rect x="0.5" y="10.49" width="5" height="3.01" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>  </g></g></svg>
                    <span class="mr-4">داشبورد</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('panel.users.index') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{route('panel.users.index')}}"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" class="w-5 h-5">
    
                      <g transform="matrix(1.0714285714285714,0,0,1.0714285714285714,0,0)"><g>
                        <circle cx="5" cy="2.75" r="2.25" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></circle>
                        <path d="M4.5,12.5H.5V11A4.51,4.51,0,0,1,7,7" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                        <line x1="10.5" y1="7.5" x2="10.5" y2="13.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                        <line x1="7.5" y1="10.5" x2="13.5" y2="10.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                      </g></g></svg>
                      <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <span class="mr-4">کاربران</span>
                </a>
             
                <li class="relative px-6 py-3" x-data="{isPagesMenuOpen : false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    aria-haspopup="true"
                    @click="isPagesMenuOpen = ! isPagesMenuOpen"
                >
                    <span class="inline-flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 15 15">
                        <g transform="matrix(1.0714285714285714,0,0,1.0714285714285714,0,0)"><g>
                            <path d="M7.47,6.9a1.18,1.18,0,0,1-.94,0L.83,4.26a.56.56,0,0,1,0-1L6.53.6a1.18,1.18,0,0,1,.94,0l5.7,2.64a.56.56,0,0,1,0,1Z" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                            <path d="M13.5,7.35,7.4,10.16a1,1,0,0,1-.83,0L.5,7.35" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                            <path d="M13.5,10.6,7.4,13.41a1,1,0,0,1-.83,0L.5,10.6" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                          </g></g>
                      </svg>
                    <span class="mr-4">تنظیمات ادمین</span>
                    </span>
                    <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    >
                    <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    ></path>
                    </svg>
                </button>
                <template x-if="isPagesMenuOpen">
                    <ul
                    x-transition:enter="transition-all ease-in-out duration-300"
                    x-transition:enter-start="opacity-25 max-h-0"
                    x-transition:enter-end="opacity-100 max-h-xl"
                    x-transition:leave="transition-all ease-in-out duration-300"
                    x-transition:leave-start="opacity-100 max-h-xl"
                    x-transition:leave-end="opacity-0 max-h-0"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                    aria-label="submenu"
                    >
                      <li  class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                          <a class="w-full {{request()->routeIs('panel.countries.index') ? 'text-gray-800' : ''}}" href="{{route('panel.countries.index')}}">کشور</a>
                      </li>
                      <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                          <a class="w-full {{request()->routeIs('panel.states.index') ? 'text-gray-800' : ''}}" href="{{route('panel.states.index')}}">استان</a>
                      </li>
                      <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                          <a class="w-full {{request()->routeIs('panel.cities.index') ? 'text-gray-800' : ''}}" href="{{route('panel.cities.index')}}">شهر</a>
                      </li>
                      <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                          <a class="w-full {{request()->routeIs('panel.departments.index') ? 'text-gray-800' : ''}}" href="{{route('panel.departments.index')}}">حوزه</a>
                      </li>
                    </ul>
                </template>
                </li>
            </ul>
            <div class="px-6 my-6">
                <a 
                href="{{route('panel.job.index')}}"
                class="mb-3 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  ثبت آگهی
                <span class="ml-2" aria-hidden="true">+</span>
                </a>
                <a 
                href=""
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  درخواست شغل
                <span class="ml-2" aria-hidden="true">+</span>
                </a>
            </div>
         </div>
      </aside>
      <!-- Mobile sidebar -->
   
    
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="isOpen= !isOpen"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <input
                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text"
                    placeholder="حستوحو"
                    aria-label="Search"
                />
                <div class="absolute left-0 inset-y-0 flex items-center pl-2">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                  <x-jet-dropdown align="left" width="48">
                      <x-slot name="trigger">
                          @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                              <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                  <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                              </button>
                          @else
                              <span class="inline-flex rounded-md">
                                  <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                      {{ Auth::user()->name }}

                                      <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                      </svg>
                                  </button>
                              </span>
                          @endif
                      </x-slot>

                      <x-slot name="content">
                          <!-- Account Management -->
                          <div class="block px-4 py-2 text-xs text-gray-400">
                              {{ __('Manage Account') }}
                          </div>

                          <x-jet-dropdown-link href="{{ route('profile.show') }}">
                              {{ __('Profile') }}
                          </x-jet-dropdown-link>

                          @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                              <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                  {{ __('API Tokens') }}
                              </x-jet-dropdown-link>
                          @endif

                          <div class="border-t border-gray-100"></div>

                          <!-- Authentication -->
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf

                              <x-jet-dropdown-link href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                              this.closest('form').submit();">
                                  {{ __('Log Out') }}
                              </x-jet-dropdown-link>
                          </form>
                      </x-slot>
                  </x-jet-dropdown>
              </div>
            </ul>
          </div>

        </header>
        <aside  x-show="isOpen" @click.outside="isOpen = false" class="z-50 w-100  md:hidden bg-white " >
            <div class="py-4 text-gray-500 dark:text-gray-400">
              <a href="/" class="mr-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#" >
                استخدام شو
              </a>
              <ul class="mt-6">
                  <li class="relative px-6 py-3">
                      <span
                      class="absolute inset-y-0 right-0 w-1 bg-purple-600 rounded-tl-lg rounded-bl-lg"
                      aria-hidden="true"
                      ></span>
                      <a
                      class="inline-flex items-center w-full text-sm font-semibold  {{ request()->routeIs('dashboard') ? 'text-gray-800' : '' }} transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                      href="{{route('dashboard')}}"
                      >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">  <g transform="matrix(1.7142857142857142,0,0,1.7142857142857142,0,0)"><g>    <rect x="8.5" y="6.5" width="5" height="7" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>    <rect x="8.5" y="0.5" width="5" height="3.01" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>    <rect x="0.5" y="0.5" width="5" height="7" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>    <rect x="0.5" y="10.49" width="5" height="3.01" rx="0.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></rect>  </g></g></svg>
                      <span class="mr-4">داشبورد</span>
                      </a>
                  </li>
              </ul>
              <ul>
                  <li class="relative px-6 py-3">
                  <a
                      class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs('panel.users.index') ? 'text-gray-800' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{route('panel.users.index')}}"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" class="w-5 h-5">
      
                        <g transform="matrix(1.0714285714285714,0,0,1.0714285714285714,0,0)"><g>
                          <circle cx="5" cy="2.75" r="2.25" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></circle>
                          <path d="M4.5,12.5H.5V11A4.51,4.51,0,0,1,7,7" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                          <line x1="10.5" y1="7.5" x2="10.5" y2="13.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                          <line x1="7.5" y1="10.5" x2="13.5" y2="10.5" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></line>
                        </g></g></svg>
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                      </svg>
                      <span class="mr-4">کاربران</span>
                  </a>
              
                  <li class="relative px-6 py-3" x-data="{isPagesMenuOpen : false }">
                  <button
                      class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      aria-haspopup="true"
                      @click="isPagesMenuOpen = ! isPagesMenuOpen"
                  >
                      <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 15 15">
                          <g transform="matrix(1.0714285714285714,0,0,1.0714285714285714,0,0)"><g>
                              <path d="M7.47,6.9a1.18,1.18,0,0,1-.94,0L.83,4.26a.56.56,0,0,1,0-1L6.53.6a1.18,1.18,0,0,1,.94,0l5.7,2.64a.56.56,0,0,1,0,1Z" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                              <path d="M13.5,7.35,7.4,10.16a1,1,0,0,1-.83,0L.5,7.35" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                              <path d="M13.5,10.6,7.4,13.41a1,1,0,0,1-.83,0L.5,10.6" style="fill: none;stroke: #000000;stroke-linecap: round;stroke-linejoin: round"></path>
                            </g></g>
                        </svg>
                      <span class="mr-4">تنظیمات ادمین</span>
                      </span>
                      <svg
                      class="w-4 h-4"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      >
                      <path
                          fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                      ></path>
                      </svg>
                  </button>
                  <template x-if="isPagesMenuOpen">
                      <ul
                      x-transition:enter="transition-all ease-in-out duration-300"
                      x-transition:enter-start="opacity-25 max-h-0"
                      x-transition:enter-end="opacity-100 max-h-xl"
                      x-transition:leave="transition-all ease-in-out duration-300"
                      x-transition:leave-start="opacity-100 max-h-xl"
                      x-transition:leave-end="opacity-0 max-h-0"
                      class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                      aria-label="submenu"
                      >
                        <li  class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full {{request()->routeIs('panel.countries.index') ? 'text-gray-800' : ''}}" href="{{route('panel.countries.index')}}">کشور</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full {{request()->routeIs('panel.states.index') ? 'text-gray-800' : ''}}" href="{{route('panel.states.index')}}">استان</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full {{request()->routeIs('panel.cities.index') ? 'text-gray-800' : ''}}" href="{{route('panel.cities.index')}}">شهر</a>
                        </li>
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full {{request()->routeIs('panel.departments.index') ? 'text-gray-800' : ''}}" href="{{route('panel.departments.index')}}">حوزه</a>
                        </li>
                      </ul>
                  </template>
                  </li>
              </ul>
              <div class="px-6 my-6">
                <a 
                href="{{route('panel.job.index')}}"
                class="mb-3 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  ثبت آگهی
                <span class="ml-2" aria-hidden="true">+</span>
                </a>
                <a 
                href=""
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                  درخواست شغل
                <span class="ml-2" aria-hidden="true">+</span>
                </a>
              </div>
            </div>
          </aside>
        <main class="h-full overflow-y-auto custom-shadow ">
            {{$slot}}
        </main>
      </div>
    </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
