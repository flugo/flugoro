/**
 * Image Editor
 * Created by Catirau Mihail on 24.12.13.
 */

var image_changed = false;

$(document).ready(function() {

    var btnUpload       = $('#img_action_upload');
    var status          = $('#status');
    var outputImage     = $('#outputImage');
    var img_filename    = $('#image_filename');
    var sizer           = $('#sizer');

// -------------------------------------------------------------------------------------------
//  UPLOAD FILES
// -------------------------------------------------------------------------------------------
        new AjaxUpload(btnUpload, {
            action: 'http://localhost/flugo/admin.php/image/upload',
            name: 'Filedata',
            onSubmit: function(file, ext){
                if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){
                    // extension is not allowed
                    status.text('Only JPG, PNG or GIF files are allowed');
                    return false;
                }
                var ias = outputImage .imgAreaSelect({ instance: true });
                ias.cancelSelection();
                status.text('Uploading...');
            },
            onComplete: function(file, response){
                response = JSON.parse(response);
                var ias = outputImage .imgAreaSelect({ instance: true });
                ias.cancelSelection();
                if(response.status === "success"){
                    outputImage .attr('src',baseURL + response.filename);
                    outputImage .removeAttr('width');
                    img_filename .val(response.filename);
                    sizer.attr('max',response.imgWidth).val(response.imgWidth);
                }
                status.text(response.message);

            }
        });


// -------------------------------------------------------------------------------------------
//  IMAGE RESIZE VISUAL - CSS BASED RESIZE
// -------------------------------------------------------------------------------------------
    sizer.change(
        function(){
            var size = parseInt(sizer.get(0).value);
            var ias = outputImage .imgAreaSelect({ instance: true });
            ias.cancelSelection();
            outputImage .attr('width', size);
        }
    );

// -------------------------------------------------------------------------------------------
//  IMAGE RESIZE PERMANENT - PHP BASED RESIZE
// -------------------------------------------------------------------------------------------
    $('#img_action_resize').click(
        function(){
            var ias = outputImage .imgAreaSelect({ instance: true });
            $.ajax({
                type: "POST",
                url: 'http://localhost/flugo/admin.php/image/resize',
                data: {
                    width: sizer.val(),
                    filename : img_filename .val()
                },
                success: function(response){
                    console.log(response);
                    response = JSON.parse(response);
                    if(response.status === "success"){
                        ias.cancelSelection();
                        outputImage .attr('src',baseURL + response.filename);
                        outputImage .removeAttr('width');
                        img_filename .val(response.filename);
                        sizer.attr('max',response.imgWidth).val(response.imgWidth);
                    }
                    status.text(response.message);
                },
                error: function(){
                    alert('Error!');
                }
            });
        }
    );

// -------------------------------------------------------------------------------------------
//  IMAGE CROP PERMANENT - PHP BASED CROP
// -------------------------------------------------------------------------------------------
    $('#img_action_crop').click(
        function(){
            var ias = outputImage .imgAreaSelect({ instance: true });
            var selection = ias.getSelection();

            if (!selection.width || !selection.height){
                alert('Trebuie mai intii sa faceti o selectie');
                return;
            }

            console.log(selection); //return;

            $.ajax({
                type: "POST",
                url: 'http://localhost/flugo/admin.php/image/crop',
                data: {
                    width       : sizer.val(),
                    filename    : img_filename.val(),
                    x1          : selection.x1,
                    y1          : selection.y1,
                    sw          : selection.width,
                    sh          : selection.height
                },
                success: function(response){
                    console.log(response);
                    response = JSON.parse(response);
                    if(response.status === "success"){
                        ias.cancelSelection();
                        outputImage .attr('src',baseURL + response.filename);
                        outputImage .removeAttr('width');
                        img_filename .val(response.filename);
                        sizer.attr('max', response.imgWidth).val(response.imgWidth);
                    }
                    status.text(response.message);
                },
                error: function(){
                    alert('Error!');
                }
            });
        }
    );

// -------------------------------------------------------------------------------------------
//  IMAGE FLIP PERMANENT - PHP BASED FLIP
// -------------------------------------------------------------------------------------------
    $('#img_action_flip').click(
        function(){
            var ias = outputImage .imgAreaSelect({ instance: true });
            $.ajax({
                type: "POST",
                url: 'http://localhost/flugo/admin.php/image/flip',
                data: {
                    width       : sizer.val(),
                    filename    : img_filename.val(),
                    mode        : 'horizontal'
                },
                success: function(response){
                    console.log(response);
                    response = JSON.parse(response);
                    if(response.status === "success"){
                        ias.cancelSelection();
                        outputImage .attr('src',baseURL + response.filename);
                        outputImage .removeAttr('width');
                        img_filename .val(response.filename);
                        sizer.attr('max', response.imgWidth).val(response.imgWidth);
                    }
                    status.text(response.message);
                },
                error: function(){
                    alert('Error!');
                }
            });
        }
    );

    $('#change-image').click(
        function (){
            outputImage .attr('src', baseURL + $('.model_image').val());
            outputImage .removeAttr('width');
            outputImage .imgAreaSelect({ maxWidth: 400, maxHeight: 200, minWidth: 400, minHeight: 200, handles: true });
            img_filename .val($('.model_image').val());
            $('#myModal').modal('show');
        }
    );

    $('#accept_image').click( function (){
        if(img_filename.val()!= undefined){
            $('.model_image').val(img_filename.val());
            $('#preview').attr('src', baseURL + $('.model_image').val())
        }
        $('#myModal').modal('hide');
    });


});

