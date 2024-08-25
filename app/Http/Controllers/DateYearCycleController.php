<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DateYearCycleController extends Controller
{
    public function index(){
        return view('date_cycle');
    }

    public function processYearCycle(Request $request)
    {
        // Validate input
        $request->validate([
            'date' => 'required|date',
        ]);

        // Parse the input date
        // $inputDate= "10-01-2023";
        $inputDate= Carbon::parse($request->date)->format('d-m-Y');

        $secondAndFourthSaturdays = $this->getSecondAndFourthSaturdays($inputDate);

        // Return view with the Saturdays
        return view('date_cycle', ['saturdays' => $secondAndFourthSaturdays]);
    }

    public function getSecondAndFourthSaturdays($inputDate){
        // Parse the input date
        $date = Carbon::createFromFormat('d-m-Y', $inputDate);

        // Determine the start and end of the year cycle
        if ($date->month >= 10) {
            // If the input date is in October or later, cycle starts on Oct 1 of this year
            $startOfCycle = Carbon::create($date->year, 10, 1);
            $endOfCycle = Carbon::create($date->year + 1, 9, 30);
        } else {
            // If the input date is before October, cycle starts on Oct 1 of the previous year
            $startOfCycle = Carbon::create($date->year - 1, 10, 1);
            $endOfCycle = Carbon::create($date->year, 9, 30);
        }

        $secondAndFourthSaturdays = [];

        // Iterate through each month in the cycle

        $currentMonth = $startOfCycle->copy();

        while ($currentMonth <= $endOfCycle) {
            // Get all Saturdays of the current month
            $saturdays = CarbonPeriod::create($currentMonth->copy()->firstOfMonth(), '1 week', $currentMonth->copy()->lastOfMonth())
                ->filter(function (Carbon $date) {
                    return $date->isSaturday();
                });

            // Get the second and fourth Saturdays
            $saturdaysArray = $saturdays->toArray();

            if (isset($saturdaysArray[1])) { // Second Saturday
                $secondAndFourthSaturdays[] = $saturdaysArray[1]->format('d-m-Y');
            }

            if (isset($saturdaysArray[3])) { // Fourth Saturday
                $secondAndFourthSaturdays[] = $saturdaysArray[3]->format('d-m-Y');
            }

            // Move to the next month
            $currentMonth->addMonth();
        }

        return $secondAndFourthSaturdays;
    }
}
