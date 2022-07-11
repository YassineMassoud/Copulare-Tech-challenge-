$('#companySector-modal').on('hidden.bs.modal', function () {
    $('#companySectorForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add Sector data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let companySectorName  =  $('#companySectorName').val();
        let id = $('#companySectorId').val();

        // when add new Sector
        if(currentEvent == 'add') {
            $("#companySector-submit-btn").css("display", "none")
            $("#companySector-submit-loading-btn").css("display", "block")
            let data = {
                name:companySectorName,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-company-sector', '');
            const options = {
                method: 'post',
                url: url+'add-company-sector',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#companySector-submit-btn").css("display", "block")
                    $("#companySector-submit-loading-btn").css("display", "none")
                    $("#companySector-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#companySectorForm').trigger("reset");
                    $("#companySector-modal").modal('hide');
                }else{
                    $("#companySector-submit-btn").css("display", "block")
                    $("#companySector-submit-loading-btn").css("display", "none")
                    $("#companySector-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#companySector-email-error-msg").css("display", "block")
                }else{
                    $("#companySector-error-msg").css("display", "block")
                }

                $("#companySector-submit-btn").css("display", "block")
                $("#companySector-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Sector
        else if(currentEvent == 'update') {
            $("#companySector-update-btn").css("display", "none")
            $("#companySector-submit-loading-btn").css("display", "block")

            let data = {
                name:companySectorName,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-company-sector', '');
            const options = {
                method: 'post',
                url: url + 'update-company-sector',
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

                    $("#companySector-update-btn").css("display", "block")
                    $("#companySector-submit-loading-btn").css("display", "none")
                    $("#companySector-update-msg").css("display", "block")

                    $("#companySector-modal").modal('hide');
                    $('#companySectorForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#companySector-update-btn").css("display", "block")
                    $("#companySector-submit-loading-btn").css("display", "none")

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
                    //$("#companySector-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#companySector-update-btn").css("display", "block")
                $("#companySector-submit-loading-btn").css("display", "none")
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
    $("#companySector-success-msg").css("display", "none")
    $("#companySector-error-msg").css("display", "none")
    $('#companySector-blank-error-msg').css("display", "none")
    $("#companySector-email-error-msg").css("display", "none")
    $("#companySector-update-msg").css("display", "none")
    $("#companySector-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Sector
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#companySector-modal-title").html('Add Sector');
        $("#companySector-submit-btn").css("display", "block")
        $("#companySector-update-btn").css("display", "none")
    });
});


// edit Sector
$( ".data-table" ).on( "click", "a.edit-companySector",
    function() {
        $('#currentEvent').val("update");
        $("#companySector-modal-title").html('Edit Sector');
        $("#companySector-modal").modal('show');

        $("#companySector-submit-btn").css("display", "none")
        $("#companySector-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-company-sector', '');
        const options = {
            method: 'post',
            url: url + 'view-company-sector-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#companySectorName').val(objData.name);
            $('#companySectorId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete Sector
$( ".data-table" ).on( "click", "a.delete-companySector",
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
                url = url.replace('organization-admin/view-company-sector', '');
                url = url + 'delete-company-sector';

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
                    $('#companySector-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



