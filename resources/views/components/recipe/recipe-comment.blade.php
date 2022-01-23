@props(['recipe', 'comment', 'hasCommentLike', 'commentLikes'])
<div class="comment-banner container">
    <img class="comment-profile-image" src="{{ asset('storage/' . $comment->user->profile_image) }}">
    <p class="comment-username">{{$comment->user->username}}</p>
</div>
<div class="container">
    <p>{{$comment->message}}</p>
    <x-recipe.recipe-comment-like
        :recipe="$recipe"
        :comment="$comment"
        :hasCommentLike="$hasCommentLike"
        :commentLikes="$commentLikes"
    />
</div>
