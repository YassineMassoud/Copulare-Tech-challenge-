$(function() {
    let val = $('#areaCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-area', '');
    axios.get(url+'get-areas/'+val+'?type=area').then(res=>{
        let options = '';
        for(let i = 0; i < (res.data).length; i++) {
            console.log(res.data[i])
            options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
        }
        $('#areaArea').empty();
        $('#areaArea').append(options);
    })
})

$('#area-modal').on('hidden.bs.modal', function () {
    $('#areaForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});

$('#areaCity').on("change", function () {
    let val = $('#areaCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-area', '');
    axios.get(url+'get-areas/'+val+'?type=area').then(res=>{
        let options = '';
            for(let i = 0; i < (res.data).length; i++) {
                console.log(res.data[i])
                options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
            }
        $('#areaArea').empty();
        $('#areaArea').append(options);
    })
})


// add product data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let areaArea  =  $('#areaArea').val();
        let areaCity  =  $('#areaCity').val();
        let id = $('#areaId').val();

        // when add new product
        if(currentEvent == 'add') {
            $("#area-submit-btn").css("display", "none")
            $("#area-submit-loading-btn").css("display", "block")
            let data = {
                area:areaArea,
                city:areaCity,
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-area', '');
            const options = {
                method: 'post',
                url: url+'add-area',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#area-submit-btn").css("display", "block")
                    $("#area-submit-loading-btn").css("display", "none")
                    $("#area-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#areaForm').trigger("reset");
                    $("#area-modal").modal('hide');
                }else if(res.data=="already_exists") {
                    $("#area-submit-btn").css("display", "block")
                    $("#area-submit-loading-btn").css("display", "none")
                    $("#error-msg").empty()
                    $("#error-msg").append('<h6>Area already Exists!</h6>')
                    $("#error-msg").css("display", "block")
                }else{
                    $("#area-submit-btn").css("display", "block")
                    $("#area-submit-loading-btn").css("display", "none")
                    $("#area-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#area-email-error-msg").css("display", "block")
                }else{
                    $("#area-error-msg").css("display", "block")
                }

                $("#area-submit-btn").css("display", "block")
                $("#area-submit-loading-btn").css("display", "none")
                msgAlert();
            });
        }
        // update existing area
        else if(currentEvent == 'update') {
            $("#area-update-btn").css("display", "none")
            $("#area-submit-loading-btn").css("display", "block")

            let data = {
                area:areaArea,
                city:areaCity,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-area', '');
            const options = {
                method: 'post',
                url: url + 'update-area',
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

                    $("#area-update-btn").css("display", "block")
                    $("#area-submit-loading-btn").css("display", "none")
                    $("#area-update-msg").css("display", "block")

                    $("#area-modal").modal('hide');
                    $('#areaForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#area-update-btn").css("display", "block")
                    $("#area-submit-loading-btn").css("display", "none")

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
                    //$("#area-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#area-update-btn").css("display", "block")
                $("#area-submit-loading-btn").css("display", "none")
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
    $("#area-success-msg").css("display", "none")
    $("#area-error-msg").css("display", "none")
    $('#area-blank-error-msg').css("display", "none")
    $("#area-email-error-msg").css("display", "none")
    $("#area-update-msg").css("display", "none")
    $("#area-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
    $('#error-msg').empty();
    $('#error-msg').append('<h6>Failed. Try again!</h6>\n' +
        '    <p>Something is wrong. Please try again the operation.</p>')
}


// when click add area
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#area-modal-title").html('Add Area');
        $("#area-submit-btn").css("display", "block")
        $("#area-update-btn").css("display", "none")
        $('#areaCity').val('Abu Dhabi').trigger('change')
    });
});


// edit Family area
$( ".data-table" ).on( "click", "a.edit-area",
    function() {
        $('#currentEvent').val("update");
        $("#area-modal-title").html('Edit Area');
        $("#area-modal").modal('show');

        $("#area-submit-btn").css("display", "none")
        $("#area-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-area', '');
        const options = {
            method: 'post',
            url: url + 'view-area-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);
            $('#areaArea').val(objData.area);
            $('#areaCity').val(objData.city);
            $('#areaId').val($(this).attr("data-id"));

        }).catch(error=>{});




    });




// delete Family area
$( ".data-table" ).on( "click", "a.delete-area",
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
                url = url.replace('organization-admin/view-area', '');
                url = url + 'delete-area';

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
                    $('#area-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



