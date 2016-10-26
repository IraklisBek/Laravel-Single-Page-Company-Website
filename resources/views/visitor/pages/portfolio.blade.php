<div class="container">
    <div class="row">
        <div class="heading-section col-md-12 text-center">
            <h2>{{ $data['generals']->portfolio_title }}</h2>
            <p>{{ $data['generals']->portfolio_secondary_title }}</p>
        </div> <!-- /.heading-section -->
    </div> <!-- /.row -->
    <div class="row">
        @foreach($data['portfolio'] as $port)
        <div class="portfolio-item col-md-3 col-sm-6">
            <div class="portfolio-thumb">
                <img src="visitor/images/gallery/{{$port->background_image}}" alt="">
                <div class="portfolio-overlay">
                    <h3>{{$port->title}}</h3>
                    <p>{{$port->body}}</p>
                    <a href="visitor/images/gallery/{{$port->background_image}}" data-rel="lightbox" class="expand">
                        <i class="fa fa-search"></i>
                    </a>
                </div> <!-- /.portfolio-overlay -->
            </div> <!-- /.portfolio-thumb -->
        </div> <!-- /.portfolio-item -->
        @endforeach
    </div> <!-- /.row -->
</div> <!-- /.container -->