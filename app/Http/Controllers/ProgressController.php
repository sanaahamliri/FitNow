<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index()
    {
        $progress = Progress::all();

        $data = [
            'status' => 200,
            'progress' => $progress,
        ];
        
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'Arm_Circumference' => 'required',
            'Hip_Circumference' => 'required',
            'Waist_Circumference' => 'required',
        ]);
        $progress = new Progress;
        $progress->weight = $request->weight;
        $progress->height = $request->height;
        $progress->Arm_Circumference = $request->Arm_Circumference;
        $progress->Hip_Circumference = $request->Hip_Circumference;
        $progress->Waist_Circumference = $request->Waist_Circumference;

        $progress->save();

        $data = [
            'status' => 200,
            'message' => 'Data stored successfully',
        ];
        return response()->json($data, 200);
    }

    public function edit(Request $request, $id){

        $validator = $request->validate([
            'name' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'Arm_Circumference' => 'required',
            'Hip_Circumference' => 'required',
            'Waist_Circumference' => 'required',
        ]);
        $progress = Progress::find($id);
        $progress->weight = $request->weight;
        $progress->height = $request->height;
        $progress->Arm_Circumference = $request->Arm_Circumference;
        $progress->Hip_Circumference = $request->Hip_Circumference;
        $progress->Waist_Circumference = $request->Waist_Circumference;

        $progress->save();

        $data = [
            'status' => 200,
            'message' => 'Data updated successfully',
        ];
        return response()->json($data, 200);

    }

    public function delete($id){
        $progress = progress::find($id);
        $progress->delete();
        $data = [
            'status' => 200,
            'message' => 'Data deleted successfully',
        ];
        return response()->json($data, 200);
    }
}
