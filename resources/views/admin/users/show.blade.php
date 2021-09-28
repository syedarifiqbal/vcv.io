<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    @include('components.alert')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $user->name }}</h3>
                        <p>Total Post: {{ $user->posts()->count() }}</p>
                        <p>Total Comments: {{ $user->comments()->count() }}</p>
                        <p>Registered At: {{ $user->created_at->format('d/m/Y h:i:s A') }}</p>
                        <p class="flex">
                        <form method="POST" class="flex mt-3" action="{{ route('admin.users.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#ff0000" viewBox="0 0 24 24" width="18px"
                                 height="18px">
                                <path
                                    d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"/>
                            </svg>
                            <a class="text-red-500 hover:text-red-600"
                               href="{{ route('admin.users.destroy', $user->id) }}"
                               onclick="if(confirm('Are you sure?')){ event.preventDefault(); this.closest('form').submit(); } else return false">Delete</a>
                        </form>
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">

                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <h1>Posts</h1>
                            @foreach($posts as $post)
                                @include('posts.row')
                            @endforeach
                            {{ $posts->links() }}
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
