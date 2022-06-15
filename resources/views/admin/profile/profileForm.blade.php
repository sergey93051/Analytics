<div class="card  form-edit-profile" style="display:none;">
    <form role="form" id="contact_form" action="{{route('profile.update',Auth::user()->id)}}" method="post"
        class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-3 control-label">name</label>
            <div class="col-sm">
                @method("PUT")
                @csrf
                <input value="{{Auth::user()->name}}" type="text" name="name" class="form-control" placeholder="name"
                    aria-label="name" aria-describedby="email-addon">
                @error('name')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">surname</label>
            <div class="col-sm">
                <input value="{{Auth::user()->surname}}" type="text" name="surname" class="form-control"
                    placeholder="surname" aria-label="surname" aria-describedby="email-addon">
                @error('surname')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">email</label>
            <div class="col-sm">
                <input value="{{Auth::user()->email}}" type="email" name="email" class="form-control"
                    placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                @error('email')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Password</label>
            <div class="col-sm">
                <input type="password" class="form-control pass-input" name="password"
                    placeholder="change your password" />
                @error('password')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">image</label>
            <div class="col-sm">
                <input type="file" class="form-control" name="img" />
                @error('img')
                <small class="help-block">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-3">
                <button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2">update</button>
            </div>
        </div>
    </form>
</div>
