<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    @include('components.alert')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                  <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $post->title }}</h3>
                    <p class="mt-1 text-sm text-gray-600">
                      {{ $post->body }}
                    </p>
                      <p>Created By: {{ $post->owner->name }}</p>
                      <p>Created At: {{ $post->created_at->format('d/m/Y h:i:s A') }}</p>
                  </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">

                  <form action="{{ route('comments.store', $post->id) }}" method="POST">
                      @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">

                            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                                <h1>Comments</h1>
                              @foreach($comments as $comment)
                              <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-5 max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
                                   <div class="flex items-start px-4 py-6 w-full">
                                      <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" title="{{$comment->owner->name}}" src="https://ui-avatars.com/api/?name={{ urlencode($post->owner->name) }}" alt="avatar">
                                      <div class="w-full">
                                         <div class="flex items-center justify-between">
                                            <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ $comment->owner->name }}</h2>
                                            <small class="text-sm text-gray-700">{{ $comment->created_at->diffForHumans() }}</small>
                                         </div>
                                         <p class="mt-3 text-gray-700 text-sm">{{ $comment->body }}</p>
                                          @if(auth('admin')->check())
                                         <div class="flex mt-5 text-gray-700 text-sm mr-4">
                                           <svg xmlns="http://www.w3.org/2000/svg" fill="#ff0000" viewBox="0 0 24 24" width="18px" height="18px"><path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"/></svg>
                                             <a class="hover:text-red-600 text-red-500" href="{{ route('admin.comments.destroy', [$comment->post_id, $comment->id]) }}" onclick="return confirm('Are you sure?')">Delete</a>
                                         </div>
                                         @endif
                                      </div>
                                   </div>
                                </div>
                              @endforeach
                                {{ $comments->links() }}
                            <div>
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                          <label for="body" class="block text-sm font-medium text-gray-700">
                            Comment
                          </label>
                          <div class="mt-1">
                            <textarea id="body" name="body" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Something Interesting.!"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Save
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    </div>

</x-app-layout>
