$(function() {
    let val = $('#companyCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-companies', '');
    axios.get(url+'get-areas/'+val).then(res=>{
        let options = '';
        for(let i = 0; i < (res.data).length; i++) {
            options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
        }
        $('#companyArea').empty();
        $('#companyArea').append(options);
    })
})

$('#companyCity').on("change", function() {
    let val = $('#companyCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-companies', '');
    axios.get(url+'get-areas/'+val).then(res=>{
        let options = '';
        for(let i = 0; i < (res.data).length; i++) {
            console.log(res.data[i])
            options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
        }
        $('#companyArea').empty();
        $('#companyArea').append(options);
    })
})

$('#company-modal').on('hidden.bs.modal', function () {
    $('#companyForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add company data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let companyName  =  $('#companyName').val();
        let companyLogo  =  $('#companyLogo').val();
        let companyGroup  =  $('#companyGroup').val();
        let companySector  =  $('#companyType').val();
        let companyType  =  $('#companyType').val();
        let companyCity  =  $('#companyCity').val();
        let companyArea  =  $('#companyArea').val();
        let companyFrom  =  $('#companyFrom').val();
        let companyTo  =  $('#companyTo').val();
        let companyEmail  =  $('#companyEmail').val();
        let companyComment  =  $('#companyComment').val();
        let lat = $('#lat').val();
        let lng = $('#lng').val();
        let id = $('#companyId').val();

        // when add new company
        if(currentEvent == 'add') {
            $("#company-submit-btn").css("display", "none")
            $("#company-submit-loading-btn").css("display", "block")
            let data = {
                name:companyName,
                logo:document.querySelector('#companyLogo').files[0],
                group:companyGroup,
                sector:companySector,
                type:companyType,
                city:companyCity,
                area:companyArea,
                from:companyFrom,
                to:companyTo,
                email:companyEmail,
                comment:companyComment,
                lat:lat,
                lng:lng
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-companies', '');
            const options = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                method: 'post',
                url: url+'add-company',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#company-submit-btn").css("display", "block")
                    $("#company-submit-loading-btn").css("display", "none")
                    $("#company-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#companyForm').trigger("reset");
                    $("#company-modal").modal('hide');
                }else{
                    $("#company-submit-btn").css("display", "block")
                    $("#company-submit-loading-btn").css("display", "none")
                    $("#company-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#company-email-error-msg").css("display", "block")
                }else{
                    $("#company-error-msg").css("display", "block")
                }

                $("#company-submit-btn").css("display", "block")
                $("#company-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing company
        else if(currentEvent == 'update') {
            $("#company-update-btn").css("display", "none")
            $("#company-submit-loading-btn").css("display", "block")

            let data = {
                name:companyName,
                logo:document.querySelector('#companyLogo').files[0],
                group:companyGroup,
                sector:companySector,
                type:companyType,
                city:companyCity,
                area:companyArea,
                from:companyFrom,
                to:companyTo,
                email:companyEmail,
                comment:companyComment,
                lat:lat,
                lng:lng,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-companies', '');
            const options = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                method: 'post',
                url: url + 'update-company',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };

            axios(options).then(res=>{
                if(res.data=="success"){

                    $("#company-update-btn").css("display", "block")
                    $("#company-submit-loading-btn").css("display", "none")
                    $("#company-update-msg").css("display", "block")

                    $("#company-modal").modal('hide');
                    $('#companyForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#company-update-btn").css("display", "block")
                    $("#company-submit-loading-btn").css("display", "none")

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
                    //$("#company-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#company-update-btn").css("display", "block")
                $("#company-submit-loading-btn").css("display", "none")
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
    $("#company-success-msg").css("display", "none")
    $("#company-error-msg").css("display", "none")
    $('#company-blank-error-msg').css("display", "none")
    $("#company-email-error-msg").css("display", "none")
    $("#company-update-msg").css("display", "none")
    $("#company-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add company
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentLat').val('25.2048');
        $('#currentLng').val('55.2708');
        $('#lat').val("");
        $('#lng').val("");
        $('#currentEvent').val("add");
        $("#company-modal-title").html('Add Company');
        $("#company-submit-btn").css("display", "block")
        $("#company-update-btn").css("display", "none")
        $('#company-modal').modal("show");
    });
});


// edit Company
$( ".data-table" ).on( "click", "a.edit-company",
    function() {
        $('#currentEvent').val("update");
        $("#company-modal-title").html('Edit Company');

        $("#company-submit-btn").css("display", "none")
        $("#company-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-companies', '');
        const options = {
            method: 'post',
            url: url + 'view-company-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            let url = window.location.href;
            url = url.replace('organization-admin/view-companies', '');
            axios.get(url+'get-areas/'+objData.city).then(res=>{
                let options = '';
                for(let i = 0; i < (res.data).length; i++) {
                    options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
                }
                $('#companyArea').empty();
                $('#companyArea').append(options);
                $('#companyArea').val(objData.area).trigger("change");
                $('#companyCity').val(objData.city).trigger("change.select2");
                $('#companyName').val(objData.name);
                $('#companyFrom').val(objData.from);
                $('#companyTo').val(objData.to);
                $('#companyGroup').val(objData.group_id).trigger('change');
                $('#companySector').val(objData.sector_id).trigger('change');
                $('#companyType').val(objData.type_id).trigger('change');
                $('#companyComment').val(objData.comment);
                $('#companyEmail').val(objData.email);
                $('#lat').val(objData.lat);
                $('#lng').val(objData.lng);
                $('#currentLat').val($('#lat').val() ? $('#lat').val() : 25.2048);
                $('#currentLng').val($('#lng').val() ? $('#lng').val() : 55.2708);
                $('#companyId').val($(this).attr("data-id"));
                $("#company-modal").modal('show');
            })
        }).catch(error=>{});




    });




// delete company
$( ".data-table" ).on( "click", "a.delete-company",
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
                url = url.replace('organization-admin/view-companies', '');
                url = url + 'delete-company';

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
                    $('#company-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



