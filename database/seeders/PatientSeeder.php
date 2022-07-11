<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'patient_id' => 'PAT124123',
            'first_name' => 'David',
            'last_name' => 'Mackoy',
            'dob' => '12.27.1986',
            'doctor' => 'Dannis Ritchie',
            'hospital_entry' => '06.06.2022',
            'hospital_exit' => '07.06.2022',
            'symptom' => 'Dry Coughing'
        ]);

        Patient::create([
            'patient_id' => 'PAT123323',
            'first_name' => 'Jay',
            'last_name' => 'Shah',
            'dob' => '01.04.1978',
            'doctor' => 'James Bowman',
            'hospital_entry' => '09.06.2022',
            'hospital_exit' => '13.06.2022',
            'symptom' => 'Severe Headache'
        ]);

        Patient::create([
            'patient_id' => 'PAT154123',
            'first_name' => 'Steve',
            'last_name' => 'Wilson',
            'dob' => '05.12.1980',
            'doctor' => 'Harry Kane',
            'hospital_entry' => '21.06.2022',
            'hospital_exit' => '22.06.2022',
            'symptom' => 'Backbone Pain'
        ]);

        Patient::create([
            'patient_id' => 'PAT124765',
            'first_name' => 'Jinshu',
            'last_name' => 'Pittambaram',
            'dob' => '10.05.1992',
            'doctor' => 'Dannis Ritchie',
            'hospital_entry' => '06.06.2022',
            'hospital_exit' => '07.06.2022',
            'symptom' => 'Dry Coughing'
        ]);

        Patient::create([
            'patient_id' => 'PAT984123',
            'first_name' => 'Angela',
            'last_name' => 'Napoleon',
            'dob' => '12.12.1978',
            'doctor' => 'Dannis Ritchie',
            'hospital_entry' => '08.06.2022',
            'hospital_exit' => '09.06.2022',
            'symptom' => 'Dry Coughing'
        ]);

        Patient::create([
            'patient_id' => 'PAT124113',
            'first_name' => 'Pritam',
            'last_name' => 'Nandy',
            'dob' => '08.16.1994',
            'doctor' => 'James Bowman',
            'hospital_entry' => '19.06.2022',
            'hospital_exit' => '23.06.2022',
            'symptom' => 'Severe Headache'
        ]);

        Patient::create([
            'patient_id' => 'PAT989123',
            'first_name' => 'Ronald',
            'last_name' => 'Tudu',
            'dob' => '05.12.1992',
            'doctor' => 'Harry Kane',
            'hospital_entry' => '21.06.2022',
            'hospital_exit' => '22.06.2022',
            'symptom' => 'Backbone Pain'
        ]);

        Patient::create([
            'patient_id' => 'PAT004123',
            'first_name' => 'James',
            'last_name' => 'Rodrigade',
            'dob' => '07.06.1976',
            'doctor' => 'Dannis Ritchie',
            'hospital_entry' => '06.06.2022',
            'hospital_exit' => '07.06.2022',
            'symptom' => 'Dry Coughing'
        ]);
    }
}
