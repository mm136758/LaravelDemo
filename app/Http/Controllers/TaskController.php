<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index ()
	{
		$tasks =Task::where("iscompleted",false)->orderBy("id","DESC")->get();
		$c_tasks = Task:: where("iscompleted",true)->get();
		return response()->json([
			'tasks'=>$tasks,
			'c_tasks'=>$c_tasks
		]);
	}
	public function store(Request $request)
	{
		$task =Task::create($request->all());
		return response()->json([
			"code"=>200,
			"message" => "task added successfully"
		]);
	}
	public function complete ($id)
	{
		$task =Task::find($id);
		$task->iscompleted =true;
		$task->save();
		return response()->json([
			"code" =>200,
			"message"=>"Task listed as completed"
		]);
	}
	public function destroy($id)
	{
		$task =Task::find($id);
		$task->delete();
		return response()->json([
			"code"=>200,
			"message"=>"task deleted successfully"
		]);
	}

}
