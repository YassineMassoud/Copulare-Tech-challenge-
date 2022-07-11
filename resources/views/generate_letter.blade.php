@extends('layouts.app')
@section('title','Generate Letter')

@section('content')
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet" />
    <style>
        #datatable_wrapper .row {
            margin-top: 10px !important;
        }

        .hd-label {
            font-weight: bold;
            font-size: .9rem;
            color: #333;
            margin-bottom: 10px;
        }
    </style>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Generate Doctor Letter</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
{{--                            <h6 class="card-title mb-0">Doctor Letter</h6>--}}
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">General Practitioner's address</label>
                            <div id="practitioner_address_editor">
                                <p>
                                    @if(isset($dataset->practitioner_address))
                                        <?= $dataset->practitioner_address ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Diagnosis</label>
                            <div id="diagnosis_editor">
                                <p>
                                    @if(isset($dataset->diagnosis))
                                        <?= $dataset->diagnosis ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Introduction</label>
                            <div id="introduction_editor">
                                <p>
                                    @if(isset($dataset->introduction))
                                        <?= $dataset->introduction ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Anamnesis</label>
                            <div id="anamnesis_editor">
                                <p>
                                    @if(isset($dataset->anamnesis))
                                        <?= $dataset->anamnesis ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Medication</label>
                            <div id="medication_editor">
                                <p>
                                    @if(isset($dataset->medication))
                                        <?= $dataset->medication ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Findings of physical examination</label>
                            <div id="physical_examination_editor">
                                <p>
                                    @if(isset($dataset->physical_examination))
                                        <?= $dataset->physical_examination ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Other examination findings</label>
                            <div id="other_examination_editor">
                                <p>
                                    @if(isset($dataset->other_examination))
                                        <?= $dataset->other_examination ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Laboratory results</label>
                            <div id="laboratory_results_editor">
                                <p>
                                    @if(isset($dataset->laboratory_results))
                                        <?= $dataset->laboratory_results; ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Summary</label>
                            <div id="summary_editor">
                                <p>
                                    @if(isset($dataset->summary))
                                        <?= $dataset->summary ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>
                        <div style="margin-top: 20px;">
                            <label class="hd-label" for="">Following therapy</label>
                            <div id="following_therapy_editor">
                                <p>
                                    @if(isset($dataset->following_therapy))
                                        <?= $dataset->following_therapy ?>
                                    @endif
                                </p>
                            </div>
                            <div class="mt-3" style="text-align: right;">
                                <button class="btn btn-secondary">Request Information</button>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary submitLetter">Create Doctor's Letter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->

    <form action="{{ url('save-letter') }}" method="post" id="letterForm">
        @csrf
        <input type="hidden" name="id" value="{{ isset($dataset->id) ? $dataset->id : '' }}">
        <input type="hidden" name="patient_id" value="{{ $patient_id }}">
        <input type="hidden" name="introduction" id="introduction" value="">
        <input type="hidden" name="summary" id="summary" value="">
        <input type="hidden" name="diagnosis" id="diagnosis" value="">
        <input type="hidden" name="anamnesis" id="anamnesis" value="">
        <input type="hidden" name="physical_examination" id="physical_examination" value="">
        <input type="hidden" name="diagnostics" id="diagnostics" value="">
        <input type="hidden" name="medication" id="medication" value="">
        <input type="hidden" name="other_examination" id="other_examination" value="">
        <input type="hidden" name="practitioner_address" id="practitioner_address" value="">
        <input type="hidden" name="following_therapy" id="following_therapy" value="">
        <input type="hidden" name="laboratory_results" id="laboratory_results" value="">
    </form>
@endsection

@push('script')
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        let introduction_editor = new Quill('#introduction_editor', {
            //modules: { toolbar: '#toolbar' },
            theme: 'snow',
        });

        // let editor1 = new Quill('#editor1', {
        //     //modules: { toolbar: '#toolbar1' },
        //     theme: 'snow',
        // });

        let diagnosis_editor = new Quill('#diagnosis_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let anamnesis_editor = new Quill('#anamnesis_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let physical_examination_editor = new Quill('#physical_examination_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        // let editor5 = new Quill('#editor5', {
        //     //modules: { toolbar: '#toolbar1' },
        //     theme: 'snow',
        // });

        let summary_editor = new Quill('#summary_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let medication_editor = new Quill('#medication_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let practitioner_address_editor = new Quill('#practitioner_address_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let other_examination_editor = new Quill('#other_examination_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let following_therapy_editor = new Quill('#following_therapy_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        let laboratory_results_editor = new Quill('#laboratory_results_editor', {
            //modules: { toolbar: '#toolbar1' },
            theme: 'snow',
        });

        $('.submitLetter').click(function () {
            $('#introduction').val(introduction_editor.root.innerHTML)
            $('#summary').val(summary_editor.root.innerHTML)
            $('#diagnosis').val(diagnosis_editor.root.innerHTML)
            $('#anamnesis').val(anamnesis_editor.root.innerHTML)
            $('#physical_examination').val(physical_examination_editor.root.innerHTML)
            //$('#diagnostics').val(editor5.root.innerHTML)
            $('#medication').val(medication_editor.root.innerHTML)
            $('#practitioner_address').val(practitioner_address_editor.root.innerHTML)
            $('#other_examination').val(other_examination_editor.root.innerHTML)
            $('#following_therapy').val(following_therapy_editor.root.innerHTML)
            $('#laboratory_results').val(laboratory_results_editor.root.innerHTML)
            $('#letterForm').submit();
        })
    </script>
@endpush
