@extends('dashboard')

@section('userdashboard_content')
    <div class="card-body">
        <form action="{{ route('author.user.update.password') }}" method="post">
            @csrf
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Current Password Field <span>*</span></label>
                <div class="controls">
                    <input type="password" name="current_password" class="form-control" required=""
                        data-validation-required-message="This field is required">
                    <div class="help-block"></div>
                </div>
                @error('current_password')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">New Password Input Field <span>*</span></label>
                <div class="controls">
                    <input type="password" name="password" class="form-control" required=""
                        data-validation-required-message="This field is required">
                    <div class="help-block"></div>
                </div>
                @error('password')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Confirm Password Input Field <span>*</span></label>
                <div class="controls">
                    <input type="password" name="password_confirmation" data-validation-match-match="password"
                        class="form-control" required="">
                    <div class="help-block"></div>
                </div>
                @error('password_confirmation')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-xs-right">
                <button type="submit" class="btn btn-rounded btn-primary mb-5">Update</button>
            </div>
        </form>
    </div><br>
@endsection
