<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redis;


class TaskController extends Controller
{



    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $client = Redis::connection();

        //Fetching all keys from redis
        $redisKeys = $client->keys('task:*');
        $tasks = [];

        //Get all values from Redis key wise
        foreach ($redisKeys as $key=>$redisKey){
            $actualKey = explode(":",$redisKey) ;
            $data = Redis::Get('task:' . $actualKey[1]);

            $tasks[] = json_decode($data);

        }

        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $data['entryBy'] = 1;

        //Store in database table
        $task = Task::create($data);

        //Connected to Redis
        $client = Redis::connection();

        //Store in redis
        Redis::set('task:' . $task->id, $task);

        return response()->json([
            'message'=>'Task Created Successfully!!',
            'category'=>$task
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return response()->json($task);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //Update in database table
        $task->fill($request->post())->save();

        //Update in redis
        Redis::set('task:' . $task->id, $task);

        return response()->json([
            'message'=>'Task Updated Successfully!!',
            'category'=>$task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //Delete From database table
        $task->delete();
        //Delete From redis
        Redis::del('task:' . $task->id, $task);
        return response()->json([
            'message'=>'Task Deleted Successfully!!'
        ]);
    }
    public function required_data(Task $task)
    {
        $user =User::all();
        return response()->json($user);
    }
}
