<?php

namespace App\Http\Controllers;

use App\Models\TypeDriverModel;
use Illuminate\Http\Request;

class TypeDriverController extends Controller
{
    public function index()
    {
        $type_driver = TypeDriverModel::all();
        return view('td.index', compact('type_driver'));
    }

    public function show($id){
        return view('td.show', ['type_driver' => TypeDriverModel::findOrFail($id)]);
    }

    public function add()
    {
        return view('td.add');
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
        $mark = TypeDriverModel::create([
            'name' => $request->name,
        ]);

        return redirect('td');
    }
}
