$(function() {
    let val = $('#teamCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-team', '');
    axios.get(url+'get-areas/'+val).then(res=>{
        let options = '';
        for(let i = 0; i < (res.data).length; i++) {
            options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
        }
        $('#teamArea').empty();
        $('#teamArea').append(options);
    })
})

$('#team-modal').on('hidden.bs.modal', function () {
    $('#teamForm').trigger("reset");
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});

$('#teamCity').on("change", function () {
    let val = $('#teamCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-team', '');
    axios.get(url+'get-areas/'+val).then(res=>{
        let options = '';
        for(let i = 0; i < (res.data).length; i++) {
            console.log(res.data[i])
            options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
        }
        $('#teamArea').empty();
        $('#teamArea').append(options);
    })
})

// show hide add organization offline payment field

// $('document').ready(function () {
//     $("#paymentType").change(function(){
//
//         let value = $("#paymentType").val();
//
//         if(value=="offline"){
//             $("#hiddenOrgFiledId").css("display", "block")
//         }else{
//             $("#hiddenOrgFiledId").css("display", "none")
//         }
//
//     });
// });


// add product data
$.validator.setDefaults({
    submitHandler: function() {

        let currentEvent = $('#currentEvent').val();

        let teamArea  =  $('#teamArea').val();
        let teamCity  =  $('#teamCity').val();
        let teamName = $('#teamName').val();
        let teamSupervisor = $('#teamSupervisor').val();
        let teamMembers = $('#teamMembers').val();
        let teamComment = $('#teamComment').val();
        let id = $('#teamId').val();

        // when add new product
        if(currentEvent == 'add') {
            $("#team-submit-btn").css("display", "none")
            $("#team-submit-loading-btn").css("display", "block")
            let data = {
                area:teamArea,
                city:teamCity,
                name:teamName,
                supervisor:teamSupervisor,
                members:teamMembers,
                comment:teamComment
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-team', '');
            const options = {
                method: 'post',
                url: url+'add-team',
                data:data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res=>{
                if(res.data=="success"){
                    $("#team-submit-btn").css("display", "block")
                    $("#team-submit-loading-btn").css("display", "none")
                    $("#team-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#teamForm').trigger("reset");
                    $("#team-modal").modal('hide');
                }else{
                    $("#team-submit-btn").css("display", "block")
                    $("#team-submit-loading-btn").css("display", "none")
                    $("#team-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error=>{
                if(error.response.status==422){
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#team-email-error-msg").css("display", "block")
                }else{
                    $("#team-error-msg").css("display", "block")
                }

                $("#team-submit-btn").css("display", "block")
                $("#team-submit-loading-btn").css("display", "none")
                msgAlert();
            });
        }
        // update existing team
        else if(currentEvent == 'update') {
            $("#team-update-btn").css("display", "none")
            $("#team-submit-loading-btn").css("display", "block")

            let data = {
                area:teamArea,
                city:teamCity,
                name:teamName,
                supervisor:teamSupervisor,
                members:teamMembers,
                comment:teamComment,
                id:id
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-team', '');
            const options = {
                method: 'post',
                url: url + 'update-team',
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

                    $("#team-update-btn").css("display", "block")
                    $("#team-submit-loading-btn").css("display", "none")
                    $("#team-update-msg").css("display", "block")

                    $("#team-modal").modal('hide');
                    $('#teamForm').trigger("reset");
                    updateDataTable();
                }else{
                    $('#error-msg').css('display', 'block')
                    $("#team-update-btn").css("display", "block")
                    $("#team-submit-loading-btn").css("display", "none")

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
                    //$("#team-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#team-update-btn").css("display", "block")
                $("#team-submit-loading-btn").css("display", "none")
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
    $("#team-success-msg").css("display", "none")
    $("#team-error-msg").css("display", "none")
    $('#team-blank-error-msg').css("display", "none")
    $("#team-email-error-msg").css("display", "none")
    $("#team-update-msg").css("display", "none")
    $("#team-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')

    $("#team_member-success-msg").css("display", "none")
    $("#team_member-error-msg").css("display", "none")
    $('#team_member-blank-error-msg').css("display", "none")
    $("#team_member-email-error-msg").css("display", "none")
    $("#team_member-update-msg").css("display", "none")
    $("#team_member-delete-msg").css("display", "none")
}


// when click add team
$('document').ready(function () {
    $("#add-btn").click(function(){
        $('#currentEvent').val("add");
        $("#team-modal-title").html('Add Team');
        $("#team-submit-btn").css("display", "block")
        $("#team-update-btn").css("display", "none")
        $('#teamCity').val('Abu Dhabi').trigger('change')
        $('#teamMembers').val("").trigger("change");
    });
});


// edit Family team
$( ".data-table" ).on( "click", "a.edit-team",
    function() {
        $('#currentEvent').val("update");
        $("#team-modal-title").html('Edit Team');
        $("#team-modal").modal('show');

        $("#team-submit-btn").css("display", "none")
        $("#team-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-team', '');
        const options = {
            method: 'post',
            url: url + 'view-team-data',
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
            url = url.replace('organization-admin/view-team', '');
            axios.get(url+'get-areas/'+objData.city).then(res=>{
                let options = '';
                for(let i = 0; i < (res.data).length; i++) {
                    options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
                }
                $('#teamArea').empty();
                $('#teamArea').append(options);
                $('#teamArea').val(objData.area).trigger("change");
                $('#teamCity').val(objData.city).trigger("change.select2");
                $('#teamName').val(objData.name);
                $('#teamComment').val(objData.comment);
                $('#teamSupervisor').val(objData.supervisor).trigger("change");
                $('#teamMembers').val(objData.members).trigger("change");
                $('#teamId').val($(this).attr("data-id"));
            })

        }).catch(error=>{});




    });




// delete team
$( ".data-table" ).on( "click", "a.delete-team",
    function() {

        if(confirm('Do you want to delete')){


            let data = {
                id : $(this).attr("data-id")
            }


            let url = window.location.href;
            url = url.replace('organization-admin/view-team', '');
            url = url + 'delete-team';

            console.log(url);
            const options = {
                method: 'post',
                url: url,
                data:data,
                transformResponse: [(data) => {
                    // transform the response

                    return data;
                }]
            };

// send the request
            axios(options).then(res=>{

                console.log(res);

                updateDataTable();
                $('#team-delete-msg').css('display', 'block')
                msgAlert()
                // $('.data-table').DataTable().destroy().clear();
                // var table = $('.data-table').DataTable( {
                //     ajax: "data.json"
                // });
                //
                // table.ajax.reload();


            }).catch(error=>{
                $('#error-msg').css('display', 'block')
                msgAlert()
            });

        }


    });

//delete team member
$( ".data-table" ).on( "click", "a.delete-team-member",
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
                    id : $(this).attr("data-id"),
                    team: $('#team_id').val()
                }

                let url = $('#url').val();
                url = url + 'delete-team-member';

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
                    $('#team_member-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error=>{
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



