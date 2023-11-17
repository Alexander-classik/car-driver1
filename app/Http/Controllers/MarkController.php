<?php

namespace App\Http\Controllers;

use App\Models\MarkModel;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function index()
    {
        $mark = MarkModel::all();
        return view('mark.index', compact('mark'));
    }

    public function show($id){
        return view('mark.show', ['mark' => MarkModel::findOrFail($id)]);
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $mark = MarkModel::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate(10);
        return view('mark.search', compact('mark'));
    }

    public function add()
    {
        return view('mark.add');
    }

//    public function del($id)
//    {
//        CarModel::find($id)->delete();
//        $blosks = Blocks::all();
//        return view('main.index', compact('blosks'));
//    }

    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'name' => 'required',
        ]);

        // добавляет в базу данных данные из формы
        $mark = MarkModel::create([
            'name' => $request->name,
        ]);

        return redirect('mark');
    }
    //
}
