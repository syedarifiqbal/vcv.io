<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    @include('components.alert')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @foreach($posts as $post)
                @include('posts.row')
            @endforeach

            <div class="flex justify-between mx-4 md:mx-auto my-5 max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
                @include('components.pagination', ['data' => $posts])
            </div>
        </div>
    </div>
</x-app-layout>
