@props(['recipe', 'comments', 'likes'])
@foreach($comments as $comment)
    <div class="recipe-comments">
        @if(\Illuminate\Support\Facades\Auth::check())
            @if($comment->likes->where('user_id', '=', auth()->user()->id)->count() > 0)
            <x-recipe.recipe-comment
                :recipe="$recipe"
                :comment="$comment"
                :hasCommentLike="$comment->likes->where('user_id', '=', auth()->user()->id)->first()->exists()"
                :commentLikes="$comment->likes->where('user_id', '=', auth()->user()->id)->first()"
            ></x-recipe.recipe-comment>
            @else
                <x-recipe.recipe-comment
                    :recipe="$recipe"
                    :comment="$comment"
                    :hasCommentLike="false"
                    :commentLikes="false"></x-recipe.recipe-comment>
            @endif
        @else
            <x-recipe.recipe-comment
                :recipe="$recipe"
                :comment="$comment"
                :hasCommentLike="false"
                :commentLikes="false"></x-recipe.recipe-comment>
        @endif
    </div>
@endforeach
