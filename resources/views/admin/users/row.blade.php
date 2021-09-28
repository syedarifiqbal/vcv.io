<tr>
    <x-td>{{ $user->id }}</x-td>
    <x-td>{{ $user->name }}</x-td>
    <x-td>{{ $user->email }}</x-td>
    <x-td>{{ $user->posts_count }}</x-td>
    <x-td>{{ $user->comments_count }}</x-td>
    <x-td>
        <a href="{{ route('admin.users.show', $user->id) }}">Detail</a>
        <form method="POST" action="{{ route('admin.users.show', $user->id) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.users.show', $user->id) }}" onclick="if(confirm('Are you sure?')){ event.preventDefault(); this.closest('form').submit(); } else return false">Delete</a>
        </form>
    </x-td>
</tr>
