<?php

namespace App\Http\Controllers;
use App\Server;
use Laravel\Lumen\Http\Request;

class ServerController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'status'=> 'required',
            'url' => 'required',
            'userId' => 'required'
        ]);
        $server = Server::create($request->all());
        return response()->json($server,201);
    }

    public function fetch()
    {
        return response()->json(Server::all());
    }

    public function getOne($id)
    {
        return response()->json(Server::find($id));
    }

    public function update($id, Request $request)
    {
        $server = Server::findofFail($id);
    }

    public function delete($id){}
}
