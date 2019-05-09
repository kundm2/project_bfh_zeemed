<?php

namespace App\Http\Controllers;

use App\StaffFunction;
use App\Medicament;
use Illuminate\Support\Facades\Input;
use Spatie\Searchable\Search;
use App\Patient;
use App\Staff;
use Symfony\Component\HttpFoundation\Request;

class OptionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $functions = StaffFunction::all();
        $medicaments = Medicament::all();

        return view('page_options', [
            'functions' => $functions,
            'medicaments' => $medicaments
        ]);
    }

    public function search() {
        $q = Input::get('q', false);

        if ($q == '') {
            return redirect( '/' );
        }

        $searchResults = (new Search())
            ->registerModel(Patient::class, array('MRN', 'name', 'first_name'))
            ->registerModel(Staff::class, array('name', 'first_name'))
            ->registerModel(Medicament::class, 'medicament_name')
            ->registerModel(StaffFunction::class, 'function_name')
            ->search($q);

        return view('page_search', [
            'q' => $q,
            'searchResults' => $searchResults
        ]);
    }

    public function functionAdd(Request $request) {

        $this->validate($request, [
            'f' => 'min:2|alpha-dash|unique:function,function_name',
            '*' => 'required'
        ]);

        $staffFunction = new StaffFunction();
        $staffFunction->function_name = $request->f;
        $staffFunction->save();

        return redirect( '/options' );
    }

    public function medicamentAdd(Request $request) {

        $this->validate($request, [
            '*' => 'required|min:1|regex:/[a-zA-Z0-9\s]+/',
        ]);

        $medicament = new Medicament();
        $medicament->medicament_name = $request->name;
        $medicament->unit = $request->unit;
        $medicament->save();

        return redirect( '/options' );
    }

    public function functionDel($id, Request $request) {
        $staffFunction = StaffFunction::find($id);
        if (!$staffFunction->isUsed())
            $staffFunction->delete();

        return redirect( '/options' );
    }

    public function medicamentDel($id, Request $request) {
        $medicament = Medicament::find($id);
        if (!$medicament->isUsed())
            $medicament->delete();

        return redirect( '/options' );
    }
}
