@props(['category'])
<div class="recipe-list">
    <h5>{{$category->id}}</h5>
    <h5 class="recipe-author">
        {{$category->name}}
    </h5>
    <a class="n-t-d recipe-edit" href="/categories/edit/{{$category->slug}}">edit</a>
    <form method="POST" action="/categories/delete/{{$category->slug}}">
        @csrf
        @method('DELETE')
        <button class="n-t-d recipe-delete">
            delete
        </button>
    </form>
</div>
