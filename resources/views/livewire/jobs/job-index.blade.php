<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      ثبت شغل
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
              <th class="px-4 py-3">عنوان شغل</th>
              <th class="px-4 py-3">آدرس</th>
              <th class="px-4 py-3">تاریخ ثبت</th>
              <th class="px-4 py-3">اقدامات</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
            @forelse ($jobs as $job)
              <tr class="text-gray-700 dark:text-gray-400" >
                <td class="px-4 py-3 text-sm">
                  {{$job->title}} 
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$job->address}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{-- {{$job->data}} --}}
                </td>
                <td class="px-4 py-3 text-sm">
                  <x-jet-button wire:click="showEditForm({{$job->id}})" class="bg-yellow-400 hover:bg-yellow-500" >ویرایش</x-jet-button>
                  <x-jet-button  wire:click="deleteEmployee({{$job->id}})" class="bg-red-400 hover:bg-red-500 whitespace-nowrap"> &ThinSpace; حذف &ThinSpace; </x-jet-button>
                </td>
              </tr>
            @empty
            <tr class="text-gray-700 dark:text-gray-400" >
              <small>کاربری وجود ندارد</small>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="paginate">
        {{ $job->links('vendor.livewire.simple-tailwind') }}
      </div>
    </div>

    @if ($showFormModal)
      <x-jet-modal wire:model="showFormModal" >
        <x-jet-validation-errors class="mb-4" />

        <form  class="p-4" >
       
            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('نام خانوادگی') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" wire:model="last_name" :value="old('last_name')" required  autocomplete="last_name" />
            </div>

            <div class="mt-4">
              <x-jet-label for="first_name" value="{{ __('نام') }}" />
              <x-jet-input id="first_name" class="block mt-1 w-full" type="text" wire:model="first_name" :value="old('first_name')" required  autocomplete="first_name" />
            </div>

            <div class="mt-4">
              <x-jet-label for="middle_name" value="{{ __('نام کاربری') }}" />
              <x-jet-input id="middle_name" class="block mt-1 w-full" type="text" wire:model="middle_name" :value="old('middle_name')" required  autocomplete="middle_name" />
            </div>

            <div class="mt-4">
              <x-jet-label for="address" value="{{ __('آدرس') }}" />
              <x-jet-input id="address" class="block mt-1 w-full" type="text" wire:model="address" :value="old('address')" required  autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-jet-label for="countryID" value="{{ __('انتخاب کشور') }}" />
                <select wire:model="country_id" id="countryID">
                    <option>انتخاب کنید</option>
                    @forelse (\App\Models\Country::all() as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @empty
                        <option>کشوری وجود ندار</option>
                    @endforelse
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="stateID" value="{{ __('انتخاب استان') }}" />
                <select wire:model="state_id" id="stateID">
                    <option>انتخاب کنید</option>
                    @forelse (\App\Models\State::all() as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @empty
                        <option>استانی وجود ندار</option>
                    @endforelse
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="cityID" value="{{ __('انتخاب شهر') }}" />
                <select wire:model="city_id" id="cityID">
                    <option>انتخاب کنید</option>
                    @forelse (\App\Models\City::all()  as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @empty
                        <option>شهری وجود ندار</option>
                    @endforelse
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="departmentID" value="{{ __('انتخاب حوزه') }}" />
                <select wire:model="department_id" id="departmentID">
                    <option>انتخاب کنید</option>
                    @forelse (\App\Models\Department::all() as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @empty
                        <option>حوزه ای وجود ندار</option>
                    @endforelse
                </select>
            </div>

            <div class="mt-4">
              <x-jet-label for="zip_code" value="{{ __('زیپ کد_') }}" />
              <x-jet-input id="zip_code" class="block mt-1 w-full" type="text" wire:model="zip_code" :value="old('zip_code')" required  autocomplete="zip_code" />
            </div>

            <div class="mt-4">
              <x-jet-label for="birthdate" value="{{ __('تاریخ تولد') }}" />
              <x-jet-input id="birthdate" class="block mt-1 w-full" type="text" wire:model="birthdate" :value="old('birthdate')" required  autocomplete="birthdate" />
            </div>

            <div class="mt-4">
              <x-jet-label for="date_hired" value="{{ __('تاریخ') }}" />
              <x-jet-input id="date_hired" class="block mt-1 w-full" type="text" wire:model="date_hired" :value="old('date_hired')" required  autocomplete="date_hired" />
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
                <x-jet-button type="button" class="ml-4" wire:click="storeEmployee">
                    {{ __('ثبت ') }}
                </x-jet-button>
              @else
                <x-jet-button type="button" class="ml-4" wire:click="updateEmployee">
                    {{ __('ویرایش ') }}
                </x-jet-button>
              @endif
            </div>
        </form>
     </x-jet-modal>
    @endif
</div>