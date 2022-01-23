<div style="max-width: 200px;margin: 0;">
    <form method="GET" action="#">
        @if(request('protein'))
            <input type="hidden" name="category" placeholder="" value="{{request('protein')}}">
        @endif
            @if(request('vegetables'))
                <input type="hidden" name="category" placeholder="" value="{{request('vegetables')}}">
            @endif
            @if(request('cuisine'))
                <input type="hidden" name="category" placeholder="" value="{{request('cuisine')}}">
            @endif
            @if(request('course'))
                <input type="hidden" name="category" placeholder="" value="{{request('course')}}">
            @endif
            @if(request('parent'))
                <input type="hidden" name="category" placeholder="" value="{{request('parent')}}">
            @endif
        <input type="text" name="search" placeholder="Search..." class="article-searchbar">
    </form>
</div>
