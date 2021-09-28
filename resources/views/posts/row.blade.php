<div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto my-5 max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
   <div class="flex items-start px-4 py-6">
      <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" title="{{$post->owner->name}}" src="https://ui-avatars.com/api/?name={{ urlencode($post->owner->name) }}" alt="avatar">
      <div class="">
         <a class="flex items-center justify-between" href="{{ route('posts.show', $post->id) }}">
             <h2 class="text-lg font-semibold text-gray-900 -mt-1 text-blue-500 hover:underline">{{ $post->title }}</h2>
            <small class="text-sm text-gray-700">{{ $post->created_at->diffForHumans() }}</small>
         </a>
         <p class="text-gray-700">Joined {{ $post->owner->created_at->format('d M Y') }}. </p>
         <p class="mt-3 text-gray-700 text-sm">{{ $post->body }}</p>
         <div class="mt-4 flex items-center">
            <div class="flex mr-2 text-gray-700 text-sm mr-8">
               <svg fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-1" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
               </svg>
               <span>{{ $post->comments_count }}</span>
            </div>
             @if($post->owner->id === auth()->id())
             <div class="flex mr-2 text-gray-700 text-sm mr-4">
               <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 48 48" width="18px" height="18px"><path d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z"/></svg>
               <a class="hover:text-blue-500" href="{{ route('posts.edit', $post->id) }}">Edit</a>
             </div>
             @endif
             @if(auth('admin')->check())
             <div class="flex mr-2 text-gray-700 text-sm mr-4">
               <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 24 24" width="18px" height="18px"><path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z"/></svg>
               <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <a class="hover:text-blue-500" href="{{ route('admin.posts.destroy', $post->id) }}" onclick="if(confirm('Are you sure?')){ event.preventDefault(); this.closest('form').submit(); } else return false">Delete</a>
                </form>
             </div>
             @endif
         </div>
      </div>
   </div>
</div>
