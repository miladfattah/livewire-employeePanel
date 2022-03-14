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
                  <x-jet-button  wire:click="deleteJob({{$job->id}})" class="bg-red-400 hover:bg-red-500 whitespace-nowrap"> &ThinSpace; حذف &ThinSpace; </x-jet-button>
                </td>
              </tr>
            @empty
            <tr class="text-gray-700 dark:text-gray-400" >
              <small>شغلی وجود ندارد</small>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="paginate">
        {{ $jobs->links('vendor.livewire.simple-tailwind') }}
      </div>
    </div>

    @if ($showFormModal)
      <x-jet-modal wire:model="showFormModal" >
        <x-jet-validation-errors class="mb-4" />

        <form  class="p-4" >
       
            <div class="mt-4">
                <x-jet-label for="company" value="{{ __('اسم شرکت') }}" />
                <x-jet-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" required  autocomplete="company" />
            </div>

            <div class="mt-4">
              <x-jet-label for="title" value="{{ __('عنوان شغل') }}" />
              <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" required  autocomplete="title" />
            </div>

            <div class="mt-4">
              <x-jet-label for="description" value="{{ __('توضیحات') }}" />
              <x-jet-input id="description" class="block mt-1 w-full" type="text" wire:model="description" :value="old('description')" required  autocomplete="description" />
            </div>

            <div class="mt-4">
              <x-jet-label for="address" value="{{ __('آدرس') }}" />
              <x-jet-input id="address" class="block mt-1 w-full" type="text" wire:model="address" :value="old('address')" required  autocomplete="address" />
            </div>

            <div class="mt-4">
              <x-jet-label for="earn" value="{{ __('حقوق') }}" />
              <x-jet-input id="earn" class="block mt-1 w-full" type="text" wire:model="earn" :value="old('earn')" required  autocomplete="earn" />
            </div>

            <div class="mt-4">
              <x-jet-label for="education" value="{{ __('تحصیلات مورد نیاز') }}" />
              <x-jet-input id="education" class="block mt-1 w-full" type="text" wire:model="education" :value="old('education')" required  autocomplete="education" />
            </div>

            <div class="mt-4">
              <x-jet-label for="soldiership" value="{{ __(' وضعیت سربازی') }}"  />
              <select wire:model="soldiership" id="soldiership" class="form-select appearance-none block
              w-full
              pr-8
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding bg-no-repeat
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                  <option value="0">مهم نیست</option>
                  <option value="1">پایان خدمت / معافیت</option>
              </select>
          </div>

            <div class="mt-4">
                <x-jet-label for="countryID" value="{{ __('انتخاب کشور') }}" />
                <select wire:model="country_id" id="countryID" class="form-select appearance-none block
                w-full
                pr-8
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
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
                <select wire:model="state_id" id="stateID" class="form-select appearance-none block
                w-full
                pr-8
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
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
                <select wire:model="city_id" id="cityID"  class="form-select appearance-none block
                w-full
                pr-8
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option>انتخاب کنید</option>
                    @forelse (\App\Models\City::all()  as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @empty
                        <option>شهری وجود ندار</option>
                    @endforelse
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="departmentID" value="{{ __('انتخاب حوزه') }}"  />
                <select wire:model="department_id" id="departmentID" class="form-select appearance-none block
                w-full
                pr-8
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option>انتخاب کنید</option>
                    @forelse (\App\Models\Department::all() as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @empty
                        <option>حوزه ای وجود ندار</option>
                    @endforelse
                </select>
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

            <div class="mt-4">
              <label for="formFile" class="form-label inline-block mb-2 text-gray-700">انتخاب تصویر</label>
              @if ($image)
              عکس انتخاب شده 
              <img src="{{ $image->temporaryUrl() }}">
              @endif
              <input class="form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              type="file" 
              id="formFile" 
              wire:model="image"
              >
            </div>
          

            <div class="flex items-center justify-end mt-4">
              @if(!$editModeModal)
                <x-jet-button type="button" class="ml-4" wire:click="storeJob">
                    {{ __('ثبت ') }}
                </x-jet-button>
              @else
                <x-jet-button type="button" class="ml-4" wire:click="updateJob">
                    {{ __('ویرایش ') }}
                </x-jet-button>
              @endif
            </div>
        </form>
     </x-jet-modal>
    @endif
</div>