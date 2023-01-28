<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkoutRequest;
use App\Http\Requests\UpdateWorkoutRequest;
use App\Models\CustomerTreatment;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class WorkoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view::make('workouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWorkoutRequest $request
     * @return Response
     */
    public function store(StoreWorkoutRequest $request)
    {
        $validated = $request->validated();
        $treatment = Workout::create($validated);
        session()->flash('alert_type', 'alert-success');

        return redirect()->route('tests.index')
            ->with(['status' => 'Trattamento inserito']);
    }

    /**
     * Display the specified resource.
     *
     * @param Workout $treatment
     * @return Response
     */
    public function show(Workout $treatment)
    {
        return view('treatments.show', [
            'treatment' => $treatment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Workout $treatment
     * @return Response
     */
    public function edit(Workout $treatment)
    {
        return view('treatments.edit', ['treatment' => $treatment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWorkoutRequest $request
     * @param Workout $treatment
     * @return Response
     */
    public function update(UpdateWorkoutRequest $request, Workout $treatment)
    {
        $validated = $request->validated();
        $treatment->update($validated);

        return redirect()->route('tests.show', ['treatment' => $treatment]);
    }

    //Report su tutti i trattamenti fatti
    public function get_report(Request $request)
    {
        $report = new CustomerTreatment;
        switch ($request->range) {
            case 'day':
                $reports = $report->get_treatments_group_day();
                break;
            case 'month':
                $reports = $report->get_treatments_group_month();
                break;
            case 'all':
                $reports = $report->get_treatments_group();
                break;
        }

        return view('treatments.report', ['reports' => $reports]);
    }

    //Report su tutti i trattamenti fatti
    public function get_report_date(Request $request)
    {
        $report = new CustomerTreatment;

        $reports = $report->get_treatments_group_date($request->from_date, $request->to_date);

        return view('treatments.report', ['reports' => $reports]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Workout $treatment
     * @return Response
     */
    public function destroy(Workout $treatment)
    {
        $treatment->delete();
        session()->flash('alert_type', 'alert-danger');

        return redirect()->route('tests.index')->with('status', 'Trattamento eliminato correttamente');
    }
}
