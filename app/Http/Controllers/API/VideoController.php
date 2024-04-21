<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Traits\UploadVideo;
use App\Traits\APIResponseTrait;

class VideoController extends Controller
{
    use UploadVideo , APIResponseTrait;
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
            $videos = Video::paginate(7);
            if ($request->has('category_id')) {
                $videos = Video::where('category_id', '=', $request->category_id)->paginate(7);
            }
            return $this->successResponse( VideoResource::collection($videos)) ;
        } catch (\Throwable $th) {
            return $this->generalFailureResponse($th->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideoRequest $request)
    {
        try{
            $file_name  = $this->StoreVideo($request->video, 'Videos/Dashboard');
            $video = Video::create([
                'video'      =>$file_name,
                'category_id'=>$request->category_id,
            ]);
            return  $this->successOperationResponse('video stored successfully ');

        } catch (\Throwable $th) {
            return $this->generalFailureResponse($th->getMessage());
        }
    }
}
