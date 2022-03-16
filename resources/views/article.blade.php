<x-guest-layout>
    <div class="w-5/6 mx-auto bg-yellow-200 h-[30px] rounded-br-full rounded-bl-full shadow-sm flex justify-center items-center">
        <p class="text-alert-text text-sm">برای مشاهده اخرین مقالات  <a href="#" class="font-extrabold underline">کلیک</a> کنید </p>
    </div>

    <section class="my-8">
        <h1 class="text-biscay-700 sm:text-3xl text-2xl font-bold" >آرشیو مقالات</h1>
        <div class=" py-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            <x-article></x-article>
            <x-article></x-article>
            <x-article></x-article>
            <x-article></x-article>
            <x-article></x-article>
            <x-article></x-article>
            <x-article></x-article>
        </div>
    </section>
</x-guest-layout>