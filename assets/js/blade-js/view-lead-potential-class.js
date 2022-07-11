$('#leadPotentialClass-modal').on('hidden.bs.modal', function () {
    $('#leadPotentialClassForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add Potential Class data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let leadPotentialClassName  =  $('#leadPotentialClassName').val();
        let id = $('#leadPotentialClassId').val();

        // when add new Potential Class
        if(currentEvent == 'add') {
            $("#leadPotentialClass-submit-btn").css("display", "none")
            $("#leadPotentialClass-submit-loading-btn").css("display", "block")
            let data = {
                name:leadPotentialClassName,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-lead-potential-class', '');
            const options = {
                method: 'post',
                url: url+'add-lead-potential-class',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#leadPotentialClass-submit-btn").css("display", "block")
                    $("#leadPotentialClass-submit-loading-btn").css("display", "none")
                    $("#leadPotentialClass-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#leadPotentialClassForm').trigger("reset");
                    $("#leadPotentialClass-modal").modal('hide');
                }else{
                    $("#leadPotentialClass-submit-btn").css("display", "block")
                    $("#leadPotentialClass-submit-loading-btn").css("display", "none")
                    $("#leadPotentialClass-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#leadPotentialClass-email-error-msg").css("display", "block")
                }else{
                    $("#leadPotentialClass-error-msg").css("display", "block")
                }

                $("#leadPotentialClass-submit-btn").css("display", "block")
                $("#leadPotentialClass-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Potential Class
        else if(currentEvent == 'update') {
            $("#leadPotentialClass-update-btn").css("display", "none")
            $("#leadPotentialClass-submit-loading-btn").css("display", "block")

            let data = {
                name:leadPotentialClassName,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-lead-potential-class', '');
            const options = {
                method: 'post',
                url: url + 'update-lead-potential-class',
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

                    $("#leadPotentialClass-update-btn").css("display", "block")
                    $("#leadPotentialClass-submit-loading-btn").css("display", "none")
                    $("#leadPotentialClass-update-msg").css("display", "block")

                    $("#leadPotentialClass-modal").modal('hide');
                    $('#leadPotentialClassForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#leadPotentialClass-update-btn").css("display", "block")
                    $("#leadPotentialClass-submit-loading-btn").css("display", "none")

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
                    //$("#leadPotentialClass-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#leadPotentialClass-update-btn").css("display", "block")
                $("#leadPotentialClass-submit-loading-btn").css("display", "none")
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
    $("#leadPotentialClass-success-msg").css("display", "none")
    $("#leadPotentialClass-error-msg").css("display", "none")
    $('#leadPotentialClass-blank-error-msg').css("display", "none")
    $("#leadPotentialClass-email-error-msg").css("display", "none")
    $("#leadPotentialClass-update-msg").css("display", "none")
    $("#leadPotentialClass-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Potential Class
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#leadPotentialClass-modal-title").html('Add Potential Class');
        $("#leadPotentialClass-submit-btn").css("display", "block")
        $("#leadPotentialClass-update-btn").css("display", "none")
    });
});


// edit Potential Class
$( ".data-table" ).on( "click", "a.edit-leadPotentialClass",
    function() {
        $('#currentEvent').val("update");
        $("#leadPotentialClass-modal-title").html('Edit Potential Class');
        $("#leadPotentialClass-modal").modal('show');

        $("#leadPotentialClass-submit-btn").css("display", "none")
        $("#leadPotentialClass-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-lead-potential-class', '');
        const options = {
            method: 'post',
            url: url + 'view-lead-potential-class-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#leadPotentialClassName').val(objData.name);
            $('#leadPotentialClassId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Potential Class
$( ".data-table" ).on( "click", "a.delete-leadPotentialClass",
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
                url = url.replace('organization-admin/view-lead-potential-class', '');
                url = url + 'delete-lead-potential-class';

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
                    $('#leadPotentialClass-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



