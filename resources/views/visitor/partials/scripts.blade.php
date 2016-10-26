

<script src="visitor/js/vendor/jquery-1.11.0.min.js"></script>

<script>window.jQuery || document.write('<script src="visitor/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
<script src="visitor/js/bootstrap.js"></script>
<script src="visitor/js/plugins.js"></script>
<script>
    function appendData(prevDiv, div, url){
        $.ajax({
            url: url,
            success: function (data) {
                //if ($(window).scrollTop() > $(prevDiv).scrollTop() && $(div).css('display')=='none') {
                    $(div).append(data);
                    $(div).css('display', 'block');
                    if (div.indexOf('#portfolio') == 0)
                        $('[data-rel="lightbox"]').lightbox();
                    if (div.indexOf('#contact') == 0) {
                        mapReady();
                    }
                //}
            }
        });
    }
    //$(window).scroll(function(){
        appendData('#sTop', '#services', '/services');
        appendData('#services', '#portfolio', '/portfolio');
        appendData('#portfolio', '#our-team', '/team');
        appendData('#portfolio', '#our-team', '/skills');
        appendData('#our-team', '#contact', '/contact');
    //});
    //test GitHub Live Action

</script>
<script src="visitor/js/main.js"></script>

<!-- Google Map -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="visitor/js/vendor/jquery.gmap3.min.js"></script>
<!-- Google Map Init-->
<script type="text/javascript">
    function mapReady(){
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
    }

</script>
<script>
    function closeMember(id) {
        $('#dummy').css('display', 'none');
        $('#dummy_'+id).css('display', 'none');
    }
    function openMember(id) {
        $('#dummy').css('display', 'block');
        $('#dummy_close'+id).css('display', 'block');
    }
</script>
<!-- templatemo 406 flex -->