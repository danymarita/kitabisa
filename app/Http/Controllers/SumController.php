<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\MathOperationInterface;
use Validator;

class SumController extends Controller
{
    protected $result;
 
    public function __construct(MathOperationInterface $result)
    {
        $this->result = $result;
    }
    function process(Request $request) {
        $validation = Validator::make($request->all(), [
            'x' => 'required|numeric|min:1',
            'y' => 'required|numeric|min:1'
        ]);
        if ($validation->fails()) {
            return response()->json(['rc' => '40', 'result' => $validation->errors()->first()]);
        }
        return response()->json(['rc' => '00', 'result' => $this->result->process($request->x, $request->y)]);
    }
}
