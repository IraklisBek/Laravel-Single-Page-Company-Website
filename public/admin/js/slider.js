$(document).on("click", ".open-myModal", function () {
    var slideId = $(this).data('id');
    $(".modal-footer #slideId").click(function(){
        del(slideId);
    });
    $('#blah').css('width', $(window).width()*0.3);
});


var myImage = document.getElementById('blah');
myImage.addEventListener('load', function() {
    var res = myImage.width/myImage.height;
    if(res<1.6 || res>2.2){
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
                .width($(window).width() * 0.3)
        };
        reader.readAsDataURL(files[0]);
    }
}
function showIFramePostView(e, mainTitle, secondaryTitle, button){
    $('#showPreview').attr("src", $(e).attr('src'));
    $('#slideText').css('margin-left', (screen.width*0.9 - $('#slideText').width())/2);
    if(e.indexOf('#blah') == 0) {
        $('#showMainTitle').text($('#mainTitle').val().toUpperCase());
        $('#showSecondaryTitle').text($('#secondaryTitle').val().toUpperCase());
        $('#showButton').text($('#button').val().toUpperCase());
    }else{
        $('#showMainTitle').text(mainTitle.toUpperCase());
        $('#showSecondaryTitle').text(secondaryTitle.toUpperCase());
        $('#showButton').text(button.toUpperCase());
    }
    $('#frame, #slideText, #dummy-nav').css("display", "inline-block").animate({
        opacity: 1
    }, 1000, function() {
        // Animation complete.
    });
}
function closeViewPostFrame(e){
    $('#frame, #slideText, #dummy-nav').animate({
        opacity: 0,
    }, 1000, function() {
        // Animation complete.
    });
    setTimeout(function(){
        $('#frame, #slideText').css("display", "none");
    },1000);
}
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
        url: '/admin/slider/' + id,
        success: function(data){
            $('#slidesView' + id).css('display', 'none');
            toastr.success('Slide has been deleted');
            console.log("dsa");
        },
        error: function(data){
            console.log('Error:');
        }
    });
}