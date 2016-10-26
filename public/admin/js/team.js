$(document).on("click", ".open-myModal", function () {
    var memberId = $(this).data('id');
    $(".modal-footer #memberId").click(function(){
        del(memberId);
    });
});
$('#blah').css('width', $(window).width() * 0.12);
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
var myImage = document.getElementById('blah');
myImage.addEventListener('load', function() {
    var res = myImage.width/myImage.height;
    if(res<0.9 || res>1.1){
        alert("Image has nor proper dimentions. Please choose another one.");
        $("#image").replaceWith($("#image").val('').clone(true));
        $('#blah').css('width', '0');
    }

});
function readURL(files) {
    if (files && files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width($(window).width() * 0.12)
        };
        reader.readAsDataURL(files[0]);
    }
}

function del(id){
    $.ajax({
        type: "DELETE",
        url: '/admin/team/' + id,
        success: function(data){
            $('#teamView' + id).css('display', 'none');
            toastr.success('Slide has been deleted');
            console.log("dsa");
        },
        error: function(data){
            console.log('Error:');
        }
    });
}