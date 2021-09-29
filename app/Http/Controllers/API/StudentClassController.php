<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = StudentClass::all();
        return response()->json($classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
                'class_name' => 'required|string|max:15|unique:student_classes',
        ]);
        $input = $request->all();
        try{
             $class = StudentClass::create($input);
             return response()->json(['success' => $class, 'success code'=>200]);
        }catch(\Exception $e){
             return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = StudentClass::find($id);
        if(!$class){
             return response('This class is not exists! try another one.');
        }else{
            return response()->json(['message' => 'Yeah! data available.', 'data' => $class]);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $class = StudentClass::find($id);
        $validation = $request->validate([
            'class_name' => 'required|string|max:15|unique:student_classes',
    ]);
    $input = $request->all();
    try{
         $class->update($input);
         return response()->json(['success' => $class, 'success code'=>200]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = StudentClass::find($id);
        try{
            $class->delete();
            return response()->json(['success' => 'Class has been delete!']);
       }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], $e->getCode());
       }
    }
}
