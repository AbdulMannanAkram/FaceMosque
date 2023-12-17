@extends('.controlPanel.layouts.layout')
@section('content')
    <section class="pricing-section section-padding section-bg">
        <div class="form-bg d-flex justify-content-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <h2 class="mt-5">Control Panel Dashboard</h2>
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
