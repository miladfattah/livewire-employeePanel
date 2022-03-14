<div class="container px-6 mx-auto grid">
    <h2
      class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
      ثبت مقاله
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
              <th class="px-4 py-3">عنوان مقاله</th>
              <th class="px-4 py-3">نویسنده</th>
              <th class="px-4 py-3">تاریخ ثبت</th>
              <th class="px-4 py-3">اقدامات</th>
            </tr>
          </thead>
          <tbody
            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
          >
            @forelse ($articles as $article)
              <tr class="text-gray-700 dark:text-gray-400" >
                <td class="px-4 py-3 text-sm">
                  {{$article->title}} 
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$article->user->username}}
                </td>
                <td class="px-4 py-3 text-xs">
                  {{$article->created_at}}
                </td>
                <td class="px-4 py-3 text-sm">
                  <x-jet-button wire:click="showEditForm({{$article->id}})" class="bg-yellow-400 hover:bg-yellow-500" >ویرایش</x-jet-button>
                  <x-jet-button  wire:click="deleteArticle({{$article->id}})" class="bg-red-400 hover:bg-red-500 whitespace-nowrap"> &ThinSpace; حذف &ThinSpace; </x-jet-button>
                </td>
              </tr>
            @empty
            <tr class="text-gray-700 dark:text-gray-400" >
              <small>مقاله ای وجود ندارد</small>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="paginate">
        {{ $articles->links('vendor.livewire.simple-tailwind') }}
      </div>
    </div>

    @if ($showFormModal)
      <x-jet-modal wire:model="showFormModal" >
        <x-jet-validation-errors class="mb-4" />

        <form  class="p-4" >
       
            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('عنوان مقاله') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" required  autocomplete="title" />
            </div>

            <div class="mt-4">
              <x-jet-label for="body" value="{{ __('توضحیات مقاله') }}" />
              <x-jet-input id="body" class="block mt-1 w-full" type="text" wire:model="body" :value="old('body')" required  autocomplete="body" />
            </div>

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
                <x-jet-button type="button" class="ml-4" wire:click="storeArticle">
                    {{ __('ثبت ') }}
                </x-jet-button>
              @else
                <x-jet-button type="button" class="ml-4" wire:click="updateArticle">
                    {{ __('ویرایش ') }}
                </x-jet-button>
              @endif
            </div>
        </form>
     </x-jet-modal>
    @endif
</div>