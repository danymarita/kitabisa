<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\NumberSequenceInterface;
use Validator;

class FibonacciController extends Controller
{
    protected $result;
 
    public function __construct(NumberSequenceInterface $result)
    {
        $this->result = $result;
    }
    function process(Request $request) {
        $validation = Validator::make($request->all(), [
            'number' => 'required|numeric|min:1'
        ]);
        if ($validation->fails()) {
            return response()->json(['rc' => '40', 'result' => $validation->errors()->first()]);
        }
        return response()->json(['rc' => '00', 'result' => $this->result->process($request->number)]);
    }
}
