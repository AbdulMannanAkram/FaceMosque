@extends('.controlPanel.layouts.layout')
@section('content')

<section class="pricing-section section-padding section-bg">
  <div class="form-bg d-flex justify-content-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="mt-5">Registration Form</h2>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('controlPanel.signup.post') }}" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label for="username">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary custom-btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var myElement = document.getElementById('sticky-wrapper');
        myElement.classList.add('is-sticky');
    });
</script>
</section>

<div class="modal fade" id="wrongCredentialsModal" tabindex="-1" role="dialog" aria-labelledby="wrongCredentialsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wrongCredentialsModalLabel">Wrong Credentials</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Your username or password is incorrect. Please try again.</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick='$("#wrongCredentialsModal").modal("hide");' class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
