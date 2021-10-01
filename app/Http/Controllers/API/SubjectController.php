<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subjects = Subject::all();
         return response()->json($subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_name' => 'required|string|max:50|unique:subjects',
    ]);
    $input = $request->all();
    try{
         $subject = Subject::create($input);
         return response()->json(['success' => $subject, 'success code'=>200]);
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
        $subject = Subject::find($id);
        if(!$subject){
             return response('This subject is not exists! try another one.');
        }else{
            return response()->json(['message' => 'Yeah! data available.', 'data' => $subject]);
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
        //
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
        $subject = Subject::find($id);
         $request->validate([
            'subject_name' => 'required|string|max:50|unique:subjects',
    ]);
    $input = $request->all();
    try{
         $subject->update($input);
         return response()->json(['success' => $subject, 'success code'=>200]);
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
        $subject = Subject::find($id);
        try{
            $subject->delete();
            return response()->json(['success' => 'Subject has been delete!']);
       }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], $e->getCode());
       }
    }
}
