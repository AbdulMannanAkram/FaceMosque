@extends('.frontend.layouts.layout')
@section('content')
    <section class="hero-section" id="section_1">
        <div class="section-overlay"></div>

        <div class="container d-flex justify-content-center align-items-center">
            <div class="row">

                <div class="col-11 mt-auto mb-5 text-center">
                    <small>Find a Mosque</small>
                    <div class="container">

                        <form class="form-inline" id="form-search">
                            <div class="row justify-content-md-center">
                                <div class="col-sm-8">
                                    <input class="form-control mr-sm-2" id="searchvalue" type="text" placeholder="Search" onkeyup="searchFilter()" aria-label="Search">
                                </div>
                                <div>
                                </div>
                                <div class="dropdown-content" id="list"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12 col-12 mt-auto d-flex flex-column flex-lg-row text-center">
                    <div class="date-wrap">
                        <h5 class="text-white" id="date-now">
                            <i class="custom-icon bi-clock me-2"></i>
                            10 - 12<sup>th</sup>, Dec 2023
                        </h5>
                    </div>

                    <div class="location-wrap mx-auto py-3 py-lg-0">

                        <h5 class="text-white" id="mosque-location">
                            <i class="custom-icon bi-geo-alt me-2"></i>
                            Syria
                        </h5>
                    </div>

                    <div class="social-share">
                        <ul class="social-icon d-flex align-items-center justify-content-center">
                            <span class="text-white me-3">Share:</span>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-facebook"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-twitter"></span>
                                </a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link">
                                    <span class="bi-instagram"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-wrap">
            <video id="video-back" autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="{{asset('video/video1.mp4')}}" type="video/mp4">

                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <section class="about-section section-padding" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-4 mb-lg-0 d-flex align-items-center">
                    <div class="services-info">
                        <h2 class="text-white mb-4">About Facemosque</h2>

                        <p class="text-white">Welcome to Facemosque, a vibrant online platform for the Muslim community to come together, connect, and share with each other.

                            As a member of the Facemosque community, you are part of a diverse group of Muslims from all over the world who come together to learn, grow, and connect with one another. Whether you are a student, a professional, or a homemaker, Facemosque provides you with a space where you can find like-minded individuals who share your faith, values, and interests.

                            At Facemosque, we believe in fostering a sense of community among our members. You can connect with others through our discussion forums, message boards, and chat rooms. Our platform also allows you to share your thoughts, experiences, and insights through blogs, articles, and other content.

                            We understand that being part of the Muslim community can be challenging at times, especially if you are living in a non-Muslim country or a place where Muslims are a minority. That's why we have created Facemosque as a safe and welcoming space where you can connect with others who understand and share your experiences.

                            We are committed to providing a platform that is respectful, inclusive, and supportive of all members of our community. We welcome people from all backgrounds, cultures, and beliefs who share our values of unity, compassion, and understanding.

                            We invite you to explore Facemosque and become part of our growing community. Whether you are looking for new friends, networking opportunities, or a place to share your ideas and insights, you will find it all here. Join us today and start connecting with other Muslims around the world!</p>



                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="about-text-wrap">
                        <img src="{{asset('images/pexels-alexander-suhorucov-6457579.jpg')}}" class="about-image img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="artists-section section-padding" id="section_3">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 text-center">
                    <h2 class="mb-4">Our Services- Arabic for Kids</h1>
                </div>

                <div class="text-center">
                    <p>Arabic is a beautiful language that has a rich history and culture. For kids, learning Arabic can be an exciting and rewarding experience. It opens up a whole new world of literature, poetry, and music, and helps them connect with the Arab world and its people. Arabic is also the language of the Quran, the holy book of Islam, which makes it an essential language for Muslim kids to learn. With its unique script and pronunciation, learning Arabic can be challenging, but it is also a fun and engaging process that can help kids develop cognitive, linguistic, and cultural skills that will benefit them for a lifetime.</p>
                    <p>We have gathered valuable data and materials for learning Arabic, which are highly beneficial for beginners. This resource includes a comprehensive roadmap that can aid teachers and families in guiding the learning process. By utilizing these materials, learners can gain a solid foundation in Arabic and enhance their language skills.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="schedule-section section-padding" id="section_4">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Where to Find facemosque Apps</h1>
                        <h1 class="text-white">Download our App</h1>
                        <p class="text-white">Get our app on your device and stay connected on the go.</p>
                        <div class="row">
                            <div class="col-md-6">

                                <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank">
                                    <img src="https://via.placeholder.com/200x200.png?text=Google+Play" alt="Google Play">
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://itunes.apple.com/us/app/example-app/id123456789?ls=1&mt=8" target="_blank">
                                    <img src="https://via.placeholder.com/200x200.png?text=App+Store" alt="App Store">
                                </a>
                            </div>
                        </div>



                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section section-padding section-bg" id="section_5">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center mb-4">Discover</h2>
                </div>

                <div id="Landon" class="tabcontent">
                    <div class="youtube-player" data-id="_iRMBPAW9rM"></div>

                </div>

                <div id="Paris" class="tabcontent">
                    <div class="youtube-player" data-id="yEQ-2GAxPLI"></div>

                </div>

                <div id="Tokyo" class="tabcontent">
                    <div class="youtube-player" data-id="aocWt4zTbz0"></div>

                </div>



                <button class="tablink" onclick="openCity('Landon', this, 'red')" id="defaultOpen">What Is Facemosque</button>
                <button class="tablink" onclick="openCity('Paris', this, 'green')">Installing Facemosque</button>
                <button class="tablink" onclick="openCity('Tokyo', this, 'blue')">More ..</button>

    </section>

    <section class="contact-section section-padding" id="section_6">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="text-center mb-4">Interested? Let's talk</h2>

                    <nav class="d-flex justify-content-center">
                        <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                             role="tablist">
                            <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactForm" type="button" role="tab"
                                    aria-controls="nav-ContactForm" aria-selected="false">
                                <h5>Contact Form</h5>
                            </button>

                            <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-ContactMap" type="button" role="tab"
                                    aria-controls="nav-ContactMap" aria-selected="false">
                                <h5>Google Maps</h5>
                            </button>
                        </div>
                    </nav>

                    <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                             aria-labelledby="nav-ContactForm-tab">
                            <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                                  role="form">
                                <div class="contact-form-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="text" name="contact-name" id="contact-name"
                                                   class="form-control" placeholder="Full name" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <input type="email" name="contact-email" id="contact-email"
                                                   pattern="[^ @]*@[^ @]*" class="form-control"
                                                   placeholder="Email address" required>
                                        </div>
                                    </div>

                                    <input type="text" name="contact-company" id="contact-company"
                                           class="form-control" placeholder="Company" required>

                                    <textarea name="contact-message" rows="3" class="form-control"
                                              id="contact-message" placeholder="Message"></textarea>

                                    <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                        <button type="submit" class="form-control">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                             aria-labelledby="nav-ContactMap-tab">
                            <iframe class="google-map"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
