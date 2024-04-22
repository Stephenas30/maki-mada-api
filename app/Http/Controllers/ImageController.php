<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Interfaces\ImageRepositoryInterface;
use App\Classes\ApiResponseClass;
use App\Http\Resources\ImageResource;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    
    private ImageRepositoryInterface $imageRepositoryInterface;
    
    public function __construct(ImageRepositoryInterface $imageRepositoryInterface)
    {
        $this->imageRepositoryInterface = $imageRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->imageRepositoryInterface->index();

        return ApiResponseClass::sendResponse(ImageResource::collection($data),'',200);
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
    public function store(StoreImageRequest $request)
    {       
        DB::beginTransaction();
        try {
            $images = [];
            foreach ($request->file('images') as $imageFile) {
                $symbolePath = $imageFile->store('public');
                $publicSymbolePath = str_replace('public/', 'storage/', $symbolePath);

                $details = [
                    'voiture_id' => $request->voiture_id,
                    'url' => $publicSymbolePath
                ];

                $image = $this->imageRepositoryInterface->store($details);
                $images[] = new ImageResource($image);
            }

            DB::commit();
            return ApiResponseClass::sendResponse($images, 'Images créées avec succès', 201);
        } catch (\Exception $ex) {
            DB::rollback();
            return ApiResponseClass::rollback($ex);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = $this->imageRepositoryInterface->getById($id);

        return ApiResponseClass::sendResponse(new ImageResource($image),'',200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImageRequest $request, $id)
    {
        $updateDetails =[
            'voiture_id' => $request->voiture_id,
            'url' => $request->url
        ];
        DB::beginTransaction();
        try{
             $image = $this->imageRepositoryInterface->update($updateDetails,$id);

             DB::commit();
             return ApiResponseClass::sendResponse('Image Update Successful','',201);

        }catch(\Exception $ex){
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_img)
    {
         $this->imageRepositoryInterface->delete($id_img);

        return ApiResponseClass::sendResponse('Image Delete Successful','',204);
    }
}