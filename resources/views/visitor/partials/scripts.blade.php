<script src="visitor/js/vendor/jquery-1.11.0.min.js"></script>
<script>window.jQuery || document.write('<script src="visitor/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="visitor/js/bootstrap.js"></script>
<script src="visitor/js/plugins.js"></script>
<script src="visitor/js/main.js"></script>

<!-- Google Map -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="visitor/js/vendor/jquery.gmap3.min.js"></script>

<!-- Google Map Init-->
<script type="text/javascript">
    jQuery(function($){
        $('#map_canvas').gmap3({
            marker:{
                address: '{{ $data['generals']->company_lat }}, {{ $data['generals']->company_lng }}'
            },
            map:{
                options:{
                    zoom: 15,
                    scrollwheel: false,
                    streetViewControl : true
                }
            }
        });

        /* Simulate hover on iPad
         * http://stackoverflow.com/questions/2851663/how-do-i-simulate-a-hover-with-a-touch-in-touch-enabled-browsers
         --------------------------------------------------------------------------------------------------------------*/
        $('body').bind('touchstart', function() {});
    });
</script>
<script>
    function appendData(div, url){
        $.ajax({
            url: url,
            success: function (data) {
                $('#appends').append('<div class="content-section" id="services">' + data + '</div>');
            }
        });
    }
    var firedServices = false;
    var firedPortfolio = false;
    window.addEventListener("scroll", function(){
        /*if ($(window).scrollTop() > $('#sTop').offset().top && firedServices === false) {
            appendData('services');
            firedServices = true;
        }*/
        /*if ($(window).scrollTop() > $('#sTop').offset().top && firedPortfolio === false) {
            appendData('portfolio');
            firedPortfolio = true;
        }*/
    }, true);

</script>








<!-- templatemo 406 flex -->