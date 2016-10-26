<div class="site-slider">
    <div class="slider">
        <div class="flexslider">
            <ul class="slides">
                @foreach($data['slides'] as $slide)
                    <li>
                        <div class="overlay"></div>
                        <img src="visitor/images/slider/{{ $slide->image }}" alt="">
                        <div class="slider-caption visible-md visible-lg">
                            <h2>{{ $slide->main_title }}</h2>
                            <p>{{ $slide->secondary_title }}</p>
                            <a href="#" class="slider-btn">{{ $slide->button }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div> <!-- /.flexslider -->
    </div> <!-- /.slider -->
</div> <!-- /.site-slider -->