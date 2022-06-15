<form role="form" id="contact_form" action="{{route("customLogin")}}" method="post" class="form-horizontal">

    <div class="form-group">
        <label class="col-sm-3 control-label">email</label>
        <div class="col-sm">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email"
                aria-describedby="email-addon">
            @error('email')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm">
            <input type="password" class="form-control" name="password" />
            @error('password')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    @if (session()->has("valid"))
    <small class="help-block"> {{ session()->get("valid") }}</small>
    @endif
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-3">
            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign
                in</button>
        </div>
    </div>
</form>
