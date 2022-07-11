$('#leadDesignation-modal').on('hidden.bs.modal', function () {
    $('#leadDesignationForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add Designation data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let leadDesignationName  =  $('#leadDesignationName').val();
        let id = $('#leadDesignationId').val();

        // when add new Designation
        if(currentEvent == 'add') {
            $("#leadDesignation-submit-btn").css("display", "none")
            $("#leadDesignation-submit-loading-btn").css("display", "block")
            let data = {
                name:leadDesignationName,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-lead-designation', '');
            const options = {
                method: 'post',
                url: url+'add-lead-designation',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#leadDesignation-submit-btn").css("display", "block")
                    $("#leadDesignation-submit-loading-btn").css("display", "none")
                    $("#leadDesignation-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#leadDesignationForm').trigger("reset");
                    $("#leadDesignation-modal").modal('hide');
                }else{
                    $("#leadDesignation-submit-btn").css("display", "block")
                    $("#leadDesignation-submit-loading-btn").css("display", "none")
                    $("#leadDesignation-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#leadDesignation-email-error-msg").css("display", "block")
                }else{
                    $("#leadDesignation-error-msg").css("display", "block")
                }

                $("#leadDesignation-submit-btn").css("display", "block")
                $("#leadDesignation-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Designation
        else if(currentEvent == 'update') {
            $("#leadDesignation-update-btn").css("display", "none")
            $("#leadDesignation-submit-loading-btn").css("display", "block")

            let data = {
                name:leadDesignationName,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-lead-designation', '');
            const options = {
                method: 'post',
                url: url + 'update-lead-designation',
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

                    $("#leadDesignation-update-btn").css("display", "block")
                    $("#leadDesignation-submit-loading-btn").css("display", "none")
                    $("#leadDesignation-update-msg").css("display", "block")

                    $("#leadDesignation-modal").modal('hide');
                    $('#leadDesignationForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#leadDesignation-update-btn").css("display", "block")
                    $("#leadDesignation-submit-loading-btn").css("display", "none")

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
                    //$("#leadDesignation-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#leadDesignation-update-btn").css("display", "block")
                $("#leadDesignation-submit-loading-btn").css("display", "none")
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
    $("#leadDesignation-success-msg").css("display", "none")
    $("#leadDesignation-error-msg").css("display", "none")
    $('#leadDesignation-blank-error-msg').css("display", "none")
    $("#leadDesignation-email-error-msg").css("display", "none")
    $("#leadDesignation-update-msg").css("display", "none")
    $("#leadDesignation-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Designation
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#leadDesignation-modal-title").html('Add Designation');
        $("#leadDesignation-submit-btn").css("display", "block")
        $("#leadDesignation-update-btn").css("display", "none")
    });
});


// edit Designation
$( ".data-table" ).on( "click", "a.edit-leadDesignation",
    function() {
        $('#currentEvent').val("update");
        $("#leadDesignation-modal-title").html('Edit Designation');
        $("#leadDesignation-modal").modal('show');

        $("#leadDesignation-submit-btn").css("display", "none")
        $("#leadDesignation-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-lead-designation', '');
        const options = {
            method: 'post',
            url: url + 'view-lead-designation-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#leadDesignationName').val(objData.name);
            $('#leadDesignationId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Designation
$( ".data-table" ).on( "click", "a.delete-leadDesignation",
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
                url = url.replace('organization-admin/view-lead-designation', '');
                url = url + 'delete-lead-designation';

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
                    $('#leadDesignation-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



