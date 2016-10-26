
setInterval(function(){
    $('#service-1').css('background-color', $('#pickColor').css('backgroundColor'));
    $('#previewTitle').text($('#inputTitle').val());
    $('#previewBody').text($('#inputBody').val());
}, 1);

(function(){
    var originalAddClassMethod = jQuery.fn.addClass;
    jQuery.fn.addClass = function(){
        var result = originalAddClassMethod.apply( this, arguments );
        jQuery(this).trigger('cssClassChanged');
        return result;
    }
})();

$(function(){
    $("#myIconButton i").bind('cssClassChanged', function(){
        $('input[type=text]#myIconInput').val($('#myIconButton i').attr('class'));
        $('input[type=text]#myIconInput').attr('value', $('#myIconButton i').attr('class'));
        var preClass = $('#preview-service-icon').attr('class');
        $('#preview-service-icon').addClass($('#myIconButton i').attr('class')).removeClass(preClass);
    });
});
$(document).on("click", ".open-myModal", function () {
    var serviceId = $(this).data('id');
    $(".modal-footer #serviceId").click(function(){
        del(serviceId);
    });
});
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
function del(id){
    $.ajax({
        type: "DELETE",
        url: '/admin/services/' + id,
        success: function(data){
            $('#serviceView' + id).css('display', 'none');
            toastr.success('Service has been deleted');
            console.log("dsa");
        },
        error: function(data){
            console.log('Error:');
        }
    });
}