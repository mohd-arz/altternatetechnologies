<?php

namespace App\Http\Controllers\Clients;

use App\Actions\Admin\Clients\CreateClientsAction;
use App\Actions\Admin\Clients\EditClientsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\CreateClientsRequest;
use App\Http\Requests\Clients\EditClientsRequest;
use App\Http\Requests\Clients\Type\CreateTypeRequest;
use App\Http\Requests\Clients\Type\EditTypeRequest;
use App\Models\Clients;
use App\Models\ClientType;
use Exception;
use Illuminate\Http\Request;
use Throwable;

class ClientsController extends Controller
{
    public function clients(){
        $clients = Clients::with('getType')->get();
        return view('admin.clients.index',[
            'clients' => $clients,
        ]);
    }
    public function clientsCreate(){
        $types = ClientType::get();
        return view('admin.clients.create',[
            'types' => $types,
        ]);
    }
    public function clientsStore(CreateClientsRequest $request,CreateClientsAction $action){
        $response = $action->execute(collect($request->validated()));
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Client has been created successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to create Client.']);
    }
    public function clientsEdit(Clients $client){
        $types = ClientType::get();
        return view('admin.clients.edit',[
            'client' => $client,
            'types' => $types,
        ]);
    }
    public function clientsUpdate(Clients $client,EditClientsRequest $request,EditClientsAction $action){
        $response = $action->execute(collect($request->validated()),$client);
        if ($response) {
            return response()->json(['status' => true, 'message' => 'Client has been edited successfully.']);
        }
        return response()->json(['status' => false, 'error' => 'Failed to edit Client.']);
    }
    public function clientsDelete(Clients $client){
        try{
            $client->delete();
            return response()->json(['status' => true, 'message' => 'Client has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }

    public function type(){
        $types = ClientType::get();
        return view('admin.clients.type.index',[
            'types' => $types,
        ]);
    }
    public function typeCreate(){
        return view('admin.clients.type.create');
    }
    public function typeStore(CreateTypeRequest $request){
        try{
            $type = new ClientType();
            $type->title = $request->title;
            $type->save();
            return response()->json(['status' => true, 'message' => 'Type has been created successfully.']);
        }catch(Throwable $th){
            info($th);
            return response()->json(['status' => false, 'error' => 'Failed to create Type.']);
        }
    }
    public function typeEdit(ClientType $type){
        return view('admin.clients.type.edit',[
            'type' => $type,
        ]);
    }
    public function typeUpdate(ClientType $type,EditTypeRequest $request){
        try{;
            $type->title = $request->title;
            $type->save();
            return response()->json(['status' => true, 'message' => 'Type has been edited successfully.']);
        }catch(Throwable $th){
            info($th);
            return response()->json(['status' => false, 'error' => 'Failed to edit Type.']);
        }
    }
    public function typeDelete(ClientType $type){
        try{
            $type->delete();
            return response()->json(['status' => true, 'message' => 'Type has been deleted successfully']);
        }catch(Exception $e){
            return response()->json(['status' => false, 'error' => 'Failed to delete']);
        }
    }
}
