@props(['recipe'])
<div id="comment" class="comment-form-container">
    <form class="comment-form" method="POST" action="/recipe/{{$recipe->slug}}/comment/create">
        @csrf
        <textarea name="message" aria-label="Add a comment…" placeholder="Add a comment…" class="comment-inputfield" autocomplete="off" autocorrect="off"></textarea>
        <button class="comment-post-button" type="submit">Post</button>
    </form>
</div>
