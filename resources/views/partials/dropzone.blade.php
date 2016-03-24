@push('style-after')
<link rel="stylesheet" href="/css/dropzone.min.css">
<style>

    .dropzone {
        border: 2px dashed darkblue;
        border-radius: 5px;
        background: lightblue;
    }

</style>
@endpush

@push('scripts-after')
<script src="/js/dropzone.min.js"></script>
@endpush

<form   method="POST"
        action="{{$target}}"
        accept-charset="UTF-8"
        enctype="multipart/form-data"
        class="dropzone needsclick dz-clickable">
    {{csrf_field()}}
    {{method_field('patch')}}

    <input type="hidden" name="imageType" value="{{$imageType}}">

    <div class="dz-message needsclick">
        Drag/Drop files here to upload
    </div>
</form>
<form   method="POST"
        action="{{$target}}"
        accept-charset="UTF-8"
        enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('patch')}}

    <input type="hidden" name="imageType" value="{{$imageType}}">
    <input type="file" name="file">
    <button>Submit</button>
</form>
<div style="padding-top: 50px;"></div>