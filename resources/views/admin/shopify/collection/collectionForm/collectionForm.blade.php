<form role="form" id="contact_form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label">name</label>
        <div class="col-sm">
            @csrf
            @if (!empty($collection->id))
            <input type="hidden" value="{{$collection->id}}" name="collect_id">
            @endif
            <input type="text" name="name" class="form-control"
                value="{{!empty($collection->name)?$collection->name:""}}">
            @error('name')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">title</label>
        <div class="col-sm">
            <textarea type="text" name="title" class="form-control" cols="10"
                rows="10">@if(!empty($collection->bodyHtml)){{$collection->bodyHtml!='no'?$collection->bodyHtml:''}}@endif</textarea>
            @error('title')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">image</label>
        <div class="col-sm">
            <input type="file" name="file" class="form-control">
            @error('file')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        @if (!empty($collection->src))
        <div class="col-sm mt-2">
            <img src="{{$collection->src}}" alt="" width="150px">
        </div>
        @endif
    </div>

    <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3 d-flex">
            <button type="submit" class="m-1 btn bg-gradient-info w-100 my-4 mb-2 variant-submit-form"></button>
            <a class="m-1 btn bg-gradient-danger w-100 my-4 mb-2" href="{{route('shopifyCollectionShow')}}">back</a>
        </div>
    </div>
</form>
