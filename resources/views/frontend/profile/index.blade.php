@extends('dashboard')

@section('userdashboard_content')
    <div class="card-body">
        <form action="{{ route('author.user.profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id"{{-- value="{{ $user->id }}" --}}>
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                <input type="name" name="name" class="form-control unicase-form-control text-input"
                    id="exampleInputEmail1" {{-- value="{{ $user->id }}" --}}>
            </div>
            @error('name')
                <span class="alert text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                <input type="email" name="email" class="form-control unicase-form-control text-input"
                    id="exampleInputEmail1" {{-- value="{{ $user->id }}" --}}>
            </div>
            @error('email')
                <span class="alert text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                <input type="text" name="phone_number" class="form-control unicase-form-control text-input"
                    id="exampleInputEmail1" {{-- value="{{ $user->phone_number }}" --}}>
            </div>
            @error('phone_number')
                <span class="alert text-danger">{{ $message }}</span>
            @enderror
            <div class="text-xs-right">
                <button type="submit" class="btn btn-rounded btn-primary mb-5">Update Profile</button>
            </div>
        </form>
    </div><br>
@section('frontend_script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
@endsection



