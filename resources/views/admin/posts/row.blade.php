<tr>
    <x-td>{{ $post->id }}</x-td>
    <x-td>{{ $post->title }}</x-td>
    <x-td>{{ $post->body }}</x-td>
    <x-td>{{ $post->comments_count }}</x-td>
    <x-td>
        <a href="{{ route('admin.posts.show', $post->id) }}">Show</a>
        <form method="POST" action="{{ route('admin.posts.show', $post->id) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.posts.show', $post->id) }}" onclick="if(confirm('Are you sure?')){ event.preventDefault(); this.closest('form').submit(); } else return false">Delete</a>
        </form>
    </x-td>
</tr>
