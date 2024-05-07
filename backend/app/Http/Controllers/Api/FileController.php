<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MessagesController;
use App\Models\File;
use Carbon\Carbon;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function uploadImage(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
            'type' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        // UPLOAD IMAGE
        $image = $request->file('image');
        $url = cloudinary()->upload(
            $image->getRealPath(),
            [
                'folder' => $request->get('type'),
            ]
        )->getSecurePath();

        /// INSERT DATA TO DB
        $data = File::create([
            'type' => $request->get('type'),
            'url' => $url,
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }
    public function deleteImage(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'url' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }
        $data = File::where('url', '=', $request->get('url'))->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->delete();

        $urlParts = explode('/', $request->get('url'));
        $publicIdWithExtension = explode('.', end($urlParts));
        $publicId = $publicIdWithExtension[0];
        Cloudinary::destroy($request->get('type') . '/' . $publicId);
        return ResponseController::getResponse(null, 200, 'Success');
    }
    public function uploadFile(Request $request): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required',
            'type' => 'required|string',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        // UPLOAD FILE
        $path = 'public/files/' . $request->get('type');
        $pathUrl = 'files/' . $request->get('type');
        // if ($request->get('type') === 'attendance') {
        $path = 'public/files/' . $request->get('type') . '/' . Carbon::now()->format('Y-m-d');
        $pathUrl = 'files/' . $request->get('type') . '/' . Carbon::now()->format('Y-m-d');
        // }
        $image = $request->file('file');
        $name = $image->hashName();
        $image->storeAs($path, $name); // => storage/app/$path/file.img
        $url = URL::asset('storage/' . $pathUrl . '/' . $name); // => http://example.com/storage/file.img

        /// INSERT DATA TO DB
        $data = File::create([
            'type' => $request->get('type'),
            'url' => $url,
        ]);

        return ResponseController::getResponse($data, 200, 'Success');
    }
}
