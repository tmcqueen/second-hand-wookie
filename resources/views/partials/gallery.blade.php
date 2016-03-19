@if (!! $images = $asset->getMedia($collection))
<div class="panel-heading">
    <h4>{{$type}} of {{$asset->name}}</h4>
</div>
<div class="panel-body">

    <div id="links">
        @foreach($images as $image)
        <a href="{{$image->getUrl()}}" title="{{$image->name}}" {{$gallery or ''}}>
            <img src="{{$image->getUrl('thumb')}}">
        </a>
        @endforeach
    </div>
</div>
@else
<div class="panel-body">
    <h4>No {{$type}} for {{$asset->name}}</h4>
</div>
@endif