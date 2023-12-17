@extends('.frontend.layouts.layout')
@section('content')
    <section class="pricing-section section-padding section-bg">
        <div class="form-bg d-flex justify-content-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h2 class="mt-5">Login</h2>
                                <form method="post" action="{{ route('controlPanel.login.post') }}" class="mt-4">
                                    @csrf
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
                                    <button type="submit" class="btn btn-primary custom-btn">Login</button>
                                    <a class="btn btn-primary custom-btn" href="signup.html">Register</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="application/javascript">
        $(document).ready(function() {
            var myElement = document.getElementById('sticky-wrapper');
            myElement.classList.add('is-sticky');
        });
    </script>
@endsection
