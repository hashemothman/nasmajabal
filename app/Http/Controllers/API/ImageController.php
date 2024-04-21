<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Models\Category;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Http\Requests\StoreImageRequest;

class ImageController extends Controller
{
    use APIResponseTrait,UploadImage;
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        try{
            $images = Image::query();
            if ($request->has('category')) {
                $category = Category::where('name', '=',$request->category)->first();
            //     // dd($category);
                if (!$category)
                    return $this->errorResponse('category not found');
                $images->where('category_id', '=',$category->id);
            }
            return $this->successResponse(ImageResource::collection($images->get())) ;
        } catch (\Throwable $th) {
            return $this->generalFailureResponse($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request): JsonResponse
    {
        try{
            $file_name  = $this->StoreImage($request->url, 'Images/Dashboard');
             Image::create([
                'url'      =>$file_name,
                'category_id'=>$request->category_id,
            ]);
            return $this->successOperationResponse('images stored successfully');

        } catch (\Throwable $th) {
            return $this->generalFailureResponse($th->getMessage());
        }
    }
}
