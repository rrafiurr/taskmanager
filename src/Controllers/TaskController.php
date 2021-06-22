<?php
namespace Rafiur\Controllers;
use Illuminate\Routing\Controller;

//use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Rafiur\model\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        //echo "I ama contructor";
    }
    public function show_task()
    {
        $tasks=Task::get();
        return $tasks;
    }
    public function new_tas_with_assing(Request $request)
    {
        $rules = array(
            'title'=> 'required',
            'description'=> 'nullable',
            'project_type'=> 'required'
        );
        $response = $this->validationWithJson($request->all(),$rules);
        

        if($response === true)
        {
            $task_save=new Task;
            $task_save->title=$request->title;
            $task_save->description=$request->description;
            $task_save->task_status=0;
            $task_save->type_id=1;

            $task_save->save();

            return $this->responseWithSuccess('Task Saved Successfully',$task_save);
        }else{
            return $this->responseWithError('Found Something wrong',$response); 
        }
        
        //dd($errors);
        
        
        

        //user_id json
    }

    protected function validationWithJson( $data=[],$rules=[],$message=[] )
    {
        
        $validator = Validator::make( $data, $rules,$message);

        if ($validator->fails()){
            //return $validator->errors();
            return $validator->messages()->all();

        }else{
            return true;
        }
    }
    protected function responseWithSuccess($message='',$data=[],$code=200)
    {
        return response()->json([
            'success'=> true,
            'message'=> $message,
            'data'   => $data
        ],$code);
    }
    protected function responseWithError($message='',$data=[],$code=400)
    {
        return response()->json([
            'error'   => true,
            'message' => $message,
            'data'    => $data
        ],$code);
    }
    
}
