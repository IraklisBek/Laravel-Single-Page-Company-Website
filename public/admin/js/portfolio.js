setInterval(function(){
    $('#previewTitle').text($('#inputTitle').val());
    $('#previewBody').text($('#inputBody').val());
}, 1);

$(document).on("click", ".open-myModal", function () {
    var portId = $(this).data('id');
    $(".modal-footer #portId").click(function(){
        del(portId);
    });
});


var myImage = document.getElementById('blah');
myImage.addEventListener('load', function() {
    var res = myImage.width/myImage.height;
    if(res<0.8 || res>1.2){
        alert("Image has nor proper dimentions. Please choose another one.");
        $("#background_image").replaceWith($("#background_image").val('').clone(true));
        $('#blah').css('width', '0');
    }

});
function readURL(files) {
    if (files && files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width($(window).width() * 0.18)
        };
        reader.readAsDataURL(files[0]);
    }
}

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#sameImage').click(function(){
        var r = '<?php echo $port->background_image ?>';
        $("#background_image").replaceWith($("#background_image").val(r).clone(true));
    });
});
function del(id){
    $.ajax({
        type: "DELETE",
        url: '/admin/portfolio/' + id,
        success: function(data){
            $('#portView' + id).css('display', 'none');
            toastr.success('Portfolio has been deleted');
            console.log("dsa");
        },
        error: function(data){
            console.log('Error:');
        }
    });
}