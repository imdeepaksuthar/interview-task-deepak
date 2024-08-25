<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CalculateDeliveryDateController extends Controller
{
    public function index(){
        return view('calculateDeliveryDate');
    }

    public function calculateDeliveryDate(Request $request)
    {


        // Validate the incoming request
        $validated = $request->validate([
            'start_date' => 'required|date',
            'effort_days' => 'required|integer|min:1',
        ]);

        $startDate = Carbon::parse($validated['start_date']);
        $effortDays = $validated['effort_days'];

        $deliveryDate = $this->getDeliveryDate($startDate, $effortDays);

        $data = $deliveryDate->format('d-M-Y');
        return view('calculateDeliveryDate',compact('data'));

    }

    private function getDeliveryDate(Carbon $startDate, $effortDays)
    {
        $daysAdded = 0;

        while ($daysAdded < $effortDays) {
            // Move to the next day
            $startDate->addDay();

            // Get the day of the week (Sunday = 0, Saturday = 6)
            $dayOfWeek = $startDate->dayOfWeek;

            // Exclude Sundays
            if ($dayOfWeek == Carbon::SUNDAY) {
                continue;
            }

            // Exclude first and third Saturdays
            if ($dayOfWeek == Carbon::SATURDAY) {
                $weekNumber = $startDate->weekOfMonth;
                if ($weekNumber == 1 || $weekNumber == 3) {
                    continue;
                }
            }

            // Increment the added day count if the day is valid
            $daysAdded++;
        }
        return $startDate;
    }
}
