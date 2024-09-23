@extends('admin.layouts.layout')
@section('content')
<!-- Main Content -->

<section class="section">
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item text-warning"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active text-primary">Profile</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">اَلسَلامُ عَلَيْكُم وَرَحْمَةُ اَللهِ وَبَرَكاتُهُ, {{ $user->name }}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Information</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ old('name', $user->name) }}" required="">
                                    @if($errors->has('name'))
                                    <code>{{ $errors->first('name') }}</code>
                                    @endif
                                </div>

                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ old('email', $user->email) }}" required="">
                                    @if($errors->has('email'))
                                    <code>{{ $errors->first('email') }}</code>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Update Password</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="form-group  col-12">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control"
                                         required="" autocomplete="current-password">
                                    @if($errors->updatePassword->has('current_password'))
                                    <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label>New Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                         required="">
                                    @if($errors->updatePassword->has('password'))
                                    <code>{{ $errors->updatePassword->first('password') }}</code>
                                    @endif
                                </div>

                                <div class="form-group col-12">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"  class="form-control" required="">
                                    @if($errors->updatePassword->has('password_confirmation'))
                                    <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
