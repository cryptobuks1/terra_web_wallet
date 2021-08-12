"use strict";

!function (NioApp, $) {
    var kycUpload;

    function extend(obj, ext) {
        Object.keys(ext).forEach(function (key) {
            obj[key] = ext[key];
        });
        return obj;
    }

    NioApp.coms.docReady.push(function () {
        NioApp.KycFront.init();
    });
    NioApp.KycFront = function (elm, opt) {
        // if ($(elm).exists()) {
        //     $(elm).each(function () {
        //         var def = {autoDiscover: false},
        //             attr = (opt) ? extend(def, opt) : def;
        //         $(this).addClass('dropzone').dropzone(attr);
        //     });
        // }
    };
    NioApp.KycFront.init = function () {
        $('.upload-kyc-front').addClass('dropzone');
        kycUpload = new Dropzone('.upload-kyc-front',
            {
                url: "/register/kyc-upload",
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                maxFilesize: 8,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                init: function () {
                    this.on("sending", function (file, xhr, formData) {
                        formData.append("id_type", $('input:checked[name="id-proof"]').attr('id'));
                    });
                },
                removedfile: function (file) {
                    var filename = file.upload.filename;
                    $.ajax({
                        type: 'POST',
                        url: '/register/kyc-delete',
                        data: {"_token": $('meta[name="csrf-token"]').attr('content'), filename: filename},
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },
                success: function (file, response) {
                    file.upload.filename = response.filename;
                    var fileuploded = file.previewElement.querySelector("[data-dz-name]");
                    fileuploded.innerHTML = response.filename;
                },
            });
    };
    $('#kycSubmitBtn').on('click', function () {
        event.preventDefault();
        if(!kycUpload.getAcceptedFiles().length){
            $('.kyc-upload-alert').removeClass('d-none');
        }else if(!$('#tc-agree').is(':checked')||!$('#info-assure').is(':checked')){
            $('.kyc-agree-alert').removeClass('d-none');
        }else{
            $('#kycSubmitForm').submit();
        }
    })

}
(NioApp, jQuery);
