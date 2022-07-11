$('#familyProduct-modal').on('hidden.bs.modal', function () {
    $('#familyProductForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});



// add Family Product data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let familyProductName  =  $('#familyProductName').val();
        let familyProductComment  =  $('#familyProductComment').val();
        let id = $('#familyProductId').val();

        // when add new Family Product
        if(currentEvent == 'add') {
            $("#familyProduct-submit-btn").css("display", "none")
            $("#familyProduct-submit-loading-btn").css("display", "block")
            let data = {
                name:familyProductName,
                comment:familyProductComment,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-family-product', '');
            const options = {
                method: 'post',
                url: url+'add-family-product',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#familyProduct-submit-btn").css("display", "block")
                    $("#familyProduct-submit-loading-btn").css("display", "none")
                    $("#familyProduct-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#familyProductForm').trigger("reset");
                    $("#familyProduct-modal").modal('hide');
                }else{
                    $("#familyProduct-submit-btn").css("display", "block")
                    $("#familyProduct-submit-loading-btn").css("display", "none")
                    $("#familyProduct-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#familyProduct-email-error-msg").css("display", "block")
                }else{
                    $("#familyProduct-error-msg").css("display", "block")
                }

                $("#familyProduct-submit-btn").css("display", "block")
                $("#familyProduct-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Family Product
        else if(currentEvent == 'update') {
            $("#familyProduct-update-btn").css("display", "none")
            $("#familyProduct-submit-loading-btn").css("display", "block")

            let data = {
                name:familyProductName,
                comment:familyProductComment,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-family-product', '');
            const options = {
                method: 'post',
                url: url + 'update-family-product',
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

                    $("#familyProduct-update-btn").css("display", "block")
                    $("#familyProduct-submit-loading-btn").css("display", "none")
                    $("#familyProduct-update-msg").css("display", "block")

                    $("#familyProduct-modal").modal('hide');
                    $('#familyProductForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#familyProduct-update-btn").css("display", "block")
                    $("#familyProduct-submit-loading-btn").css("display", "none")

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
                    //$("#familyProduct-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#familyProduct-update-btn").css("display", "block")
                $("#familyProduct-submit-loading-btn").css("display", "none")
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
    $("#familyProduct-success-msg").css("display", "none")
    $("#familyProduct-error-msg").css("display", "none")
    $('#familyProduct-blank-error-msg').css("display", "none")
    $("#familyProduct-email-error-msg").css("display", "none")
    $("#familyProduct-update-msg").css("display", "none")
    $("#familyProduct-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Family Product
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#familyProduct-modal-title").html('Add Family Product');
        $("#familyProduct-submit-btn").css("display", "block")
        $("#familyProduct-update-btn").css("display", "none")
    });
});


// edit Family Product
$( ".data-table" ).on( "click", "a.edit-familyProduct",
    function() {
        $('#currentEvent').val("update");
        $("#familyProduct-modal-title").html('Edit Family Product');
        $("#familyProduct-modal").modal('show');

        $("#familyProduct-submit-btn").css("display", "none")
        $("#familyProduct-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-family-product', '');
        const options = {
            method: 'post',
            url: url + 'view-family-product-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#familyProductName').val(objData.name);
            $('#familyProductComment').val(objData.comment);
            $('#familyProductId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Family Product
$( ".data-table" ).on( "click", "a.delete-familyProduct",
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
                url = url.replace('organization-admin/view-family-product', '');
                url = url + 'delete-family-product';

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
                    $('#familyProduct-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })


    });



