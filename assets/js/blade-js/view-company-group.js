$('#companyGroup-modal').on('hidden.bs.modal', function () {
    $('#companyGroupForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add group data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let companyGroupName  =  $('#companyGroupName').val();
        let id = $('#companyGroupId').val();

        // when add new group
        if(currentEvent == 'add') {
            $("#companyGroup-submit-btn").css("display", "none")
            $("#companyGroup-submit-loading-btn").css("display", "block")
            let data = {
                name:companyGroupName,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-company-group', '');
            const options = {
                method: 'post',
                url: url+'add-company-group',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#companyGroup-submit-btn").css("display", "block")
                    $("#companyGroup-submit-loading-btn").css("display", "none")
                    $("#companyGroup-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#companyGroupForm').trigger("reset");
                    $("#companyGroup-modal").modal('hide');
                }else{
                    $("#companyGroup-submit-btn").css("display", "block")
                    $("#companyGroup-submit-loading-btn").css("display", "none")
                    $("#companyGroup-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#companyGroup-email-error-msg").css("display", "block")
                }else{
                    $("#companyGroup-error-msg").css("display", "block")
                }

                $("#companyGroup-submit-btn").css("display", "block")
                $("#companyGroup-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing group
        else if(currentEvent == 'update') {
            $("#companyGroup-update-btn").css("display", "none")
            $("#companyGroup-submit-loading-btn").css("display", "block")

            let data = {
                name:companyGroupName,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-company-group', '');
            const options = {
                method: 'post',
                url: url + 'update-company-group',
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

                    $("#companyGroup-update-btn").css("display", "block")
                    $("#companyGroup-submit-loading-btn").css("display", "none")
                    $("#companyGroup-update-msg").css("display", "block")

                    $("#companyGroup-modal").modal('hide');
                    $('#companyGroupForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#companyGroup-update-btn").css("display", "block")
                    $("#companyGroup-submit-loading-btn").css("display", "none")

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
                    //$("#companyGroup-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#companyGroup-update-btn").css("display", "block")
                $("#companyGroup-submit-loading-btn").css("display", "none")
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
    $("#companyGroup-success-msg").css("display", "none")
    $("#companyGroup-error-msg").css("display", "none")
    $('#companyGroup-blank-error-msg').css("display", "none")
    $("#companyGroup-email-error-msg").css("display", "none")
    $("#companyGroup-update-msg").css("display", "none")
    $("#companyGroup-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add group
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#companyGroup-modal-title").html('Add Group');
        $("#companyGroup-submit-btn").css("display", "block")
        $("#companyGroup-update-btn").css("display", "none")
    });
});


// edit Group
$( ".data-table" ).on( "click", "a.edit-companyGroup",
    function() {
        $('#currentEvent').val("update");
        $("#companyGroup-modal-title").html('Edit Group');
        $("#companyGroup-modal").modal('show');

        $("#companyGroup-submit-btn").css("display", "none")
        $("#companyGroup-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-company-group', '');
        const options = {
            method: 'post',
            url: url + 'view-company-group-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#companyGroupName').val(objData.name);
            $('#companyGroupId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Group
$( ".data-table" ).on( "click", "a.delete-companyGroup",
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
                url = url.replace('organization-admin/view-company-group', '');
                url = url + 'delete-company-group';

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
                    $('#companyGroup-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



