@extends('layouts.app')
@section('title','View organization')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h6 class="card-title">View Organizations</h6>
        <button id="add-org" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-modal-lg">Add Organization</button>
        @include('common.modal',['modal'=>"addOrganization",'modal_title'=>"Add Organization"])
    </div>

    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            @include('common.alert', ['module' => 'Organization', 'module_id' => 'org'])
        </div>

        <div class="col-md-12 grid-margin stretch-card">



            <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered data-table">
                                <thead class="thead-dark">
                                   <tr>
                                    <th>No</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>ORGANIZATION NAME</th>
                                    <th>NUM OF USERS</th>
                                    <th>PAYMENT METHOD</th>
                                    <th>STATUS</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div></div>
        </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get-organization-data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'org_email', name: 'org_email'},
                    {data: 'org_name', name: 'org_name'},
                    {data: 'num_of_users', name: 'num_of_users'},
                    {data: 'payment_type', name: 'payment_type'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        window.updateDataTable = function() {
            console.log("updateDatatable")
            $('.data-table').DataTable().destroy().clear();
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('get-organization-data') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'org_email', name: 'org_email'},
                    {data: 'org_name', name: 'org_name'},
                    {data: 'num_of_users', name: 'num_of_users'},
                    {data: 'payment_type', name: 'payment_type'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        }
    </script>
@endpush
