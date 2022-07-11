

$('#org-modal').on('hidden.bs.modal', function () {
    $('#organizationForm').trigger("reset");
});


// add organization data


$.validator.setDefaults({
    submitHandler: function() {

        let orgEmail  =  $('#orgEmail').val();
        let orgName  =  $('#orgName').val();
        let name  =  $('#name').val();
        let paymentType  =  $('#paymentType').val();
        let amount  =  $('#amount').val();
        let numOfUsers  =  $('#numOfUsers').val();
        let expiryDate  =  $('#end_date').val();
        let  id = $('#orgId').val();
        let currentEvent = $('#currentEvent').val();


        if(currentEvent=="addOrg"){
            // when add new organization


                $("#org-submit-btn").css("display", "none")
                $("#org-submit-loading-btn").css("display", "block")
                let data = {
                    email:orgEmail,
                    orgName:orgName,
                    name:name,
                    paymentType:paymentType,
                    amount:amount,
                    numOfUsers:numOfUsers,
                    expiryDate:expiryDate,

                }



                let url = window.location.href;
                url = url.replace('super-admin/view-organization', '');
                const options = {
                    method: 'post',
                    url: url+'add-organization',
                    data:data,
                    transformResponse: [(data) => {
                        // transform the response
                        return data;
                    }]
                };
                axios(options).then(res=>{

                    if(res.status===200){
                        $("#org-submit-btn").css("display", "block")
                        $("#org-submit-loading-btn").css("display", "none")
                        $("#org-success-msg").css("display", "block")

                        //reset form
                        $('#organizationForm').trigger("reset");
                        $("#org-modal").modal('hide');
                        updateDataTable();

                    }else if(res.status===201){
                        $("#org-submit-btn").css("display", "block")
                        $("#org-submit-loading-btn").css("display", "none")
                        $("#org-error-msg").css("display", "block")
                    }
                    msgAlert();
                }).catch(error=>{
                    if(error.response.status==422){
                        let errors = JSON.parse(error.response.data).errors;
                        if (errors) {
                            let values = Object.values(errors);
                            errorHtml(values);
                        }
                        //$("#org-email-error-msg").css("display", "block")
                    }else if(res.status===201){
                        $("#org-error-msg").css("display", "block")
                    }

                    $("#org-submit-btn").css("display", "block")
                    $("#org-submit-loading-btn").css("display", "none")
                    msgAlert();

                });



        }

        if(currentEvent=="updateOrg"){

            // when edit organization

            // update organization


                $("#org-update-btn").css("display", "none")
                $("#org-submit-loading-btn").css("display", "block")

                let data = {
                    email:orgEmail,
                    orgName:orgName,
                    name:name,
                    paymentType:paymentType,
                    amount:amount,
                    numOfUsers:numOfUsers,
                    expiryDate:expiryDate,
                    id:id
                }


                let url = window.location.href;
                url = url.replace('super-admin/view-organization', '');
                const options = {
                    method: 'post',
                    url: url+'update-organization',
                    data:data,
                    transformResponse: [(data) => {
                        // transform the response
                        return data;
                    }]
                };

                axios(options).then(res=>{
                    if(res.status===200){

                        $("#org-update-btn").css("display", "block")
                        $("#org-submit-loading-btn").css("display", "none")
                        $("#org-update-msg").css("display", "block")

                        $("#org-modal").modal('hide');
                        $('#organizationForm').trigger("reset");
                        updateDataTable();

                    }else if(res.status===201){
                        $("#org-email-error-msg").css("display", "block")
                        $("#org-update-btn").css("display", "block")
                        $("#org-submit-loading-btn").css("display", "none")

                    }
                    msgAlert();
                }).catch(error=>{
                    if(error.response.status==422){
                        let errors = JSON.parse(error.response.data).errors;
                        if (errors) {
                            let values = Object.values(errors);
                            errorHtml(values);
                        }
                        //$("#org-email-error-msg").css("display", "block")
                    }else if(res.status===201){
                        $("#org-error-msg").css("display", "block")
                    }
                    $("#org-update-btn").css("display", "block")
                    $("#org-submit-loading-btn").css("display", "none")
                    msgAlert();

                });



        }










    }
});



// after form submission show the alert for 3 sec


let timeout;

function msgAlert() {

    timeout = setTimeout(alertFunc, 5000);
}

function alertFunc() {
    $("#org-success-msg").css("display", "none")
    $("#org-error-msg").css("display", "none")
    $("#org-email-error-msg").css("display", "none")
    $("#org-update-msg").css("display", "none")

}


// when click add organization
$('document').ready(function () {
    $("#add-org").click(function(){
        $("#org-modal-title").html('Add Organization');
        $("#org-submit-btn").css("display", "block")
        $("#org-update-btn").css("display", "none")
        $("#currentEvent").val('addOrg');
    });
});


// edit organization
$( ".data-table" ).on( "click", "a.edit-org",
    function() {
        $('#currentEvent').val('updateOrg');

        $("#org-modal-title").html('Edit Organization');
        $("#org-modal").modal('show');

        $("#org-submit-btn").css("display", "none")
        $("#org-update-btn").css("display", "block")



        let data = {
            id : $(this).attr("data-id")
        }

        let url = window.location.href;
        url = url.replace('super-admin/view-organization', '');
        const options = {
            method: 'post',
            url: url + 'view-organization-data',
            data: data,
            transformResponse: [(data) => {
                // transform the response

                return data;
            }]
        };

// send the request
        axios(options).then(res=>{

            let objData = JSON.parse(res.data);

            $('#orgEmail').val(objData.org_email);
            $('#orgName').val(objData.org_name);
            $('#name').val(objData.name);
            $('#paymentType').val(objData.payment_type);
            $('#amount').val(objData.amount);
            $('#numOfUsers').val(objData.num_of_users);
            $('#end_date').val(objData.expiry_date);
            $('#orgId').val($(this).attr("data-id"));


        }).catch(error=>{});




    });




// delete organization
$( ".data-table" ).on( "click", "a.delete-org",
    function() {

        if(confirm('Do you want to delete')){


            let data = {
                id : $(this).attr("data-id")
            }

            let url = window.location.href;
            url = url.replace('super-admin/view-organization', '');


            const options = {
                method: 'post',
                url: url + 'delete-organization',
                data:data,
                transformResponse: [(data) => {
                    // transform the response

                    return data;
                }]
            };

// send the request
            axios(options).then(res=>{

                if(res.data==1){
                    updateDataTable();
                }


            }).catch(error=>{});

        }


    });

$( ".data-table" ).on( "click", "a.org-block",
    function() {

        if(confirm('Do you want to block?')){


            let data = {
                id : $(this).attr("data-id")
            }

            let url = window.location.href;
            url = url.replace('super-admin/view-organization', '');


            const options = {
                method: 'post',
                url: url + 'block-organization',
                data:data,
                transformResponse: [(data) => {
                    // transform the response

                    return data;
                }]
            };

// send the request
            axios(options).then(res=>{

                if(res.data=='success'){
                    updateDataTable();
                }


            }).catch(error=>{});

        }


    });

$( ".data-table" ).on( "click", "a.org-activate",
    function() {

        if(confirm('Do you want to activate?')){


            let data = {
                id : $(this).attr("data-id")
            }

            let url = window.location.href;
            url = url.replace('super-admin/view-organization', '');


            const options = {
                method: 'post',
                url: url + 'activate-organization',
                data:data,
                transformResponse: [(data) => {
                    // transform the response

                    return data;
                }]
            };

// send the request
            axios(options).then(res=>{
                if(res.data=='success'){
                    updateDataTable();
                }


            }).catch(error=>{});

        }


    });



