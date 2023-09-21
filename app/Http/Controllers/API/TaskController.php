<?php

namespace App\Http\Controllers\API;
use Exception;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function taskList(Request $request)
    {
        $userId=$request->header('id');
        $task=Task::where('user_id',$userId)->get();
        
        return response()->json([
            "message"=>"Task List",
            "Task"=>$task
        ]);
      
    }
    function taskCreate(Request $request){

        $userId=$request->header('id'); 

        try {
            $task= Task::create([
                "title"=>$request->title,
                "description"=>$request->description,
                'user_id'=>$userId
            ]);

            if($task===1){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Task Insert Successfully',
                    "Task"=>$task
                ],201);
            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Task Insert Successfully'
                ],201);
            }
            

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task Insert Failed'
            ],200);

        }
        
    }

    function taskDelete(Request $request){

        $taskId=$request->input('id');
        $userId=$request->header('id'); 
    
        try {
            
            $task=Task::where('user_id',$userId)->where('id',$taskId)->delete();

            if($task===1){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Task Delete Successfully',
                    "Task"=>$task
                ],201);
            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Task Delete Failed'
                ]);
            }          

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task Delete Failed Please Insert Valid ID '
            ],200);

        }
        
    }

    function taskById(Request $request){
        $userId=$request->header('id');
        $id=$request->input('id');
        return Task::where('user_id',$userId)->where('id',$id)->first();
    } 
    
    
    function taskUpdate(Request $request){
        $userId=$request->header('id');
        $id=$request->input('id');    
       

        try {
            
           $task= Task::where('user_id',$userId)->where('id',$id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'id'=>$id,
            ]);

            if($task===1){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Task Update Successfully',
                    "Task"=>$task
                ],201);
            }else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Task Update Failed Please Insert Correct ID'
                ]);
            }     
           

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task Update Failed'
            ],200);

        }


       
    }

    function taskShow(Request $request){

        $userId=$request->header('id');
        $id=$request->input('id');       

       try {
            
        $task=Task::where('user_id',$userId)->where('id',$id)->first();
      
            return response()->json([
                'status' => 'success',
                'message' => 'Task Show',
                "Task"=>$task
            ]);
             

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Task Delete Failed Please Insert Valid ID '
            ],200);

        }
       
    }
}
