<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;

class StationController extends Controller
{

    public function index() {

        $stations = Station::get();
        return view('stations.index',compact('stations',$stations));
    }

    public function create() {
        return view('stations.create');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|unique:stations',
        ]);

        $station             = new Station;
        $station->name       = $request->name;
        $station->location   = $request->location;
        $station->code       = $request->code;
        $station->status     = $request->status;
        $station->save();
        
        return redirect()->route('stations')->with('success','Station create Successfully');
    }

    public function edit($id) {

        $station = Station::where('id',$id)->first();
        return view('stations.edit',compact('station',$station));
    }

    public function update(Request $request,$id) {

        $station             = Station::where('id',$id)->first();
        $station->name       = $request->name;
        $station->location   = $request->location;
        $station->code       = $request->code;
        $station->status     = $request->status;
        $station->save();

        return redirect()->route('stations')->with('success','Station Update SUccessfully');
    }

    public function delete($id) {

        $station = Station::where('id',$id)->delete();
        return redirect()->back()->with('success','Station delete Successfully');
    }

    public function status(Request $request)
    {
        $station = Station::find($request->id);
        $station->status = $request->status;
        $station->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
