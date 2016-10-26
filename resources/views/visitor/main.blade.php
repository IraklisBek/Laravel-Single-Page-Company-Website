<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        @include('visitor.partials.head')
    </head>
    <body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

    <div>
        @include('visitor.partials.messages')
    </div>
    <div class="site-main" id="sTop">
        @include('visitor.partials.nav')
        @include('visitor.pages.slider')
    </div> <!-- /.site-main -->

    <div class="content-section" id="services" style="display: none">
    </div> <!-- /#services -->

    <div class="content-section" id="portfolio" style="display:none">
    </div> <!-- /#portfolio -->

    <div class="content-section" id="our-team" style="display: none">
    </div> <!-- /#our-team -->

    <div class="content-section" id="contact" style="display:none">
        @include('visitor.pages.contact')
    </div> <!-- /#contact -->

    @include('visitor.partials.footer')
    @include('visitor.partials.scripts')
    @yield('scripts')
    </body>
</html>