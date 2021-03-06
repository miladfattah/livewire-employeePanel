<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />



        
        <div class="max-w-sm mx-auto px-6 mb-5">
            <div class="relative flex flex-wrap">
              <div class="w-full relative">
                <div class="mt-6">
                  <div class="text-center font-semibold text-black">
                      استخدام شو بهترین  برای شما
                  </div>
                 
                  <form class="mt-8" method="POST" action="{{ route('register') }}">
                  @csrf
                    <div class="mx-auto max-w-lg">

                      <div class="py-2">
                        <span class="px-1 text-sm text-gray-600">نام کاربری</span>
                        <input  type="text" name="username" :value="old('username')" required
                          class="text-md block px-3 py-2  rounded-lg w-full 
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                      </div>

                      <div class="py-2">
                        <span class="px-1 text-sm text-gray-600">نام</span>
                        <input  type="text" name="first_name" :value="old('first_name')" required
                          class="text-md block px-3 py-2  rounded-lg w-full 
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                      </div>

                      <div class="py-2">
                        <span class="px-1 text-sm text-gray-600">نام خانوادگی</span>
                        <input  type="text" name="last_name" :value="old('last_name')" required
                          class="text-md block px-3 py-2  rounded-lg w-full 
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                      </div>

                      <div class="py-2">
                        <span class="px-1 text-sm text-gray-600">ایمیل</span>
                        <input  type="email" name="email" :value="old('email')" required
                          class="text-md block px-3 py-2  rounded-lg w-full 
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md focus:placeholder-gray-500 focus:bg-white focus:border-gray-600 focus:outline-none">
                      </div>

                      <div class="py-2" x-data="{ show: true }">
                        <span class="px-1 text-sm text-gray-600">رمز عبور</span>
                        <div class="relative">
                          <input  :type="show ? 'password' : 'text'" name="password" required  class="text-md block px-3 py-2 rounded-lg w-full 
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                        focus:placeholder-gray-500
                        focus:bg-white 
                        focus:border-gray-600  
                        focus:outline-none">
                          <div class="absolute inset-y-0 left-5 pr-3 flex items-center text-sm leading-5">
        
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                              :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                              viewbox="0 0 576 512">
                              <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                              </path>
                            </svg>
        
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                              :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                              viewbox="0 0 640 512">
                              <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                              </path>
                            </svg>
        
                          </div>
                        </div>
                      </div>

                      <div class="py-2" x-data="{ show: true }">
                        <span class="px-1 text-sm text-gray-600">تکرار عبور</span>
                        <div class="relative">
                          <input  :type="show ? 'password' : 'text'" name="password_confirmation" required  class="text-md block px-3 py-2 rounded-lg w-full 
                        bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                        focus:placeholder-gray-500
                        focus:bg-white 
                        focus:border-gray-600  
                        focus:outline-none">
                          <div class="absolute inset-y-0 left-5 pr-3 flex items-center text-sm leading-5">
        
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                              :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                              viewbox="0 0 576 512">
                              <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                              </path>
                            </svg>
        
                            <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                              :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                              viewbox="0 0 640 512">
                              <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                              </path>
                            </svg>
        
                          </div>
                        </div>
                      </div>

                      <div class="flex justify-between">
                          <label class="block text-gray-500 font-bold my-4"> 
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('آیا قبلا ثبت نام کرده اید ؟') }}
                            </a>
                          </label>
                      </div> 

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>
            
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                         @endif
                      <button type="submit" class="mt-3 text-lg font-semibold 
                        bg-gray-800 w-full text-white rounded-lg
                        px-6 py-3 block shadow-xl hover:text-white hover:bg-black">
                        ثبت نام
                      </button>
                    </div>
                  </form>
               
                </div>
              </div>
            </div>
          </div>


































        {{-- <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-col md:flex-row justify-between items-center md:gap-x-4">
                <div>
                    <x-jet-label for="username" value="{{ __('نام کاربری') }}" />
                    <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                </div>
    
                <div class="mt-4 md:mt-0">
                    <x-jet-label for="first_name" value="{{ __('نام') }}" />
                    <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('نام خانوادگی') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('ایمیل') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('رمز عبور') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('تکرار رمز عبور') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('آیا قبلا ثبت نام کرده اید ؟?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('ثبت نام') }}
                </x-jet-button>
            </div>
        </form> --}}
    </x-jet-authentication-card>
</x-guest-layout>
