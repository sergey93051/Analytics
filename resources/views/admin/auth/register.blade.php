@extends('admin.layouts.app')
@section('content')
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
        style="background-image: url('{{asset("/assets/img/curved-images/curved14.jpg")}}');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                    <p class="text-lead text-white">create new account in your project</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body">
                        <div class="card-header text-center pt-4">
                            <h5>Sign up</h5>
                        </div>
                        @include('admin.auth.form.registerForm')
                    </div>
                    <div class="card-footer text-start pl-2 pt-0">
                        <p class="mb-4 text-sm mx-auto">
                            Already have an account?
                            <a href="{{route("login")}}" class="text-info text-gradient font-weight-bold">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function() {
        registerValidation($('#contact_form'));
    });
</script>
@endpush
