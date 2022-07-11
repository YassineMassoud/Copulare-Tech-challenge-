$('#leadSpeciality-modal').on('hidden.bs.modal', function () {
    $('#leadSpecialityForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add Speciality data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let leadSpecialityName  =  $('#leadSpecialityName').val();
        let id = $('#leadSpecialityId').val();

        // when add new Speciality
        if(currentEvent == 'add') {
            $("#leadSpeciality-submit-btn").css("display", "none")
            $("#leadSpeciality-submit-loading-btn").css("display", "block")
            let data = {
                name:leadSpecialityName,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-lead-speciality', '');
            const options = {
                method: 'post',
                url: url+'add-lead-speciality',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#leadSpeciality-submit-btn").css("display", "block")
                    $("#leadSpeciality-submit-loading-btn").css("display", "none")
                    $("#leadSpeciality-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#leadSpecialityForm').trigger("reset");
                    $("#leadSpeciality-modal").modal('hide');
                }else{
                    $("#leadSpeciality-submit-btn").css("display", "block")
                    $("#leadSpeciality-submit-loading-btn").css("display", "none")
                    $("#leadSpeciality-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#leadSpeciality-email-error-msg").css("display", "block")
                }else{
                    $("#leadSpeciality-error-msg").css("display", "block")
                }

                $("#leadSpeciality-submit-btn").css("display", "block")
                $("#leadSpeciality-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Speciality
        else if(currentEvent == 'update') {
            $("#leadSpeciality-update-btn").css("display", "none")
            $("#leadSpeciality-submit-loading-btn").css("display", "block")

            let data = {
                name:leadSpecialityName,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-lead-speciality', '');
            const options = {
                method: 'post',
                url: url + 'update-lead-speciality',
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

                    $("#leadSpeciality-update-btn").css("display", "block")
                    $("#leadSpeciality-submit-loading-btn").css("display", "none")
                    $("#leadSpeciality-update-msg").css("display", "block")

                    $("#leadSpeciality-modal").modal('hide');
                    $('#leadSpecialityForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#leadSpeciality-update-btn").css("display", "block")
                    $("#leadSpeciality-submit-loading-btn").css("display", "none")

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
                    //$("#leadSpeciality-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#leadSpeciality-update-btn").css("display", "block")
                $("#leadSpeciality-submit-loading-btn").css("display", "none")
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
    $("#leadSpeciality-success-msg").css("display", "none")
    $("#leadSpeciality-error-msg").css("display", "none")
    $('#leadSpeciality-blank-error-msg').css("display", "none")
    $("#leadSpeciality-email-error-msg").css("display", "none")
    $("#leadSpeciality-update-msg").css("display", "none")
    $("#leadSpeciality-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Speciality
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#leadSpeciality-modal-title").html('Add Speciality');
        $("#leadSpeciality-submit-btn").css("display", "block")
        $("#leadSpeciality-update-btn").css("display", "none")
    });
});


// edit Speciality
$( ".data-table" ).on( "click", "a.edit-leadSpeciality",
    function() {
        $('#currentEvent').val("update");
        $("#leadSpeciality-modal-title").html('Edit Speciality');
        $("#leadSpeciality-modal").modal('show');

        $("#leadSpeciality-submit-btn").css("display", "none")
        $("#leadSpeciality-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-lead-speciality', '');
        const options = {
            method: 'post',
            url: url + 'view-lead-speciality-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#leadSpecialityName').val(objData.name);
            $('#leadSpecialityId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Speciality
$( ".data-table" ).on( "click", "a.delete-leadSpeciality",
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
                url = url.replace('organization-admin/view-lead-speciality', '');
                url = url + 'delete-lead-speciality';

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
                    $('#leadSpeciality-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



