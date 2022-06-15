<form role="form" id="contact_form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label">title</label>
        <div class="col-sm">
            @csrf
            <input type="hidden" value="{{!empty($header->id) ? $header->id : '' }}" name="id">
            <input type="text" name="title" class="form-control"
                value="{{!empty($header->title)?$header->title:old('title')}}">
            @error('title')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">bodyHtml</label>
        <div class="col-sm">
             <textarea class="form-control" name="bodyHtml" cols="10" rows="10">{{!empty($header->bodyHtml)?$header->bodyHtml:old('bodyHtml')}}</textarea>
          @error('bodyHtml')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">status</label>
        <div class="col-sm">
           <select name="status" class="form-select">
                <option value="active" {{$header->status=='active'? 'selected' :""}}>active</option>
                <option value="draft" {{$header->status=='draft'? 'selected' :""}}>draft</option>
           </select>
         </div>
    </div>
    <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3 d-flex">
            <button type="submit" class="m-1 btn bg-gradient-info w-100 my-4 mb-2 variant-submit-form"></button>
            <a class="m-1 btn bg-gradient-danger w-100 my-4 mb-2"
            href="{{route('shopifyProductDetalyShow',$header->id)}}" >back</a>
        </div>
    </div>
</form>
