@props(['recipe'])
<div class="col-3">
    <a href="/recipe/{{$recipe->slug}}" style="text-decoration: none;color:inherit; max-width: inherit">
        <img src="{{asset('storage/' . $recipe->image) ?: $recipe->image }}" width="300px" height="300px" style="width: 300px;height: 300px;">
        <h3>{{$recipe->title}}</h3>
        <p>Amount of people: {{$recipe->amount_people}}</p>
        <p>Description:</p>
        <p>{{Illuminate\Support\Str::limit($recipe->description,200,"...")}}</p>
    </a>
</div>
