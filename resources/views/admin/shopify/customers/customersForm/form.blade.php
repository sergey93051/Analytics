<form role="form" id="contact_form" action="" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <label class="col-sm-3 control-label">FirstName</label>
        <div class="col-sm">
            @csrf
            @if (!empty($customer->id))
            <input type="hidden" value="{{$customer->id}}" name="customer_id">
            @endif
            <input type="text" name="firstName" class="form-control" value="{{!empty($customer->firstName)?$customer->firstName:""}}">
            @error('firstName')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">LastName"</label>
        <div class="col-sm">
            <input type="text" name="lastName" class="form-control" value="{{!empty($customer->lastName)?$customer->lastName:""}}">
            @error('lastName')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm">
            <input type="text" name="email" class="form-control" value="{{!empty($customer->email)?$customer->email:''}}">
          @error('email')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Phone</label>
        <div class="col-sm">
            <input type="text" name="phone" class="form-control" value="{{$customer->phone!='no'?$customer->phone:''}}">
            @error('phone')
            <small class="help-block">{{ $message }}</small>
            @enderror
            @if (session()->has("phonError"))
            @foreach (json_decode(session()->get("phonError")) as $item)
                <small class="help-block">{{ $item }}</small>
            @endforeach
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-7 col-sm-offset-3 d-flex">
            <button type="submit" class="m-1 btn bg-gradient-info w-100 my-4 mb-2 variant-submit-form"></button>
            <a class="m-1 btn bg-gradient-danger w-100 my-4 mb-2"
            href="{{route('shopifyCustomerShow')}}" >back</a>
        </div>
    </div>
</form>
