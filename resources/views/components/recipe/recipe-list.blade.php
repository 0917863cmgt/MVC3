@props(['recipe'])
<div class="recipe-list">
    <a class="n-t-d" href="/recipe/{{$recipe->slug}}" style="color: black">
        <h5>{{$recipe->title}}</h5>
    </a>
    <h5 class="recipe-author">{{$recipe->author->username}}</h5>
    @if($recipe->published == 0)
        <form id="{{$recipe->slug}}" method="POST" action="/recipes/published/update/{{$recipe->slug}}" style="margin-right: 10px">
            @csrf
            @method('PATCH')
            <label class="switch" onclick="document.forms['{{$recipe->slug}}'].submit();">
                <input name="published" type="checkbox" id="published">
                <span id="span" class="slider round">Draft</span>
            </label>
            <button type="submit" style="background: 0 0; border: 0; display: none;"></button>
        </form>
    @else
        <form id="{{$recipe->slug}}" method="POST" action="/recipes/published/update/{{$recipe->slug}}" style="margin-right: 10px">
            @csrf
            @method('PATCH')
            <label class="switch" onclick="document.forms['{{$recipe->slug}}'].submit();">
                <input name="published" type="checkbox" id="published" checked>
                <span id="span" class="slider round">Published</span>
            </label>
            <button type="submit" style="background: 0 0; border: 0; display: none;"></button>
        </form>
    @endif
    <a class="n-t-d recipe-edit" href="/recipes/edit/{{$recipe->slug}}">edit</a>
    <form method="POST" action="/recipes/delete/{{$recipe->slug}}">
        @csrf
        @method('DELETE')
        <button class="n-t-d recipe-delete">
            delete
        </button>
    </form>
</div>
