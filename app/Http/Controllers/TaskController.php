<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // عرض صفحة إضافة مهمة جديدة
    public function create()
    {
        return view('tasks.create');
    }

    // إضافة مهمة جديدة
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Task::create(['name' => $request->input('name')]);
        return redirect()->route('tasks.index');
    }

    // عرض صفحة تعديل المهمة
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    // تحديث مهمة
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $task = Task::findOrFail($id);
        $task->update(['name' => $request->input('name')]);
        return redirect()->route('tasks.index');
    }

    // حذف مهمة
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index');
    }
}
