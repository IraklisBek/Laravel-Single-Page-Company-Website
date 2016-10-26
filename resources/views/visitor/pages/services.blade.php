<div class="container">
    <div class="row">
        <div class="heading-section col-md-12 text-center">
            <h2>{{ $data['generals']->services_title }}</h2>
            <p>{{ $data['generals']->services_secondary_title }}</p>
        </div> <!-- /.heading-section -->
    </div> <!-- /.row -->
    <div class="row">
        @foreach($data['services'] as $service)
        <div class="col-md-3 col-sm-6">
            <div class="service-item" style="background-color: <?php echo "#$service->background_color"; ?>">
                <div class="service-icon">
                    <i class="{{ $service->icon }}"></i>
                </div> <!-- /.service-icon -->
                <div class="service-content">
                    <div class="inner-service">
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->body }}</p>
                    </div>
                </div> <!-- /.service-content -->
            </div> <!-- /#service-1 -->
        </div> <!-- /.col-md-3 -->
        @endforeach
    </div> <!-- /.row -->
</div> <!-- /.container -->