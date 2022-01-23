@props(['recipe', 'likes'])
<img src="{{asset('storage/' . $recipe->image)}}" style="max-width: inherit; max-height: 400px;margin-bottom: 10px; object-fit: cover;">
{{--{{dd($hasLike, $recipe->id)}}--}}
<x-recipe.recipe-buttons
    :recipe="$recipe"
    :likes="$likes"
/>
{{--Likes amount section--}}
<div class="row likes-amount-section">
    <div class="col likes-amount-column">
        <span class="likes-amount" role="button" tabindex="0"><span>{{$recipe->likes->whereNull('comment_id')->count()}}</span> likes</span>
    </div>
</div>
{{--Date section--}}
<div class="row date-section" >
    <div class="col date-section-column">
        <a class="date-section-link" href="/" tabindex="0">
            <time class="date-section-time" datetime="{{\Carbon\Carbon::parse($recipe->publish_date)->format('Y-m-d\TH:i:s.U\Z')}}" title="{{\Carbon\Carbon::parse($recipe->publish_date)->format('M d, Y')}}">{{\Carbon\Carbon::parse($recipe->publish_date)->format('F d')}}</time>
        </a>
    </div>
</div>
<h3 style="margin-bottom: 10px">{{$recipe->title}}</h3>
<p>Amount of people: {{$recipe->amount_people}}</p>
<h3>Description:</h3>
<p>{{$recipe->description}}</p>
<h3>Ingredients:</h3>
<p>{{$recipe->ingredients}}</p>
<h3>Steps:</h3>
<p>{{$recipe->steps}}</p>
