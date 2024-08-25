<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomNumbersController extends Controller
{
    public function MethodOne(Request $request){
         // Step 1: Create an array with 20 random numbers between 0 and 36
         $randomNumbers = [];
         for ($i = 0; $i < 20; $i++) {
             $randomNumbers[] = rand(0, 36);
         }

         // Step 2: Define the row arrays
         $row1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
         $row2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
         $row3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];

         // Step 3: Count how many numbers from $randomNumbers are in $row1, $row2, and $row3
         $row1Count = count(array_intersect($randomNumbers, $row1));
         $row2Count = count(array_intersect($randomNumbers, $row2));
         $row3Count = count(array_intersect($randomNumbers, $row3));

         // Step 4: Output the results
         return response()->json([
             'randomNumbers' => $randomNumbers,
             'row1Count' => $row1Count,
             'row2Count' => $row2Count,
             'row3Count' => $row3Count,
         ]);
    }

    public function MethodSecond(){
        // Step 1: Create an array with 20 random numbers between 0 and 36
        $randomNumbers = [];
        for ($i = 0; $i < 20; $i++) {
            $randomNumbers[] = rand(0, 36);
        }

        // Step 2: Define the row arrays
        $row1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
        $row2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
        $row3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];

        // Step 3: Count how many numbers from $randomNumbers are in $row1, $row2, and $row3
        $row1Count = count(array_intersect($randomNumbers, $row1));
        $row2Count = count(array_intersect($randomNumbers, $row2));
        $row3Count = count(array_intersect($randomNumbers, $row3));

        // Step 4: Determine which row has the maximum count
        $maxCount = max($row1Count, $row2Count, $row3Count);

        if ($maxCount == $row1Count) {
            $maxRow = 'Row 1';
        } elseif ($maxCount == $row2Count) {
            $maxRow = 'Row 2';
        } else {
            $maxRow = 'Row 3';
        }

        // Step 5: Output the results
        return response()->json([
            'randomNumbers' => $randomNumbers,
            'row1Count' => $row1Count,
            'row2Count' => $row2Count,
            'row3Count' => $row3Count,
            'maxRow' => $maxRow,
        ]);
    }

    public function MethodThird() {
         // Step 1: Create an array with 20 random numbers between 0 and 36
         $randomNumbers = [];
         for ($i = 0; $i < 20; $i++) {
             $randomNumbers[] = rand(0, 36);
         }

         // Step 2: Define the row arrays
         $row1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
         $row2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
         $row3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];

         // Step 3: Count how many numbers from $randomNumbers are in $row1, $row2, and $row3
         $row1Count = count(array_intersect($randomNumbers, $row1));
         $row2Count = count(array_intersect($randomNumbers, $row2));
         $row3Count = count(array_intersect($randomNumbers, $row3));

         // Step 4: Determine which row has the maximum count
         $maxCount = max($row1Count, $row2Count, $row3Count);

         // Step 5: Handle case where two rows have the same maximum count
         // First, check for ties between the counts
         if (($row1Count === $maxCount && $row2Count === $maxCount) ||
             ($row1Count === $maxCount && $row3Count === $maxCount) ||
             ($row2Count === $maxCount && $row3Count === $maxCount)) {

             // Get the last element of the $randomNumbers array
             $lastElement = end($randomNumbers);

             // Check which row contains the last element
             if (in_array($lastElement, $row1)) {
                 $maxRow = 'Row 1';
             } elseif (in_array($lastElement, $row2)) {
                 $maxRow = 'Row 2';
             } else {
                 $maxRow = 'Row 3';
             }

         } else {
             // If no tie, assign based on max count
             if ($maxCount == $row1Count) {
                 $maxRow = 'Row 1';
             } elseif ($maxCount == $row2Count) {
                 $maxRow = 'Row 2';
             } else {
                 $maxRow = 'Row 3';
             }
         }

         // Step 6: Output the results
         return response()->json([
             'randomNumbers' => $randomNumbers,
             'row1Count' => $row1Count,
             'row2Count' => $row2Count,
             'row3Count' => $row3Count,
             'maxRow' => $maxRow,
         ]);
    }
}
