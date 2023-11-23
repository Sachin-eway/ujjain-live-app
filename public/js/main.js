$(document).ready(function () {
    if ($(".message").val() == '') {
       
    }else{
        $(".message").css('display', 'block').fadeOut(8000);
        }
});

$("#imageInput").change(function() {
        const selectedFile = this.files[0];
        if (selectedFile) {
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").attr("src", e.target.result).show();
            };
            reader.readAsDataURL(selectedFile);
        } else {
            // If no file is selected, hide the image preview
            $("#imagePreview").show();
        }
    });
$("#logoInput").change(function() {
        const selectedFile = this.files[0];
        if (selectedFile) {
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#logoPreview").attr("src", e.target.result).show();
            };
            reader.readAsDataURL(selectedFile);
        } else {
            // If no file is selected, hide the image preview
            $("#logoPreview").show();
        }
    });
$("#slider_img_1").change(function() {
        const selectedFile = this.files[0];
        if (selectedFile) {
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#img1Preview").attr("src", e.target.result).show();
            };
            reader.readAsDataURL(selectedFile);
        } else {
            // If no file is selected, hide the image preview
            $("#img1Preview").show();
        }
    });
$("#slider_img_2").change(function() {
        const selectedFile = this.files[0];
        if (selectedFile) {
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#img2Preview").attr("src", e.target.result).show();
            };
            reader.readAsDataURL(selectedFile);
        } else {
            // If no file is selected, hide the image preview
            $("#img2Preview").show();
        }
    });
$("#slider_img_3").change(function() {
        const selectedFile = this.files[0];
        if (selectedFile) {
            // Display the selected image
            const reader = new FileReader();
            reader.onload = function(e) {
                $("#img3Preview").attr("src", e.target.result).show();
            };
            reader.readAsDataURL(selectedFile);
        } else {
            // If no file is selected, hide the image preview
            $("#img3Preview").show();
        }
    });

function showOverlay() {
        $('#overlay').css('display', 'block');
    }

    // Function to hide the overlay
    function hideOverlay() {
        $('#overlay').css('display', 'none');
        $("form").trigger("reset");
        $('.text-red').html('');
    }

    // Add event listeners to show/hide overlay when modal is shown/hidden
    $('#myModal').on('show.bs.modal', showOverlay );
    $('#myModal').on('hide.bs.modal', hideOverlay);