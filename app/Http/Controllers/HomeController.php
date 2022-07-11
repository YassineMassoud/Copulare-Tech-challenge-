<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function generateLetter($id) {
        $dataset = Dataset::where('patient_id', $id)->first();
        return view('generate_letter', [
            'patient_id' => $id,
            'dataset' => $dataset
        ]);
    }

    function saveLetter(Request $request) {
        $dataset = Dataset::where('id', $request->input('id'))->first();

        if(isset($dataset->id)) {
            Dataset::where('id', $dataset->id)->update([
                'introduction' => $request->input('introduction'),
                'diagnosis' => $request->input('diagnosis'),
                'anamnesis' => $request->input('anamnesis'),
                'physical_examination' => $request->input('physical_examination'),
                'summary' => $request->input('summary'),
                'medication' => $request->input('medication'),
                'diagnostics' => $request->input('diagnostics'),
                'patient_id' => $request->input('patient_id'),
                'date' => date('Y-m-d H:i:s'),
                'doctor_details' => $request->input('doctor_details'),
                'practitioner_address' => $request->input('practitioner_address'),
                'other_examination' => $request->input('other_examination'),
                'following_therapy' => $request->input('following_therapy'),
                'laboratory_results' => $request->input('laboratory_results')
            ]);

            $dataset = Dataset::find($dataset->id);
            return Redirect::to('generated-letter/'. $dataset->id);
        } else {
            $dataset = Dataset::create([
                'introduction' => $request->input('introduction'),
                'diagnosis' => $request->input('diagnosis'),
                'anamnesis' => $request->input('anamnesis'),
                'physical_examination' => $request->input('physical_examination'),
                'summary' => $request->input('summary'),
                'medication' => $request->input('medication'),
                'diagnostics' => $request->input('diagnostics'),
                'patient_id' => $request->input('patient_id'),
                'date' => date('Y-m-d H:i:s'),
                'doctor_details' => $request->input('doctor_details'),
                'practitioner_address' => $request->input('practitioner_address'),
                'other_examination' => $request->input('other_examination'),
                'following_therapy' => $request->input('following_therapy'),
                'laboratory_results' => $request->input('laboratory_results')
            ]);

            return Redirect::to('generated-letter/'. $dataset['id']);
        }
    }

    function letter($id) {
        $dataset = Dataset::find($id);
        $patient = Patient::find($dataset->patient_id);
        return view('letter', [
            'dataset' => $dataset,
            'patient_id' => $dataset->patient_id,
            'patient' => $patient
        ]);
    }
}
