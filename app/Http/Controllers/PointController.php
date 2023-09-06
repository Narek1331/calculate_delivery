<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PointService;

class PointController extends Controller
{
    private $pointService;
    public function __construct(PointService $pointService){
        $this->pointService = $pointService;
    }

    public function index(){

        $datas = $this->pointService->get();

        return response()->json([
            'status' => true,
            'datas' => $datas
        ],200);
    }

    public function calculate(Request $request){

        $data = $this->pointService->calculate($request->point_from,$request->point_to,$request->delivery,$request->weight_kg);

        return response()->json([
            'status' => true,
            ...$data
        ],200);
    }
}
