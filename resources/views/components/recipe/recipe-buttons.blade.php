@props(['recipe', 'likes'])
@if(\Illuminate\Support\Facades\Auth::check())
    <div class="recipe-buttons-container">
        <div class="row selected-highlight-buttons-row">
            <div class="col selected-highlight-buttons-col">
            <span>
                @if($likes->where('recipe_id', '=', $recipe->id)->where('user_id', '=', auth()->user()->id)->whereNull('comment_id')->exists())
                    <form class="like-highlight-form" method="POST"
                          action="/recipe/{{$recipe->slug}}/destroy/{{$likes->where('recipe_id', '=', $recipe->id)->where('user_id', '=', auth()->user()->id)->first()->id}}">
                @else
                            <form class="like-highlight-form" method="POST"
                                  action="/recipe/{{$recipe->slug}}/create">
                @endif
                                @csrf
                        <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                        @if(\Illuminate\Support\Facades\Auth::check())
                                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                                @endif
                        <button class="highlight-svg-button" type="submit">
                            <div class="like-highlight-hidden">
                                <x-svg.like-hidden-svg/>
                            </div>
                            <div class="like-highlight-real">
                                @if($likes->where('recipe_id', '=', $recipe->id)->where('user_id', '=', auth()->user()->id)->whereNull('comment_id')->exists())
                                    <x-svg.like-real-svg/>
                                @else
                                    <x-svg.like-real-filled-svg/>
                                @endif
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </button>
                    </form>
            </span>
                <span>
                <a class="n-t-d" href="/recipe/{{$recipe->slug}}#comment">
                <button class="highlight-svg-button" type="button">
                    <div class="comment-highlight-hidden">
                        <x-svg.comment-hidden-svg/>
                    </div>
                    <div class="comment-highlight-real">
                        <x-svg.comment-real-svg/>
                    </div>
                </button>
                </a>
            </span>
                <span>
                <button class="highlight-svg-button" type="button">
                    <div class="share-highlight-hidden">
                        <x-svg.share-hidden-svg/>
                    </div>
                    <div class="share-highlight-real">
                        <x-svg.share-real-svg/>
                    </div>
                </button>
            </span>
                <span class="highlight-selected-svg-between">
                <div>
                    <div aria-disabled="false" role="button" tabindex="0">
                        <button class="highlight-svg-button" type="button">
                            <div class="save-highlight-hidden">
                                <x-svg.save-hidden-svg/>
                            </div>
                            <div class="save-highlight-real">
                                <x-svg.save-real-svg/>
                            </div>
                        </button>
                    </div>
                </div>
            </span>
            </div>
        </div>
    </div>
@else
    <div class="recipe-buttons-container">
        <div class="row selected-highlight-buttons-row">
            <div class="col selected-highlight-buttons-col">
            <span>
                @if($likes->where('recipe_id', '=', $recipe->id)->where('user_id', '=', '0')->exists())
                    <form class="like-highlight-form" method="POST"
                          action="/recipe/{{$recipe->slug}}/destroy/{{$recipeLike->id}}">
                @else
                            <form class="like-highlight-form" method="POST"
                                  action="/recipe/{{$recipe->slug}}/create">
                @endif
                                @csrf
                        <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <input type="hidden" name="user_id" id="user_id" value="">
                                @endif
                        <button class="highlight-svg-button" type="submit">
                            <div class="like-highlight-hidden">
                                <x-svg.like-hidden-svg/>
                            </div>
                            <div class="like-highlight-real">
                                @if($likes->where('recipe_id', '=', $recipe->id)->where('user_id', '=', '0')->whereNull('comment_id')->exists())
                                    <x-svg.like-real-svg/>
                                @else
                                    <x-svg.like-real-filled-svg/>
                                @endif
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </button>
                    </form>
            </span>
            <span>
                <button class="highlight-svg-button" type="button">
                    <div class="comment-highlight-hidden">
                        <x-svg.comment-hidden-svg/>
                    </div>
                    <div class="comment-highlight-real">
                        <x-svg.comment-real-svg/>
                    </div>
                </button>
            </span>
                <span>
                <button class="highlight-svg-button" type="button">
                    <div class="share-highlight-hidden">
                        <x-svg.share-hidden-svg/>
                    </div>
                    <div class="share-highlight-real">
                            <x-svg.share-real-svg/>
                    </div>
                </button>
            </span>
                <span class="highlight-selected-svg-between">
                <div>
                    <div aria-disabled="false" role="button" tabindex="0">
                        <button class="highlight-svg-button" type="button">
                            <div class="save-highlight-hidden">
                                <x-svg.save-hidden-svg/>
                            </div>
                            <div class="save-highlight-real">
                                <x-svg.save-real-svg/>
                            </div>
                        </button>
                    </div>
                </div>
            </span>
            </div>
        </div>
    </div>
@endif

