@props(['id','title' , 'body' , 'image' , 'time'])
<div class="max-w-2xl mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
    <img class="object-cover w-full h-64" :src="$image" alt="Article">

    <div class="p-6">
        <div>
            <a :href="route('article.show' , $id)" class="block mt-2 text-2xl font-semibold text-gray-800 transition-colors duration-200 transform dark:text-white hover:text-gray-600 hover:underline">{{$title}}</a>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{$body}}
            </p>
        </div>

        <div class="mt-4">
            <div class="flex items-center">
                <div class="flex items-center">
                    <img class="object-cover h-10 rounded-full" src="https://images.unsplash.com/photo-1586287011575-a23134f797f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=60" alt="Avatar">
                    <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200">Jone Doe</a>
                </div>
                <span class="mx-1 text-xs text-gray-600 dark:text-gray-300">21 SEP 2015</span>
            </div>
        </div>
    </div>
</div>