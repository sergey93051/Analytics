<form role="form" id="contact_form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label">Alt</label>
        <div class="col-sm">
            @csrf
            <input type="hidden" value="{{$product_id}}" name="product_id">
            <input type="text" name="alt" class="form-control"
                value="{{old('alt')}}">
            @error('alt')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">File</label>
        <div class="col-sm">
            <input type="file" name="file" class="form-control"
                value="{{old('file')}}">
            @error('file')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3 d-flex">
            <button type="submit" class="m-1 btn bg-gradient-info w-100 my-4 mb-2 image-submit-form"></button>
            <a class="m-1 btn bg-gradient-danger w-100 my-4 mb-2"
                href="{{route('shopifyProductDetalyShow',$product_id)}}">back</a>
        </div>
    </div>
</form>
