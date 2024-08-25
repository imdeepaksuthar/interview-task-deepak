<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayLogicController extends Controller
{
    public function ArrayIndex(){
        return view('arrayIndex');
    }

    public function processArray(Request $request){
        // Validate the incoming request
        $validated = $request->validate([
            'language' => 'required|min:1',
        ]);

        $array = [
            ['id' => 5, 'language' => 'PHP'],
            ['id' => 6, 'language' => 'JAVA'],
            ['id' => 7, 'language' => 'PYTHON']
        ];

        $result = $this->checkValueExists($array, $request->language, 'language');

        if($result){
            $msg = "True:The language '{$request->language}' exists in the array";
        } else {
            $msg = "False:The language '{$request->language}' does not exist in the array";
        }

        return view('arrayIndex', compact('msg'));
    }

    public function checkValueExists($array, $value, $key)
    {
        // Extract the column of values for the specified key
        $column = array_column($array, $key);

        // Check if the given value exists in that column
        return in_array($value, $column);
    }
}
