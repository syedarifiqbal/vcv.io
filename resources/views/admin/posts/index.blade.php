<x-admin-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    @include('components.alert')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table
                            class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <x-th>ID</x-th>
                                <x-th>Title</x-th>
                                <x-th>Body</x-th>
                                <x-th>Total Comments</x-th>
                                <x-th>Action</x-th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                @include('admin.posts.row')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('components.pagination', ['data' => $posts])
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>
