@props(['user'])
<div class="recipe-list">
    <h5>{{$user->username}}</h5>
    <h5 class="recipe-author">
        @if($user->role == 1)
            Admin
        @elseif($user->role == 2)
            Moderator
        @else
            User
        @endif
    </h5>
    <a class="n-t-d recipe-edit" href="/admin/users/edit/{{$user->username}}">edit</a>
    <form method="POST" action="/admin/users/delete/{{$user->username}}">
        @csrf
        @method('DELETE')
        <button class="n-t-d recipe-delete">
            delete
        </button>
    </form>
</div>
