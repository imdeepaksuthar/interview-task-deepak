<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class LogicalController extends Controller
{
    public function IdentifyNextNumber()
    {
        // Sequence 1 calculation
        $sequence1 = [25, 49, 97];
        $nextTerm1 = $sequence1[count($sequence1) - 1] + (2 * ($sequence1[count($sequence1) - 1] - $sequence1[count($sequence1) - 2]));

        // Sequence 2 calculation
        $sequence2 = [45, 97, 177, 291];
        $differences = [
            $sequence2[1] - $sequence2[0],
            $sequence2[2] - $sequence2[1],
            $sequence2[3] - $sequence2[2]
        ];
        $secondOrderDifferences = [
            $differences[1] - $differences[0],
            $differences[2] - $differences[1]
        ];
        $nextSecondOrderDifference = $secondOrderDifferences[1] + 6;
        $nextDifference = $differences[2] + $nextSecondOrderDifference;
        $nextTerm2 = $sequence2[count($sequence2) - 1] + $nextDifference;

        return response()->json([
            'sequence1_next_term' => $nextTerm1,
            'sequence2_next_term' => $nextTerm2
        ]);
    }
}
