<form role="form" id="contact_form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label">Option</label>
        <div class="col-sm">
            @csrf
            <input type="hidden" value="{{!empty($arrayId['id']) ? $arrayId['id'] : '' }}" name="id">
            <input type="hidden" value="{{!empty($arrayId['product_id'])?$arrayId['product_id']:$variant_id}}" name="product_id">
            <input type="text" name="option1" class="form-control"
                value="{{!empty($variantedit->option1)?$variantedit->option1:old('option1')}}">
            @error('option1')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Price</label>
        <div class="col-sm">
            <input type="text" name="price" class="form-control" aria-describedby="email-addon"
                value="{{!empty($variantedit->price)?$variantedit->price:old('price')}}">
            @error('price')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Sku</label>
        <div class="col-sm">
            <input type="text" name="sku" class="form-control"
                value="{{!empty($variantedit->sku)?$variantedit->sku:old('sku')}}" aria-label="Email"
                aria-describedby="email-addon">
            @error('sku')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Weight</label>
        <div class="col-sm">
            <input type="text" class="form-control pass-input" name="weight"
                value="{{!empty($variantedit->weight)?$variantedit->weight:old('weight')}}" />
            @error('weight')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="chooseIamge">image</label>
        <ul class="d-flex justify-content-start  flex-wrap">
            @foreach (json_decode($productImages) as $item)
            <li class="p-1" style="cursor: pointer;list-style:none;">
                 <input type="radio" name="chooseIamge" id="chooseIamge"
                   value="{{$item->id}}"
                 @if ( !empty($variantedit))
                 @if ($variantedit->image_id == $item->id )
                 checked
                 @endif
                 @endif
                 >
                 <img width="80" src="{{$item->src}}" alt="">
            </li>
            @endforeach
        </ul>
    </div>
    <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3 d-flex">
            <button type="submit" class="m-1 btn bg-gradient-info w-100 my-4 mb-2 variant-submit-form"></button>
            <a class="m-1 btn bg-gradient-danger w-100 my-4 mb-2" @if(!empty($variant_id))
                href="{{route('shopifyProductDetalyShow',$variant_id)}}" @else
                href="{{route('shopifyProductDetalyShow',$arrayId['product_id'])}}" @endif>back</a>
        </div>
    </div>
</form>
