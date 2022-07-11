@extends('layouts.app')
@section('title','Doctor\'s Letter')

@section('content')
    <style>
        #datatable_wrapper .row {
            margin-top: 10px !important;
        }

        img.mr-2 {
            margin-right: 20px;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to your Copulare Dashboard</h4>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">List of patients</h6>
                        </div>
                        <table class="table table-bordered mt-3" id="datatable">
                            <thead class="thead-dark">
                                <th>PATIENT ID</th>
                                <th>NAME</th>
                                <th>DISCHARGE</th>
                                <th>DIAGNOSIS</th>
                                <th>CURRENT STATUS</th>
                                <th>ACTION</th>
                            </thead>
                            <tbody>
                                @foreach($patients as $i => $patient)
                                    <tr>
                                        <td>{{ $patient->patient_id }}</td>
                                        <td>{{ $patient->first_name }}</td>
                                        <td>{{ $patient->hospital_exit }}</td>
                                        <td>{{ $patient->symptom }}</td>
                                        <td>
                                            @if($i == 0)
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div style="margin-top: 10px !important;">
                                                    <p><strong>MISSING INFORMATION</strong></p>
                                                    <p>Laboratory results</p>
                                                </div>
                                            @elseif($i == 1)
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div style="margin-top: 10px !important;">
                                                    <p><strong>MISSING INFORMATION</strong></p>
                                                    <p>Following Therapy</p>
                                                </div>
                                            @elseif($i == 2)
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div style="margin-top: 10px !important;">
                                                    <p><strong>MISSING INFORMATION</strong></p>
                                                    <p>Findings of physical examination</p>
                                                    <p>Other examination findings</p>
                                                </div>
                                            @elseif($i == 3)
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div style="margin-top: 10px !important;">
                                                    <p><strong>MISSING INFORMATION</strong></p>
                                                    <p>Diagnosis</p>
                                                </div>
                                            @elseif($i == 4)
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div style="margin-top: 10px !important;">
                                                    <p><strong>MISSING INFORMATION</strong></p>
                                                    <p>Following therapy</p>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('generate-letter').'/'.$patient->id }}">
                                                Generate Letter
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">List of requests</h6>
                        </div>
                        <table class="table table-bordered mt-3" id="datatable">
                            <thead class="thead-dark">
                            <th>DOCTOR NAME</th>
                            <th>REQUESTED INFO</th>
                            <th>REQUESTED BY</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('assets/images/Doctor Male 2.png') }}" class="mr-2" alt="">
                                            <span>Dr. Markus Schmidt</span>
                                        </div>
                                    </td>
                                    <td>Add latest laboratory results for Laura Stein</td>
                                    <td>Dr. Fatma Uler</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('assets/images/dcotor female 4.png') }}" class="mr-2" alt="">
                                            <span>Dr. Fatma Uler</span>
                                        </div>
                                    </td>
                                    <td>Update instructions to next station for patient Mohammed Ahmed</td>
                                    <td>Dr. Sarah Mueller</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('assets/images/Doctor 3.png') }}" class="mr-2" alt="">
                                            <span>Dr. Ivan Petrov</span>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('assets/images/Woman Picture 1.png') }}" class="mr-2" alt="">
                                            <span>Dr. Sarah Mueller</span>
                                        </div>
                                    </td>
                                    <td>Approve summary for patient Florianna Strohl</td>
                                    <td>Dr. Markus Schmidt</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
@endsection

@push('script')
@endpush
