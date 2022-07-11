$(function () {
    let val = $('#leadCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-leads', '');
    axios.get(url + 'get-areas/' + val).then(res => {
        let options = '';
        for (let i = 0; i < (res.data).length; i++) {
            options += '<option value="' + res.data[i] + '">' + res.data[i] + '</option>';
        }
        $('#leadArea').empty();
        $('#leadArea').append(options);
    })
})

$('.leadType').change(function () {
    if($('.leadType:checked').val() == 'Business') {
        $('.leadBusiness').css('display', 'block')
    } else {
        $('.leadBusiness').css('display', 'none')
    }
})

$('#leadCity').on("change", function () {
    let val = $('#leadCity').val();
    let url = window.location.href;
    url = url.replace('organization-admin/view-leads', '');
    axios.get(url + 'get-areas/' + val).then(res => {
        let options = '';
        for (let i = 0; i < (res.data).length; i++) {
            console.log(res.data[i])
            options += '<option value="' + res.data[i] + '">' + res.data[i] + '</option>';
        }
        $('#leadArea').empty();
        $('#leadArea').append(options);
    })
})

$('#lead-modal').on('hidden.bs.modal', function () {
    $('#leadForm').trigger("reset");
    $('#leadDialCode').val('971').trigger('change');
    $('.form-control').each(function () {
        $(this).removeClass('is-invalid');
        $(this).removeClass('is-valid');
    })
});


// add Lead data
$.validator.setDefaults({
    submitHandler: function () {

        let currentEvent = $('#currentEvent').val();

        let leadName = $('#leadName').val();
        let leadGender = $('#leadGender').val();
        let leadCountry = $('#leadCountry').val();
        let leadSpokenLanguage = $('#leadSpokenLanguage').val();
        let leadSpeciality = $('#leadSpeciality').val();
        let leadCompany = $('#leadCompany').val();
        let leadCity = $('#leadCity').val();
        let leadArea = $('#leadArea').val();
        let leadDesignation = $('#leadDesignation').val();
        let leadPotentialClass = $('#leadPotentialClass').val();
        let leadFrom = $('#leadFrom').val();
        let leadTo = $('#leadTo').val();
        let leadEmail = $('#leadEmail').val();
        let leadKOL = $('#leadKOL').val();
        let leadWorkingDays = [];
        let leadDialCode = $('#leadDialCode').val();
        $('#leadWorkingDays:checked').each(function (i) {
            leadWorkingDays[i] = $(this).val();
        });
        let leadComment = $('#leadComment').val();
        let leadPhone = $('#leadPhone').val();
        let leadType = $('.leadType:checked').val();
        let id = $('#leadId').val();

        // when add new Lead
        if (currentEvent == 'add') {
            $("#lead-submit-btn").css("display", "none")
            $("#lead-submit-loading-btn").css("display", "block")
            let data = {
                name: leadName,
                gender: leadGender,
                country: leadCountry,
                spokenLanguages: leadSpokenLanguage,
                company: leadCompany,
                speciality: leadSpeciality,
                city: leadCity,
                area: leadArea,
                designation: leadDesignation,
                potentialClass: leadPotentialClass,
                from: leadFrom,
                to: leadTo,
                email: leadEmail,
                kol: leadKOL,
                workingDays: leadWorkingDays,
                comment: leadComment,
                phone: leadPhone,
                dialCode: leadDialCode,
                type: leadType
            }
            let url = window.location.href;
            url = url.replace('organization-admin/view-leads', '');
            const options = {
                method: 'post',
                url: url + 'add-lead',
                data: data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };
            axios(options).then(res => {
                if (res.data == "success") {
                    $("#lead-submit-btn").css("display", "block")
                    $("#lead-submit-loading-btn").css("display", "none")
                    $("#lead-success-msg").css("display", "block")
                    updateDataTable();
                    //reset form
                    $('#leadForm').trigger("reset");
                    $("#lead-modal").modal('hide');
                } else {
                    $("#lead-submit-btn").css("display", "block")
                    $("#lead-submit-loading-btn").css("display", "none")
                    $("#lead-error-msg").css("display", "block")
                }
                msgAlert();
            }).catch(error => {
                if (error.response.status == 422) {
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#lead-email-error-msg").css("display", "block")
                } else {
                    $("#lead-error-msg").css("display", "block")
                }

                $("#lead-submit-btn").css("display", "block")
                $("#lead-submit-loading-btn").css("display", "none")
                msgAlert();

            });
        }
        // update existing Lead
        else if (currentEvent == 'update') {
            $("#lead-update-btn").css("display", "none")
            $("#lead-submit-loading-btn").css("display", "block")

            let data = {
                id: id,
                name: leadName,
                gender: leadGender,
                country: leadCountry,
                spokenLanguages: leadSpokenLanguage,
                company: leadCompany,
                speciality: leadSpeciality,
                city: leadCity,
                area: leadArea,
                designation: leadDesignation,
                potentialClass: leadPotentialClass,
                from: leadFrom,
                to: leadTo,
                email: leadEmail,
                kol: leadKOL,
                workingDays: leadWorkingDays,
                comment: leadComment,
                phone: leadPhone,
                dialCode: leadDialCode,
                type: leadType
            }

            let url = window.location.href;
            url = url.replace('organization-admin/view-leads', '');
            const options = {
                method: 'post',
                url: url + 'update-lead',
                data: data,
                transformResponse: [(data) => {
                    // transform the response
                    return data;
                }]
            };

            console.log(options);

            axios(options).then(res => {
                console.log(res);
                if (res.data == "success") {

                    $("#lead-update-btn").css("display", "block")
                    $("#lead-submit-loading-btn").css("display", "none")
                    $("#lead-update-msg").css("display", "block")

                    $("#lead-modal").modal('hide');
                    $('#leadForm').trigger("reset");
                    updateDataTable();
                } else {
                    $('#error-msg').css('display', 'block')
                    $("#lead-update-btn").css("display", "block")
                    $("#lead-submit-loading-btn").css("display", "none")

                }
                msgAlert();
            }).catch(error => {
                console.log(error.response.data);
                if (error.response.status === 422) {
                    let errors = JSON.parse(error.response.data).errors;
                    if (errors) {
                        let values = Object.values(errors);
                        errorHtml(values);
                    }
                    //$("#lead-email-error-msg").css("display", "block")
                }
                $('#error-msg').css('display', 'block')
                $("#lead-update-btn").css("display", "block")
                $("#lead-submit-loading-btn").css("display", "none")
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
    $("#lead-success-msg").css("display", "none")
    $("#lead-error-msg").css("display", "none")
    $('#lead-blank-error-msg').css("display", "none")
    $("#lead-email-error-msg").css("display", "none")
    $("#lead-update-msg").css("display", "none")
    $("#lead-delete-msg").css("display", "none")
    $("#error-msg").css('display', 'none')
}


// when click add Lead
$('document').ready(function () {
    $("#add-btn").click(function () {
        $('.leadType').each(function () {
            if($(this).val() == 'Business') {
                $(this).prop('checked', true);
                $('.leadBusiness').css('display', 'block');
            } else {
                $(this).prop('checked', false);
            }
        })
        $('#leadDialCode').val('971').trigger('change');
        $('#currentEvent').val("add");
        $("#lead-modal-title").html('Add Lead');
        $("#lead-submit-btn").css("display", "block")
        $("#lead-update-btn").css("display", "none")
    });
});


// edit Lead
$(".data-table").on("click", "a.edit-lead",
    function () {
        $('#currentEvent').val("update");
        $("#lead-modal-title").html('Edit Lead');
        $("#lead-modal").modal('show');

        $("#lead-submit-btn").css("display", "none")
        $("#lead-update-btn").css("display", "block")



        let data = {
            id: $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('organization-admin/view-leads', '');
        const options = {
            method: 'post',
            url: url + 'view-lead-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

        // send the request
        axios(options).then(res => {

            let objData = JSON.parse(res.data);
            //$('#leadArea').empty();
            //$('#leadArea').append(options);
            //$('#leadArea').val(objData.area).trigger("change");
            if(objData.type == 'Business') {
                $('.leadBusiness').css('display', 'block');
            } else {
                $('.leadBusiness').css('display', 'none');
            }
            $('#leadName').val(objData.name);
            //$('#leadCity').val(objData.city).trigger("change.select2");
            $('#leadDesignation').val(objData.designation).trigger("change");
            $('#leadSpeciality').val(objData.speciality).trigger("change");
            $('#leadComment').val(objData.comment);
            $('#leadCompany').val(objData.company).trigger("change");
            $('#leadPotentialClass').val(objData.potential_class).trigger("change");
            $('#leadSpokenLanguage').val(objData.spoken_language).trigger("change");
            $('#leadDialCode').val(objData.dial_code).trigger("change");
            $('.leadKOL').each(function () {
                if ($(this).val() == objData.kol) {
                    $(this).prop('checked', true)
                }
            });
            $('#leadEmail').val(objData.email);
            $('#leadPhone').val(objData.contact_number);
            $('#leadFrom').val(objData.from);
            $('#leadTo').val(objData.to);
            $('.leadWorkingDays').each(function () {
                if (objData.working_days.includes($(this).val())) {
                    $(this).prop('checked', true)
                }
            });
            $('#leadId').val($(this).attr("data-id"));

            $('.leadType').each(function () {
                if($(this).val() == objData.type) {
                    $(this).prop('checked', true)
                } else {
                    $(this).prop('checked', false)
                }
            })

            // let url = window.location.href;
            // url = url.replace('organization-admin/view-leads', '');
            // axios.get(url+'get-areas/'+objData.city).then(res=>{
            //     let options = '';
            //     for(let i = 0; i < (res.data).length; i++) {
            //         options += '<option value="'+res.data[i]+'">'+res.data[i]+'</option>';
            //     }
            //     $('#leadArea').empty();
            //     $('#leadArea').append(options);
            //     $('#leadArea').val(objData.area).trigger("change");
            //     $('#leadName').val(objData.name);
            //     $('#leadCity').val(objData.city).trigger("change.select2");
            //     $('#leadDesignation').val(objData.designation).trigger("change");
            //     $('#leadSpeciality').val(objData.speciality).trigger("change");
            //     $('#leadComment').val(objData.comment);
            //     $('#leadCompany').val(objData.company).trigger("change");
            //     $('#leadPotentialClass').val(objData.potential_class).trigger("change");
            //     $('#leadSpokenLanguage').val(objData.spoken_language).trigger("change");
            //     $('.leadKOL').each(function () {
            //         if($(this).val() == objData.kol) {
            //             $(this).prop('checked', true)
            //         }
            //     });
            //     $('#leadEmail').val(objData.email);
            //     $('#leadPhone').val(objData.contact_number);
            //     $('#leadFrom').val(objData.from);
            //     $('#leadTo').val(objData.to);
            //     $('.leadWorkingDays').each(function () {
            //         if(objData.working_days.includes($(this).val())) {
            //             $(this).prop('checked', true)
            //         }
            //     });
            //     $('#leadId').val($(this).attr("data-id"));
            // })

        }).catch(error => { });




    });




// delete Lead
$(".data-table").on("click", "a.delete-lead",
    function () {
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
                    id: $(this).attr("data-id")
                }

                let url = window.location.href;
                url = url.replace('organization-admin/view-leads', '');
                url = url + 'delete-lead';

                const options = {
                    method: 'post',
                    url: url,
                    data: data,
                    transformResponse: [(data) => {
                        // transform the response

                        return data;
                    }]
                };

                axios(options).then(res => {
                    updateDataTable();
                    $('#lead-delete-msg').css('display', 'block')
                    msgAlert()
                }).catch(error => {
                    $('#error-msg').css('display', 'block')
                    msgAlert()
                });
            }
        })

    });



