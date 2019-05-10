<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlocNote;
use App\Medicine;
use App\Patient;
use App\Sign;
use App\VitalSign;
use App\Medicament;
use App\Staff;

class PatientController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $patients = Patient::all()->sortBy('MRN');

        return view('page_patient', [
            'patients' => $patients
        ]);
    }

    public function displayView($patID) {
        $patient = Patient::findOrFail($patID);
        return view('page_patient_view', [
            'patient' => $patient,
            'signs' => Sign::all(),
            'medicaments' => Medicament::all(),
            'staffs' => Staff::all(),
            'activities' => $this->getActivities($patID),
            'temperatures' => $this->getDiagramData($patient->getTemperature()),
            'pulses' => $this->getDiagramData($patient->getPulse()),
            'activities_2' => $this->getDiagramData($patient->getActivity()),
            'bloodPressures' => $this->getDiagramData($patient->getBloodPressure()),
        ]);
    }

    public function displayEdit($patID) {
        return view('page_patient_edit', [
            'patient' => Patient::findOrFail($patID),
            'signs' => Sign::all(),
            'activities' => $this->getActivities($patID)
        ]);
    }

    public function addNew(Request $request) {
        $this->validate($request, [
            'name'          => 'min:2|alpha-dash',
            'firstname'     => 'min:2|alpha-dash',
            'birthdate'     => 'before:tomorrow',
            '*'             => 'required'
        ]);

        $patient = new Patient();
        $patient->MRN = Patient::max('MRN') + 1;
        $patient->name = $request->name;
        $patient->first_name = $request->firstname;
        $patient->gender = $request->gender;
        $patient->birthdate = $request->birthdate;

        $patient->save();

        return redirect( '/patients' );
    }

    public function save($patID, Request $request) {
        $patient = Patient::findOrFail($patID);
        $this->validate($request, [
            'name'          => 'min:2|alpha-dash',
            'firstname'     => 'min:2|alpha-dash',
            'birthday'      => 'before:tomorrow',
            '*'             => 'required'
        ]);

        $patient->name = $request->name;
        $patient->first_name = $request->firstname;
        $patient->gender = $request->gender;
        $patient->birthdate = $request->birthdate;

        $patient->save();

        return redirect( '/patient/' . $patID );
    }

    public function patientDel($patID) {
        $patient = Patient::findOrFail($patID);
        $patient->delete();
        return redirect( '/patients' );
    }

    public function displayAdd() {
        return view('page_patient_add');
    }

    public function addVital($patID, Request $request) {
        $patient = Patient::findOrFail($patID); // Check if patient exists, or die
        $this->validate($request, [
            'sign'          => 'required|exists:Sign,signID',
            'value'         => 'required|numeric|min:30|max:200',
            'timestamp'     => 'required|before:tomorrow',
        ]);

        $vitalSign = new VitalSign();
        $vitalSign->patientID = $patID;
        $vitalSign->signID = $request->sign;
        $vitalSign->value = $request->value;
        $vitalSign->time = $request->timestamp;
        $vitalSign->note = ($request->note === null) ? '' : $request->note;

        $vitalSign->save();

        return redirect( '/patient/' . $patID );
    }

    public function addMedicine($patID, Request $request) {
        $patient = Patient::findOrFail($patID); // Check if patient exists, or die
        $this->validate($request, [
            'medicament'    => 'required|exists:Medicament,medicamentID',
            'quantity'      => 'required|numeric|min:1|max:10',
            'mtimestamp'    => 'required|before:tomorrow',
            'nurse'         => 'required|exists:Staff,staffID',
            'physician'     => 'required|exists:Staff,staffID',
        ]);

        $medicine = new Medicine();
        $medicine->time = $request->mtimestamp;
        $medicine->quantity = $request->quantity;
        $medicine->medicamentID = $request->medicament;
        $medicine->patientID = $patID;
        $medicine->staffID_nurse = $request->nurse;
        $medicine->staffID_physician = $request->physician;
        $medicine->note = ($request->mnote === null) ? '' : $request->mnote;

        $medicine->save();

        return redirect( '/patient/' . $patID );
    }

    public function toIndex() {
        return redirect('patients');
    }

    public function getActivities($patID) {
        Patient::findOrFail($patID);
        $blocNotes = BlocNote::where('patientID', $patID)->get();
        $vitalSigns = VitalSign::where('patientID', $patID)->get();
        $medicines = Medicine::where('patientID', $patID)->get();

        $activities = array();

        foreach ($blocNotes as $blocNote) {
            $entry = array(
                'time' => $blocNote->time,
                'content' => $blocNote->note . '<br>By: ' . $blocNote->getStaffName(),
                'type' => 'note',
                'icon' => 'mdi-pen'
            );
            array_push($activities, $entry);
        }

        foreach ($vitalSigns as $vitalSign) {
            $entry = array(
                'time' => $vitalSign->time,
                'content' => $vitalSign->getSign()  . ': ' . $vitalSign->value . (($vitalSign->note == '') ? '' : '<br>Note: ' .$vitalSign->note),
                'type' => 'vitalsign',
                'icon' => 'mdi-pulse'
            );
            array_push($activities, $entry);
        }

        foreach ($medicines as $medicine) {
            $entry = array(
                'time' => $medicine->time,
                'content' => $medicine->getMedicamentName() . "<br />Quantity: " . $medicine->quantity . "<br>Nurse: " . $medicine->getNurseName() . (($medicine->note == '') ? '' : "<br>Note: " .$medicine->note),
                'type' => 'medicine',
                'icon' => 'mdi-needle'
            );
            array_push($activities, $entry);
        }

        usort($activities, function($a, $b) {
            return $b['time'] <=> $a['time'];
        });

        return $activities;
    }

    public function getDiagramData($temperatures) {
        $data = '';
        foreach ($temperatures as $t) {
            $month = intval(date('n', strtotime($t['time']))) - 1;
            $data .= "{ x: new Date(" . date('Y', strtotime($t['time'])) . ", " .  $month  . ", " . date('d', strtotime($t['time'])) . ", " . date('H', strtotime($t['time'])) . ", " . date('m', strtotime($t['time'])) ."), y: " . $t['value'] . " },";
        }
        return $data;
    }

}
