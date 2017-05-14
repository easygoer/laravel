<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * タスクリポジトリーインスタンス
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        // $tasks = $request->user()->tasks()->get();
        $tasks = $this->tasks->all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }
    /**
     * 新タスク作成
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
    ]);

        $request->user()->tasks()->create([
        'name' => $request->name,
    ]);

        return redirect('/tasks');
    }

    /**
     * 指定タスクの削除
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }
}
