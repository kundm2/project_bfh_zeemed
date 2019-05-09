<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Staff;
use App\Medicament;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $patient_count = Patient::count();
        $user_count = Staff::count();
        $medicament_count = Medicament::count();

        return view('page_dashboard', [
            'patient_count' => $patient_count,
            'user_count' => $user_count,
            'medicament_count' => $medicament_count
        ]);
    }

    public function toRoot() {
        return redirect('/dashboard');
    }
}
