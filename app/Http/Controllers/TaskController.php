<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
     // Метод получения всех задач
     public function index()
     {
         $tasks = Task::all();
         return response()->json($tasks);
     }
 
     // Метод создания новой задачи
     public function store(Request $request)
     {
         $task = Task::create($request->all());
         return response()->json($task, 201);
     }
 
     // Метод получения одной задачи
     public function show( $id)
     {
        $task = Task::find($id);
        return response()->json($task);
     }
 
     // Метод обновления задачи
     public function update(Request $request, Task $task)
     {
         $task->update($request->all());
         return response()->json($task);
     }
 
     // Метод удаления задачи
     public function destroy($id)
     {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
    
        $task->delete();
    
        return response()->json(['message' => 'Task deleted successfully']);
     }

     public function filter_task(Request $request)
{
    $status = $request->input('status'); // получаем значение фильтра статуса
    $date = $request->input('date'); // получаем значение фильтра даты

    $tasks = Task::query();

    if ($status) {
        $tasks->where('status', $status);
    }

    if ($date) {
        $tasks->whereDate('created_at', $date);
    }

    return response()->json($tasks->get());
}
}
