$('#emp-modal').on('hidden.bs.modal', function () {
    $('#employeeForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add employee data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let empEmail  =  $('#empEmail').val();
        let empFirstName  =  $('#empFirstName').val();
        let empLastName  =  $('#empLastName').val();
        let empNickName  =  $('#empNickName').val();
        let empMobile  =  $('#empMobile').val();
        let empType  =  $('#empType').val();
        let empTeam  =  $('#empTeam').val();
        let empDutyStart  =  $('#empDutyStart').val();
        let empDutyEnd  =  $('#empDutyEnd').val();
        let empComment  =  $('#empComment').val();
        let empDialCode = $('#empDialCode').val();
        let  id = $('#empId').val();

        // when add new employee
        if(currentEvent == 'add') {
            $("#emp-submit-btn").css("display", "none")
            $("#emp-submit-loading-btn").css("display", "block")
            let data = {
                email:empEmail,
                firstName:empFirstName,
                lastName:empLastName,
                nickName:empNickName,
                mobile:empMobile,
                type:empType,
                team:empTeam,
                dutyStart:empDutyStart,
                dutyEnd:empDutyEnd,
                comment:empComment,
                dialCode:empDialCode
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-employee', '');
            const options = {
                method: 'post',
                url: url+'add-employee',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#emp-submit-btn").css("display", "block")
                    $("#emp-submit-loading-btn").css("display", "none")
                    $("#emp-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#employeeForm').trigger("reset");
                    $("#emp-modal").modal('hide');
                }else{
                    $("#emp-submit-btn").css("display", "block")
                    $("#emp-submit-loading-btn").css("display", "none")
                    $("#emp-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#emp-email-error-msg").css("display", "block")
                }else{
                    $("#emp-error-msg").css("display", "block")
                }

                $("#emp-submit-btn").css("display", "block")
                $("#emp-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing employee
        else if(currentEvent == 'update') {
            $("#emp-update-btn").css("display", "none")
            $("#emp-submit-loading-btn").css("display", "block")

            let data = {
                email:empEmail,
                firstName:empFirstName,
                lastName:empLastName,
                nickName:empNickName,
                mobile:empMobile,
                type:empType,
                team:empTeam,
                dutyStart:empDutyStart,
                dutyEnd:empDutyEnd,
                comment:empComment,
                dialCode:empDialCode,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-employee', '');
            const options = {
                method: 'post',
                url: url + 'update-employee',
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

                    $("#emp-update-btn").css("display", "block")
                    $("#emp-submit-loading-btn").css("display", "none")
                    $("#emp-update-msg").css("display", "block")

                    $("#emp-modal").modal('hide');
                    $('#employeeForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#emp-update-btn").css("display", "block")
                    $("#emp-submit-loading-btn").css("display", "none")

                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status===422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#emp-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#emp-update-btn").css("display", "block")
                $("#emp-submit-loading-btn").css("display", "none")
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
    $("#emp-success-msg").css("display", "none")
    $("#emp-error-msg").css("display", "none")
    $("#emp-email-error-msg").css("display", "none")
    $("#emp-update-msg").css("display", "none")
    $("#emp-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add employee
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#empDialCode').val('971').trigger('change');
        $('#currentEvent').val("add");
        $("#emp-modal-title").html('Add Employee');
        $("#emp-submit-btn").css("display", "block")
        $("#emp-update-btn").css("display", "none")
    });
});


// edit employee
$( ".data-table" ).on( "click", "a.edit-emp",
    function() {
        $('#currentEvent').val("update");
        $("#emp-modal-title").html('Edit Employee');
        $("#emp-modal").modal('show');

        $("#emp-submit-btn").css("display", "none")
        $("#emp-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-employee', '');
        const options = {
            method: 'post',
            url: url + 'view-employee-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#empFirstName').val(objData.firstName);
            $('#empLastName').val(objData.lastName);
            $('#empNickName').val(objData.nickName);
            $('#empEmail').val(objData.email);
            $('#empMobile').val(objData.mobile);
            $('#empType').val(objData.type).trigger("change");
            $('#empTeam').val(objData.team).trigger("change");
            $('#empDialCode').val(objData.dial_code).trigger("change");
            $('#empDutyStart').val(objData.dutyStart);
            $('#empDutyEnd').val(objData.dutyEnd);
            $('#empComment').val(objData.comment);
            $('#empId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete employee
$( ".data-table" ).on( "click", "a.delete-emp",
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
                url = url.replace('organization-admin/view-employee', '');
                const options = {
                    method: 'post',
                    url: url + 'delete-employee',
                    data:data,
                    transformResponse: [(data) => {
                        // transform the response

                        return data;
                    }]
                };

                axios(options).then(res=>{
                    updateDataTable();
                    $('#emp-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



