@props(['recipe','comment','hasCommentLike', 'commentLikes'])
@if(\Illuminate\Support\Facades\Auth::check())
    <div class="recipe-comment">
    <span class="jdtwu">
    <div class="_2ic5v">
        @if($hasCommentLike == true)
            <form class="like-highlight-form" method="POST"
                  action="/recipe/{{$recipe->slug}}/destroy/{{$commentLikes->id}}">
                @csrf
                <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                <input type="hidden" name="comment_id" id="comment_id" value="{{$comment->id}}">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                @endif
                <button class="highlight-svg-button" type="submit">
                    <div class="QBdPU B58H7">
                        <svg aria-label="Like" class="like-comment-hidden" color="#8e8e8e"
                             fill="#8e8e8e" height="12" role="img" viewBox="0 0 48 48" width="12">
                            <path
                                d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                        </svg>
                    </div>
                    <div class="QBdPU rrUvL">
                        <span class="">
                            <svg aria-label="Like" class="like-highlight-svg" color="#ed4956"
                                 fill="#ed4956" height="12" role="img" viewBox="0 0 48 48" width="12">
                                <path
                                    d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                            </svg>
                        </span>
                    </div>
                </button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        @else
            <form class="like-highlight-form" method="POST"
                  action="/recipe/{{$recipe->slug}}/create">
                            @csrf
                            <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                            <input type="hidden" name="comment_id" id="comment_id" value="{{$comment->id}}">
                            @if(\Illuminate\Support\Facades\Auth::check())
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                @endif
                            <button class="highlight-svg-button" type="submit">
                                <div class="QBdPU B58H7">
                                    <svg aria-label="Like" class="like-comment-hidden" color="#8e8e8e" fill="#8e8e8e"
                                         height="12" role="img" viewBox="0 0 48 48" width="12">
                                        <path
                                            d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                                    </svg>
                                </div>
                                <div class="QBdPU rrUvL">
                                    <span class="">
                                        <svg aria-label="Like" class="like-comment-real" color="#262626" fill="#262626"
                                             height="12" role="img" viewBox="0 0 48 48" width="12">
                                            <path
                                                d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </button>
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        @endif
    </div>
</span>
        <button class="highlight-svg-button" style="padding:0;margin-right: 12px;font-weight: 600;color: #8e8e8e;">
            {{$comment->likes->count()}} likes
        </button>
    </div>
@else
    <div class="recipe-comment">
    <span class="jdtwu">
    <div class="_2ic5v">
        @if($hasCommentLike == true)
            <form class="like-highlight-form" method="POST"
                  action="/recipe/{{$recipe->slug}}/destroy/{{$commentLikes->id}}">
                @csrf
                <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                <input type="hidden" name="comment_id" id="comment_id" value="{{$comment->id}}">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                @endif
                <button class="highlight-svg-button" type="submit">
                    <div class="QBdPU B58H7">
                        <svg aria-label="Like" class="like-comment-hidden" color="#8e8e8e"
                             fill="#8e8e8e" height="12" role="img" viewBox="0 0 48 48" width="12">
                            <path
                                d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                        </svg>
                    </div>
                    <div class="QBdPU rrUvL">
                        <span class="">
                            <svg aria-label="Like" class="like-highlight-svg" color="#ed4956"
                                 fill="#ed4956" height="12" role="img" viewBox="0 0 48 48" width="12">
                                <path
                                    d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                            </svg>
                        </span>
                    </div>
                </button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        @else
            <form class="like-highlight-form" method="POST"
                  action="/recipe/{{$recipe->slug}}/create">
                            @csrf
                            <input type="hidden" name="recipe_id" id="recipe_id" value="{{$recipe->id}}">
                            <input type="hidden" name="comment_id" id="comment_id" value="{{$comment->id}}">
                            @if(\Illuminate\Support\Facades\Auth::check())
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                @endif
                            <button class="highlight-svg-button" type="submit">
                                <div class="QBdPU B58H7">
                                    <svg aria-label="Like" class="like-comment-hidden" color="#8e8e8e" fill="#8e8e8e"
                                         height="12" role="img" viewBox="0 0 48 48" width="12">
                                        <path
                                            d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                                    </svg>
                                </div>
                                <div class="QBdPU rrUvL">
                                    <span class="">
                                        <svg aria-label="Like" class="like-comment-real" color="#262626" fill="#262626"
                                             height="12" role="img" viewBox="0 0 48 48" width="12">
                                            <path
                                                d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path>
                                        </svg>
                                    </span>
                                </div>
                            </button>
                        @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        @endif
    </div>
</span>
        <button class="highlight-svg-button" style="padding:0;margin-right: 12px;font-weight: 600;color: #8e8e8e;">
            {{$comment->likes->count()}} likes
        </button>
    </div>
@endif
