<?php
namespace Rafiur\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Rafiur\model\Task;

class AgentController extends Controller
{
    public function __construct()
    {
        //echo "I ama contructor";
    }
    public function agent_list()
    {
        $tasks=Task::get();
        return $tasks;
    }
    public function add_new_agent(Request $request)
    {
        
        
    }
}
