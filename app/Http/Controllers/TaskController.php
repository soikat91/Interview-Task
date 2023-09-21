<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{    

     public function task(){

        
        return view('pages.task-page');
     }
    public function taskList(Request $request)
    {
        $userId=$request->header('id');
        return Task::where('user_id',$userId)->get();
      
    }
    function taskCreate(Request $request){

        $userId=$request->header('id');
        return Task::create([
            "title"=>$request->title,
            "description"=>$request->description,
            'user_id'=>$userId
        ]);        
        
    }

    function taskDelete(Request $request){
        $userId=$request->header('id');
       return Task::where('user_id',$userId)->where('id',$request->id)->delete();
       
    }

    function taskById(Request $request){
        $userId=$request->header('id');
        $id=$request->input('id');
        return Task::where('user_id',$userId)->where('id',$id)->first();
    }    
    function taskUpdate(Request $request){
        $userId=$request->header('id');
        $id=$request->input('id');
        return Task::where('user_id',$userId)->where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'id'=>$id,
        ]);

       
    }

    function taskShow(Request $request){
        $userId=$request->header('id');
        $id=$request->input('id');
       return Task::where('user_id',$userId)->where('id',$id)->first();
       
    }

  
}