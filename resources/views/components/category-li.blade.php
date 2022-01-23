@props(['children', 'parent'])
@foreach($children as $category)
    @if($category->parent_id == $parent->id)
        <li tabindex=0>
            <a class="n-t-d" href="/?{{$parent->slug}}={{$category->id}}&{{http_build_query(request()->only('protein'))}}&{{http_build_query(request()->only('vegetables'))}}&{{http_build_query(request()->only('cuisine'))}}&{{http_build_query(request()->only('course'))}}&{{http_build_query(request()->only('search'))}}">{{$category->name}}</a>
        </li>
    @endif
@endforeach
