<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\DriversModel;
use App\Models\MarkModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $car = CarModel::all();
        return view('main.index', compact('car'));
    }

    public function show($id){
        return view('main.show', ['car' => CarModel::findOrFail($id)]);
    }

//    public function search(Request $request)
//    {
//        $s = $request->s;
//        $car = CarModel::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate(10);
//        return view('car.search', compact('car'));
//    }

    public function add()
    {
        $mark = MarkModel::all();
        $driver = DriversModel::all();
        return view('main.addCar', compact('mark', 'driver'));
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
            'year' => 'required',
            'description' => 'required',
            'driver_id' => 'required',
            'mark_id' => 'required',
            'img' => '|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $imagePath = $request->hasFile('img')
            ? $request->file('img')->store('car_img', 'public')
            : 'default/default.jpg';

        // добавляет в базу данных данные из формы
        $main = CarModel::create([
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'driver_id' => $request->driver_id,
            'mark_id' => $request->mark_id,
            'img' => $imagePath
        ]);

        return redirect()->route('/');
    }
    //
}
