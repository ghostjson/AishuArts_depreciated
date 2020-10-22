@extends('layouts.ecommerce')
@section('contents')
            <!-- CONTENT -->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3 class="text-uppercase">Get In Touch</h3>
                            <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum bibendum.</p>
                            <div class="m-t-30">
                                <form class="widget-contact-form" action="/sendMessage" role="form" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" aria-required="true" name="widget-contact-form-name" required class="form-control required name" placeholder="Enter your Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" aria-required="true" name="widget-contact-form-email" required class="form-control required email" placeholder="Enter your Email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="subject">Your Subject</label>
                                            <input type="text" name="widget-contact-form-subject" required class="form-control required" placeholder="Subject...">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea type="text" name="widget-contact-form-message" required rows="5" class="form-control required" placeholder="Enter your Message"></textarea>
                                    </div>
                                    <!--  <div class="form-group">
                                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                        <div class="g-recaptcha" data-sitekey="6LddCxAUAAAAAKOg0-U6IprqOZ7vTfiMNSyQT2-M"></div>
                                    </div>  -->
                                    <button class="btn" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="text-uppercase">Address & Map</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <address>
                                        <strong>Polo, Inc.</strong><br>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        <abbr title="Phone">P:</h4> (123) 456-7890
                                    </address>
                                </div>
                                <div class="col-lg-6">
                                    <address>
                                        <strong>Polo Office</strong><br>
                                        795 Folsom Ave, Suite 600<br>
                                        San Francisco, CA 94107<br>
                                        <abbr title="Phone">P:</h4> (123) 456-7890
                                    </address>
                                </div>
                            </div>
                            <!-- Google Map -->
                            {{-- <div class="map" data-latitude="-37.817240" data-longitude="144.955826" data-style="light" data-info="Hello from &lt;br&gt; Inspiro Themes"></div> --}}
                            <!-- end: Google Map -->
                        </div>
                    </div>
                </div>
            </section> <!-- end: Content -->
@endsection