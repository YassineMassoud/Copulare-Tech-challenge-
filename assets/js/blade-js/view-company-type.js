$('#companyType-modal').on('hidden.bs.modal', function () {
    $('#companyTypeForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add Type data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let companyTypeName  =  $('#companyTypeName').val();
        let id = $('#companyTypeId').val();

        // when add new Type
        if(currentEvent == 'add') {
            $("#companyType-submit-btn").css("display", "none")
            $("#companyType-submit-loading-btn").css("display", "block")
            let data = {
                name:companyTypeName,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-company-type', '');
            const options = {
                method: 'post',
                url: url+'add-company-type',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#companyType-submit-btn").css("display", "block")
                    $("#companyType-submit-loading-btn").css("display", "none")
                    $("#companyType-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#companyTypeForm').trigger("reset");
                    $("#companyType-modal").modal('hide');
                }else{
                    $("#companyType-submit-btn").css("display", "block")
                    $("#companyType-submit-loading-btn").css("display", "none")
                    $("#companyType-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#companyType-email-error-msg").css("display", "block")
                }else{
                    $("#companyType-error-msg").css("display", "block")
                }

                $("#companyType-submit-btn").css("display", "block")
                $("#companyType-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Type
        else if(currentEvent == 'update') {
            $("#companyType-update-btn").css("display", "none")
            $("#companyType-submit-loading-btn").css("display", "block")

            let data = {
                name:companyTypeName,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-company-type', '');
            const options = {
                method: 'post',
                url: url + 'update-company-type',
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

                    $("#companyType-update-btn").css("display", "block")
                    $("#companyType-submit-loading-btn").css("display", "none")
                    $("#companyType-update-msg").css("display", "block")

                    $("#companyType-modal").modal('hide');
                    $('#companyTypeForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#companyType-update-btn").css("display", "block")
                    $("#companyType-submit-loading-btn").css("display", "none")

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
                    //$("#companyType-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#companyType-update-btn").css("display", "block")
                $("#companyType-submit-loading-btn").css("display", "none")
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
    $("#companyType-success-msg").css("display", "none")
    $("#companyType-error-msg").css("display", "none")
    $('#companyType-blank-error-msg').css("display", "none")
    $("#companyType-email-error-msg").css("display", "none")
    $("#companyType-update-msg").css("display", "none")
    $("#companyType-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Type
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#companyType-modal-title").html('Add Type');
        $("#companyType-submit-btn").css("display", "block")
        $("#companyType-update-btn").css("display", "none")
    });
});


// edit Type
$( ".data-table" ).on( "click", "a.edit-companyType",
    function() {
        $('#currentEvent').val("update");
        $("#companyType-modal-title").html('Edit Type');
        $("#companyType-modal").modal('show');

        $("#companyType-submit-btn").css("display", "none")
        $("#companyType-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-company-type', '');
        const options = {
            method: 'post',
            url: url + 'view-company-type-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#companyTypeName').val(objData.name);
            $('#companyTypeId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Type
$( ".data-table" ).on( "click", "a.delete-companyType",
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
                    url = url.replace('organization-admin/view-company-type', '');
                    url = url + 'delete-company-type';

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
                        $('#companyType-delete-msg').css('display', 'block')
                        msgAlert()
                    }).catch(error=>{
                        $('#error-msg').css('display', 'block')
                        msgAlert()
                    });
                }
            })

    });



