<div class="container">
    <div class="row">
        <div class="heading-section col-md-12 text-center">
            <h2>{{ $data['generals']->contact_title }}</h2>
            <p>{{ $data['generals']->contact_secondary_title }}</p>
        </div> <!-- /.heading-section -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="googlemap-wrapper">
                <div id="map_canvas" class="map-canvas"></div>
            </div> <!-- /.googlemap-wrapper -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <div class="row">
        <div class="col-md-7 col-sm-6">
            <p>{!! $data['generals']->contact_body !!}
            </p>
            <ul class="contact-info">
                <li>Phone: {{ $data['generals']->company_phone }}</li>
                <li>Email: {{ $data['generals']->company_email }}</li>
                <li>Address: {{ $data['generals']->company_address }}</li>
            </ul>
            <!-- spacing for mobile viewing --><br><br>
        </div> <!-- /.col-md-7 -->
        <div class="col-md-5 col-sm-6">
            <div class="contact-form">
                <form method="post" name="contactform" id="contactform">
                    <p>
                        <input name="name" type="text" id="name" placeholder="Your Name">
                    </p>
                    <p>
                        <input name="email" type="text" id="email" placeholder="Your Email">
                    </p>
                    <p>
                        <input name="subject" type="text" id="subject" placeholder="Subject">
                    </p>
                    <p>
                        <textarea name="comments" id="comments" placeholder="Message"></textarea>
                    </p>
                    <input type="submit" class="mainBtn" id="submit" value="Send Message">
                </form>
            </div> <!-- /.contact-form -->
        </div> <!-- /.col-md-5 -->
    </div> <!-- /.row -->
</div> <!-- /.container -->