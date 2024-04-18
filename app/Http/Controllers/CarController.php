<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Interfaces\CarRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\CarResource;
use Illuminate\Support\Facades\DB;
class CarController extends Controller
{
    
    private CarRepositoryInterface $carRepositoryInterface;
    
    public function __construct(CarRepositoryInterface $carRepositoryInterface)
    {
        $this->carRepositoryInterface = $carRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->carRepositoryInterface->index();

        return ApiResponseClass::sendResponse(CarResource::collection($data),'',200);
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
    public function store(StoreCarRequest $request)
    {
        // Enregistre l'image dans le dossier de stockage (storage/app/public)
        $imagePath = $request->file('symbole')->store('public');

        // Obtient le chemin de stockage public de l'image
        $publicImagePath = str_replace('public/', 'storage/', $imagePath);

        $details =[
            'nom_voiture' => $request->nom_voiture,
            'boite' => $request->boite,
            'puissance' => $request->puissance,
            'tarif' => $request->tarif,
            'frais_livraison' => $request->frais_livraison,
            'place' => $request->place,
            'coffre' => $request->coffre,
            'porte' => $request->porte,
            'clim' => $request->clim,
            'radio' => $request->radio,
            'gps' => $request->gps,
            'rehausseur' => $request->rehausseur,
            'bebe' => $request->bebe,
            'traction' => $request->traction,
            'decapotable' => $request->decapotable,
            'utilitaire' => $request->utilitaire,
            'dispo' => $request->dispo,
            'lieu_dispo' => $request->lieu_dispo,
            'motorisation' => $request->motorisation,
            'symbole' => $publicImagePath
        ];
        DB::beginTransaction();
        try{
             $car = $this->carRepositoryInterface->store($details);

             DB::commit();
             return ApiResponseClass::sendResponse(new CarResource($car),'Car Create Successful',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($voiture_id)
    {
        $car = $this->carRepositoryInterface->getById($voiture_id);

        return ApiResponseClass::sendResponse(new CarResource($car),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, $voiture_id)
    {
        $updateDetails =[
            'nom_voiture' => $request->nom_voiture,
            'boite' => $request->boite,
            'puissance' => $request->puissance,
            'tarif' => $request->tarif,
            'frais_livraison' => $request->frais_livraison,
            'place' => $request->place,
            'coffre' => $request->coffre,
            'porte' => $request->porte,
            'clim' => $request->clim,
            'radio' => $request->radio,
            'gps' => $request->gps,
            'rehausseur' => $request->rehausseur,
            'bebe' => $request->bebe,
            'traction' => $request->traction,
            'decapotable' => $request->decapotable,
            'utilitaire' => $request->utilitaire,
            'dispo' => $request->dispo,
            'lieu_dispo' => $request->lieu_dispo,
            'motorisation' => $request->motorisation,
            'symbole' => $request->symbole
        ];
        DB::beginTransaction();
        try{
             $car = $this->carRepositoryInterface->update($updateDetails,$voiture_id);

             DB::commit();
             return ApiResponseClass::sendResponse('Car Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($voiture_id)
    {
         $this->carRepositoryInterface->delete($voiture_id);

        return ApiResponseClass::sendResponse('Car Delete Successful','',204);
    }
}