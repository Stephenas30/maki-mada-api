<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Interfaces\ClientRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\ClientResource;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    
    private ClientRepositoryInterface $clientRepositoryInterface;
    
    public function __construct(ClientRepositoryInterface $clientRepositoryInterface)
    {
        $this->clientRepositoryInterface = $clientRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->clientRepositoryInterface->index();

        return ApiResponseClass::sendResponse(ClientResource::collection($data),'',200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        $details =[
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'email'=> $request->email,
            'numero' => $request->numero,
            'payement' => $request->payement,
            'devise' => $request->devise,
            'num_vol_d' => $request->num_vol_d,
            'num_vol_r' => $request->num_vol_r,
            'hotel' => $request->hotel,
            'assurance' => $request->assurance,
            'annulation' => $request->annulation,
            'boite' => $request->boite,
            'gps' => $request->gps,
            'rehausseur' => $request->rehausseur,
            'bebe' => $request->bebe,
            'date_depart' => $request->date_depart,
            'date_retour' => $request->date_retour,
            'lieu_depart' => $request->lieu_depart,
            'lieu_depart_detaille' => $request->lieu_depart_detaille,
            'lieu_retour' => $request->lieu_retour,
            'lieu_retour_detaille' => $request->lieu_retour_detaille
        ];
        DB::beginTransaction();
        try{
             $client = $this->clientRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new ClientResource($client),'Client Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($client_id)
    {
        $client = $this->clientRepositoryInterface->getById($client_id);

        return ApiResponseClass::sendResponse(new ClientResource($client),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, $client_id)
    {
        $updateDetails =[
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'email'=> $request->email,
            'numero' => $request->numero,
            'payement' => $request->payement,
            'devise' => $request->devise,
            'num_vol_d' => $request->num_vol_d,
            'num_vol_r' => $request->num_vol_r,
            'hotel' => $request->hotel,
            'assurance' => $request->assurance,
            'annulation' => $request->annulation,
            'boite' => $request->boite,
            'gps' => $request->gps,
            'rehausseur' => $request->rehausseur,
            'bebe' => $request->bebe,
            'date_depart' => $request->date_depart,
            'date_retour' => $request->date_retour,
            'lieu_depart' => $request->lieu_depart,
            'lieu_depart_detaille' => $request->lieu_depart_detaille,
            'lieu_retour' => $request->lieu_retour,
            'lieu_retour_detaille' => $request->lieu_retour_detaille
        ];
        DB::beginTransaction();
        try{
             $client = $this->clientRepositoryInterface->update($updateDetails,$client_id);

             DB::commit();
             return ApiResponseClass::sendResponse('Client Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($client_id)
    {
         $this->clientRepositoryInterface->delete($client_id);

        return ApiResponseClass::sendResponse('Client Delete Successful','',204);
    }
}