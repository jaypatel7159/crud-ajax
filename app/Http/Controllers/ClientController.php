<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;



use Illuminate\Http\File;

use Illuminate\Support\Facades\Storage;
use DataTables;

class ClientController extends Controller
{


    public function clientList(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary edit_btn">Edit</a>

                        <button class="btn btn-danger delete_btn" data-id="' . $row->id . '">Delete</button>';
                    return  $btn;
                })
                ->addColumn('image', function ($row) {
                    $image = '<img src="/storage/images/' . $row->image . '"width="50" height="50">';

                    return $image;
                })
                // ->editColumn('address1', function ($user) {
                //     return $user->address1 . '<br>' . $user->city_name . '<br>' . $user->state_name . '<br>' . $user->pin_code;
                // })

                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        //$stud = Client::get();



        return view("client.clientList");
    }

    public function clientStore(Request $request)
    {

        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'gender' => 'required',
        //     'hobby' => 'required',
        //     'image' => 'required',
        // ]);



        Client::create([

            $photo = $request->file("image")->getClientOriginalName(),
            Storage::disk('public')->putFileAs('images', new File($request->file("image")), $photo),


            "name" => $request->name,
            "email" => $request->email,
            "gender" => $request->gender,
            "hobby" =>  @implode(",", $request->hobby),
            "image" => $photo,
        ]);
        //dd($photo);
        // return redirect()->route("ClientList", compact("validated"))->with('msg', "Client Inserted");

        return response()->json(["msg" => "data insert"]);
    }

    public function clientEdit(Request $request)
    {

        $stud = Client::find($request->id);
        //$tech = Staf::get();
        $hobby = explode(",", $stud->hobby);
        // return view("Client.ClientEdit", compact("stud", "tech"));
        return response()->json(["msg" => "data edit", "stud" => $stud, "hobby" => $hobby]);
    }

    public function clientUpdate(Request $request)
    {


        if ($request->image) {

            $photo = $request->file("image")->getClientOriginalName();
            Storage::disk('public')->putFileAs('images', new File($request->file("image")), $photo);
            Client::where('id', $request->id)->update([

                "image" => $photo,
            ]);
        }

        Client::where('id', $request->id)->update([

            "name" => $request->name,
            "email" => $request->email,
            "gender" => $request->gender,
            "hobby" =>  @implode(",", $request->hobby),

        ]);

        // return redirect()->route("ClientList")->with('msg', "Client Update");
        return response()->json(["msg" => "Client Update"]);
    }

    public function clientDelete(Request $request)
    {


        $stud = Client::find($request->id);
        if ($stud) {
            $stud->delete();
            return response()->json(["msg" => "data Delete"]);
        } else {
            return response()->json(["msg" => "Some error"]);
        }


        //return view("Client.ClientList", compact("stud"));
    }
}