<?php

namespace App\Http\Controllers;

use App\Models\TypeDriverModel;
use App\Models\DriversModel;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index()
    {
        $drivers = DriversModel::all();
        return view('drivers.index', compact('drivers'));
    }

    public function show($id){
        $type_driver = TypeDriverModel::all();
        return view('drivers.show', ['drivers' => DriversModel::findOrFail($id)], compact('type_driver'));
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $drivers = DriversModel::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate(10);
        return view('drivers.search', compact('drivers'));
    }

    public function add()
    {
        $type_driver = TypeDriverModel::all();
        return view('drivers.add', compact('type_driver'));
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
            'type_driver_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'number' => 'required',
            'img' => '|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $imagePath = $request->hasFile('img')
            ? $request->file('img')->store('driver_img', 'public')
            : 'default/driver.png';

        // добавляет в базу данных данные из формы
        $drivers = DriversModel::create([
            'name' => $request->name,
            'type_driver_id' => $request->type_driver_id,
            'price' => $request->price,
            'description' => $request->description,
            'number' => $request->number,
            'img' => $imagePath
        ]);

        return redirect('drivers');
    }
}
