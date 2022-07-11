<!-- core:js -->

<script src="{{asset('assets/vendors/core/core.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->

<script src="{{asset('assets/vendors/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/vendors/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendors/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js')}}"></script>



<script src="{{asset('assets/vendors/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('assets/vendors/inputmask/jquery.inputmask.min.js')}}"></script>
<script src="{{asset('assets/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>

<script src="{{asset('assets/vendors/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>


<script src="{{asset('assets/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js')}}"></script>



<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/js/template.js')}}"></script>
<script src="{{asset('assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->



<script src="{{asset('assets/js/dashboard-light.js')}}"></script>
<script src="{{asset('assets/js/datepicker.js')}}"></script>
<script id="script-validation" src="{{asset('assets/js/form-validation.js')}}"></script>
<script src="{{asset('assets/js/timepicker.js')}}"></script>
<script src="{{asset('assets/js/data-table.js')}}"></script>
<script src="{{asset('assets/js/axios.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="{{asset('assets/js/organization-custom.js')}}"></script>

<script>
    window.baseUrl = "{{ url('/') }}";
    function errorHtml(values) {
        let error_html = "";
        for(let i = 0; i < values.length; i++) {
            if(i == 0) {
                error_html += values[i][0];
            } else {
                error_html += '<br>' + values[i][0];
            }
        }
        console.log(error_html);
        $('#modal-error-msg').empty();
        $('#modal-error-msg').append(error_html);
        $('#modal-error-msg').css('display', 'block');
    }
    $('.hd-select').select2({
        closeOnSelect: true,
        dropdownParent: $('.modal')
    });
    $("#datatable").DataTable();
</script>

@stack('script')

<!-- End custom js for this page -->
