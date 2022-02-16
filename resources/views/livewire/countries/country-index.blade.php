<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      کشور ها
    </h2>

    <div class="flex items-center justify-start">
        <x-jet-button class="ml-4" wire:click="toggleModal">
            {{ __('ایجاد کردن ') }}
        </x-jet-button>
                <!-- message -->
        <x-jet-banner />

           {{-- <div  class="flex-1 flex items-center justify-between px-4 py-2 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
            <div class="flex items-center">
            <svg
                class="w-5 h-5 mr-2"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                ></path>
            </svg>
            <span>Star this project on GitHub</span>
            </div>
            <span>View more &RightArrow;</span>
        </div> --}}
    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
          <thead>
            <tr
              class="text-xs font-semibold tracking-wide text-right text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
              <th class="px-4 py-3">کشور</th>
              <th class="px-4 py-3">کد کشور</th>
              <th class="px-4 py-3">تاریخ ایجاد</th>
              <th class="px-4 py-3">اقدامات</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
            @forelse ($countries as $country)
              <tr class="text-gray-700 dark:text-gray-400" >
                <td class="px-4 py-3  text-sm">
                    {{$country->name}}
                </td>
                <td class="px-4 py-3 text-sm">
                  {{$country->country_code}}
                </td>
                <td class="px-4 py-3 text-xs">
                   {{$country->created_at}}
                </td>
                <td class="px-4 py-3 text-sm">
                  <x-jet-button wire:click="showEditForm({{$country->id}})" class="bg-yellow-400 hover:bg-yellow-500" >ویرایش</x-jet-button>
                  <x-jet-button  wire:click="deleteUser({{$country->id}})" class="bg-red-400 hover:bg-red-500 whitespace-nowrap"> &ThinSpace; حذف &ThinSpace; </x-jet-button>
                </td>
              </tr>
            @empty
            <tr>
              <small class="text-gray-700 dark:text-gray-400 px-1 py-4">کشوری وجود ندارد</small>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="paginate">
        {{ $countries->links('vendor.livewire.simple-tailwind') }}
      </div>
    </div>

    @if ($showFormModal)
      <x-jet-modal wire:model="showFormModal" >
        <x-jet-validation-errors class="mb-4" />

        <form  class="p-4" >
            <div class="flex flex-col md:flex-row justify-between md:gap-x-4">
                <div class="flex-1">
                    <x-jet-label for="name" value="{{ __('نام کشور') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')" required  autocomplete="name" />
                </div>
    
                <div class=" flex-1 mt-4 md:mt-0">
                    <x-jet-label for="country_code" value="{{ __('کد کشور') }}" />
                    <x-jet-input id="country_code" class="block mt-1 w-full" type="text" wire:model="country_code" :value="old('country_code')" required  autocomplete="country_code" />
                </div>
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
              @if(!$editModeModal)
                <x-jet-button type="button" class="ml-4" wire:click="storeCountry">
                    {{ __('ثبت ') }}
                </x-jet-button>
              @else
                <x-jet-button type="button" class="ml-4" wire:click="updateCountry">
                    {{ __('ویرایش ') }}
                </x-jet-button>
              @endif
            </div>
        </form>
     </x-jet-modal>
    @endif
</div>