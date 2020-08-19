@include('layouts.app')

<div class="container">
    @foreach ($users as $user)
{{ $user->name }}<br>
    @endforeach
</div>

{{ $users->links() }}
