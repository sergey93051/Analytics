<form role="form" id="contact_form" action="{{route("customRegister")}}" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-3 control-label">name</label>
        <div class="col-sm">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="name" aria-label="name"
                aria-describedby="email-addon">
            @error('name')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">surname</label>
        <div class="col-sm">
            <input type="text" name="surname" class="form-control" placeholder="surname" aria-label="surname"
                aria-describedby="email-addon">
            @error('surname')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">email</label>
        <div class="col-sm">
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
    <div class="form-group">
        <label class="col-sm-3 control-label">Retype password</label>
        <div class="col-sm">
            <input type="password" class="form-control" name="password_confirmation" />
            @error('password_confirmation')
            <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-5 col-sm-offset-3">
            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                up</button>
        </div>
    </div>
</form>
