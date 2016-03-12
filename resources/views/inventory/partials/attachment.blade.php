
<div class="col-md-2">
    <a href="{{route('document', $document->code)}}">
        <img src="{{$document->getDocument()->getThumbnailURL()}}" class="img-thumbnail">
    </a>
    @if ($document->type == 'App\Document\Image')
    <div class="radio">
        <label>
            <input type="radio" name="default-image" value="{{$document->code}}">Make Default</input>
        </label>
    </div>
    @endif

    <div class="checkbox">
        <label>
            <input type="checkbox" name="remove-document-{{$document->id}}" value="{{$document->code}}">Remove this document</input>
        </label>
    </div>
</div>

@push('styles-after')

<style>
    .img-thumbnail {
        height: 140px;
        width: 140px;
    }
</style>


@endpush