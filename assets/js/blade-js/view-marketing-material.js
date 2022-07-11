$('#marMat-modal').on('hidden.bs.modal', function () {
    $('#marketingMaterialForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add marketing material data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let marMatName  =  $('#marMatName').val();
        let marMatType  =  $('#marMatType').val();
        let id = $('#marMatId').val();

        // when add new marketing material
        if(currentEvent == 'add') {
            $("#marMat-submit-btn").css("display", "none")
            $("#marMat-submit-loading-btn").css("display", "block")
            let data = {
                name:marMatName,
                type:marMatType,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-marketing-material', '');
            const options = {
                method: 'post',
                url: url+'add-marketing-material',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#marMat-submit-btn").css("display", "block")
                    $("#marMat-submit-loading-btn").css("display", "none")
                    $("#marMat-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#marketingMaterialForm').trigger("reset");
                    $("#marMat-modal").modal('hide');
                }else{
                    $("#marMat-submit-btn").css("display", "block")
                    $("#marMat-submit-loading-btn").css("display", "none")
                    $("#marMat-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#marMat-email-error-msg").css("display", "block")
                }else{
                    $("#marMat-error-msg").css("display", "block")
                }

                $("#marMat-submit-btn").css("display", "block")
                $("#marMat-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing marketing material
        else if(currentEvent == 'update') {
            $("#marMat-update-btn").css("display", "none")
            $("#marMat-submit-loading-btn").css("display", "block")

            let data = {
                name:marMatName,
                type:marMatType,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-marketing-material', '');
            const options = {
                method: 'post',
                url: url + 'update-marketing-material',
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

                    $("#marMat-update-btn").css("display", "block")
                    $("#marMat-submit-loading-btn").css("display", "none")
                    $("#marMat-update-msg").css("display", "block")

                    $("#marMat-modal").modal('hide');
                    $('#marketingMaterialForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#marMat-update-btn").css("display", "block")
                    $("#marMat-submit-loading-btn").css("display", "none")

                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status===422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#marMat-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#marMat-update-btn").css("display", "block")
                $("#marMat-submit-loading-btn").css("display", "none")
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
    $("#marMat-success-msg").css("display", "none")
    $("#marMat-error-msg").css("display", "none")
    $("#marMat-email-error-msg").css("display", "none")
    $("#marMat-update-msg").css("display", "none")
    $("#marMat-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
    $("#modal-error-msg").css('display', 'none')
}


// when click add marketing material
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#marMat-modal-title").html('Add Marketing Material');
        $("#marMat-submit-btn").css("display", "block")
        $("#marMat-update-btn").css("display", "none")
    });
});


// edit Marketing Material
$( ".data-table" ).on( "click", "a.edit-marMat",
    function() {
        $('#currentEvent').val("update");
        $("#marMat-modal-title").html('Edit Marketing Material');
        $("#marMat-modal").modal('show');

        $("#marMat-submit-btn").css("display", "none")
        $("#marMat-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-marketing-material', '');
        const options = {
            method: 'post',
            url: url + 'view-marketing-material-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#marMatName').val(objData.name);
            $('#marMatType').val(objData.type).trigger("change");
            $('#marMatId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete marketing material
$( ".data-table" ).on( "click", "a.delete-marMat",
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
                url = url.replace('organization-admin/view-marketing-material', '');
                url = url + 'delete-marketing-material';

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
                    $('#marMat-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



