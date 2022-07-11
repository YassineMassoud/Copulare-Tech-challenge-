<html>
    <body>
        <div id="letterPart" style="max-width: 800px; border: 1px solid black; margin: auto;">
            <style>
                * {
                    font-size: .95rem;
                    font-family: monospace;
                }
                p {
                    margin: 0px !important;
                    line-height: 20px;
                }
                td {
                    padding: 0px 15px;
                }

                .hd-label {
                    visibility: hidden;
                }
            </style>
            <table style="width: 100%;">
                <tr>
                    <td style="float: right;
                        width: 26%;
                        text-align: right;">
                        <p>München Klinik Bogenhausen</p>
                        <p>Englschalkinger Str. 77</p>
                        <p>81925 München</p>
{{--                        <p>Dennis Ritchie</p>--}}
{{--                        <p>Test Doctor</p>--}}
{{--                        <p>Test Hospital</p>--}}
{{--                        <p>Test Hospital Address, Test, Test-12202</p>--}}
                    </td>
                </tr>
            </table>
{{--            <table style="width: 100%;">--}}
{{--                <tr>--}}
{{--                    <td style="width: 26%;">--}}
{{--                        <p>{{ date('d.m.Y') }}</p>--}}
{{--                        <p>{{ $patient->first_name }}</p>--}}
{{--                        <p>GP Name</p>--}}
{{--                        <p>Practice Name</p>--}}
{{--                        <p>Address</p>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </table>--}}
            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">General Practitioner's address</p>
                        <div>
                            <?= $dataset->practitioner_address; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->diagnosis; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->introduction; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->anamnesis; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->medication; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->physical_examination; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->other_examination; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->laboratory_results; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p class="hd-label">Introduction</p>
                        <div>
                            <?= $dataset->following_therapy; ?>
                        </div>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 20px;">
                <tr>
                    <td>
                        <p style="font-size: 15px !important;"><b>Mit freundlichen Grüßen</b></p>

                        <p>Dr. Alexander Rupp</p>
                        <p>Stationsarzt</p>
                        <p>Notaufnahme</p>
                        <p>München Klinik Bogenhausen</p>
                    </td>
                </tr>
            </table>

            <table style="width: 100%; margin-top: 30px;">
                <tr>
                    <td>
                        <div style="
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            Powered By <img src="{{ asset('assets/images/logo.png') }}" alt="" style="margin-left: 10px; height: 20px;">
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    <div style="max-width: 800px; margin: auto; margin-top: 20px; text-align: center;">
        <button class="btn btn-primary" onclick="printDiv('letterPart')" style="margin: 5px;">Print Letter</button>
        <a style="margin: 5px;" href="{{ url('generate-letter/'.$patient_id) }}">Edit Patient Letter</a>
        <a style="margin: 5px;" href="{{ url('/') }}">GO BACK TO DASHBOARD</a>
        <button style="margin: 5px;" href="" class="btn btn-primary">Share</button>
    </div>
    </body>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</html>
