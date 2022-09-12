<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\Station;
use App\Models\AssignSensor;

class SensorController extends Controller
{

    public function index() {
        $sensors = Sensor::get();
        return view('sensors.index',compact('sensors',$sensors));
    }

    public function create() {
        return view('sensors.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|unique:sensors',
        ]);

        $sensor             = new Sensor;
        $sensor->name       = $request->name;
        $sensor->code       = $request->code;
        $sensor->status     = $request->status;
        $sensor->save();
        return redirect()->route('sensors')->with('success','Sensor Create Successfully');

    }

    public function edit($id) {

        $sensor = Sensor::where('id',$id)->first();
        return view('sensors.edit',compact('sensor',$sensor));
    }

    public function update(Request $request,$id) {

        $sensor             = Sensor::where('id',$id)->first();
        $sensor->name       = $request->name;
        $sensor->code       = $request->code;
        $sensor->status     = $request->status;
        $sensor->save();

        return redirect()->route('sensors')->with('success','Sensor Update Successfully');
    }

    public function delete($id) {

        $sensor = Sensor::where('id',$id)->delete();
        return redirect()->back();
    }

    public function status(Request $request) {

        $sensor = Sensor::find($request->id);
        $sensor->status = $request->status;
        $sensor->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

    public function assign_sensor() {

        $assign_sensor = AssignSensor::with('sensor','station')->get();
        return view('assign_sensor.index',compact('assign_sensor',$assign_sensor));
    }

    public function assign_sensor_create() {

        $station = Station::get();
        $sensor  = Sensor::get();
        return view('assign_sensor.create',compact('station',$station,'sensor',$sensor));
    }

    public function assign_sensor_store(Request $request) {

        $check_sensor = AssignSensor::where('station_id',$request->station_id)->orwhere('sensor_id',$request->sensor_id)->first();

        if(isset($check_sensor) ) {

            return redirect()->back()->with('error','Station and Sensor is Already Assigned');
        }else{

            $assign_sensor                  = new AssignSensor;
            $assign_sensor->station_id      = $request->station_id;
            $assign_sensor->sensor_id       = $request->sensor_id;
            $assign_sensor->save();
            return redirect()->route('assign_sensor')->with('success','Station Assign Successfully');
        }

    }

    public function assign_sensor_delete($id) {

        $sensor = AssignSensor::where('id',$id)->delete();
        return redirect()->back()->with('success','Assign Station Delete successfully');

    }

}
