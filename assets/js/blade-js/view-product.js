$('#product-modal').on('hidden.bs.modal', function () {
    $('#productForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add product data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let productType  =  $('#productType').val();
        let productBarcode  =  $('#productBarcode').val();
        let productPrice  =  $('#productPrice').val();
        let productFamily  =  $('#productFamily').val();
        let productComment  =  $('#productComment').val();
        let id = $('#productId').val();

        // when add new product
        if(currentEvent == 'add') {
            $("#product-submit-btn").css("display", "none")
            $("#product-submit-loading-btn").css("display", "block")
            let data = {
                type:productType,
                barcode:productBarcode,
                retail_price:productPrice,
                family:productFamily,
                comment:productComment,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-product', '');
            const options = {
                method: 'post',
                url: url+'add-product',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#product-submit-btn").css("display", "block")
                    $("#product-submit-loading-btn").css("display", "none")
                    $("#product-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#productForm').trigger("reset");
                    $("#product-modal").modal('hide');
                }else{
                    $("#product-submit-btn").css("display", "block")
                    $("#product-submit-loading-btn").css("display", "none")
                    $("#product-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#product-email-error-msg").css("display", "block")
                }else{
                    $("#product-error-msg").css("display", "block")
                }

                $("#product-submit-btn").css("display", "block")
                $("#product-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing product
        else if(currentEvent == 'update') {
            $("#product-update-btn").css("display", "none")
            $("#product-submit-loading-btn").css("display", "block")

            let data = {
                type:productType,
                barcode:productBarcode,
                retail_price:productPrice,
                family:productFamily,
                comment:productComment,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-product', '');
            const options = {
                method: 'post',
                url: url + 'update-product',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };

            console.log(options);

            axios(options).then(res=>{
                console.log(res);
                if(res.data=="success"){

                    $("#product-update-btn").css("display", "block")
                    $("#product-submit-loading-btn").css("display", "none")
                    $("#product-update-msg").css("display", "block")

                    $("#product-modal").modal('hide');
                    $('#productForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#product-update-btn").css("display", "block")
                    $("#product-submit-loading-btn").css("display", "none")

                }
                msgAlert();
            }).catch(error=>{
                console.log(error.response.data);
                if(error.response.status===422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#product-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#product-update-btn").css("display", "block")
                $("#product-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }

    }
});



// after form submission show the alert for 3 sec


// let timeout;
//
function msgAlert() {
    setTimeout(alertFunc, 5000);
}

function alertFunc() {
    $("#product-success-msg").css("display", "none")
    $("#product-error-msg").css("display", "none")
    $('#product-blank-error-msg').css("display", "none")
    $("#product-email-error-msg").css("display", "none")
    $("#product-update-msg").css("display", "none")
    $("#product-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add product
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#product-modal-title").html('Add Product');
        $("#product-submit-btn").css("display", "block")
        $("#product-update-btn").css("display", "none")
    });
});


// edit Product
$( ".data-table" ).on( "click", "a.edit-product",
    function() {
        $('#currentEvent').val("update");
        $("#product-modal-title").html('Edit Product');
        $("#product-modal").modal('show');

        $("#product-submit-btn").css("display", "none")
        $("#product-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-product', '');
        const options = {
            method: 'post',
            url: url + 'view-product-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#productType').val(objData.type);
            $('#productBarcode').val(objData.barcode);
            $('#productPrice').val(objData.retail_price);
            $('#productFamily').val(objData.family).trigger("change");
            $('#productComment').val(objData.comment);
            $('#productId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Product
$( ".data-table" ).on( "click", "a.delete-product",
    function() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false,
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                let data = {
                    id : $(this).attr("data-id")
                }

                let url = window.location.href;
                url = url.replace('organization-admin/view-product', '');
                url = url + 'delete-product';

                const options = {
                    method: 'post',
                    url: url,
                    data:data,
                    transformResponse: [(data) => {
                        // transform the response

                        return data;
                    }]
                };

                axios(options).then(res=>{
                    updateDataTable();
                    $('#product-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



