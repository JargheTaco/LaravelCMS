@include('front.layout.assets')
@include('front.layout.navbar')

<!-- Contact-->
<section class="page-section" style="padding-bottom: 165px" id="contact">
    <div class="container">
        <header class="header2" style="padding-top: 100px">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
        </header>
        <form id="contactForm" action="{{ url('/send-message') }}" method="POST">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Your Name *"
                            name="name" required />
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Your Email *"
                            name="email" required />
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                            name="phone" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="Your Message *" name="message" required></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send
                    Message</button>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif


    </div>
</section>

@include('front.layout.footer')
@include('front.layout.scripts')
@yield('content')