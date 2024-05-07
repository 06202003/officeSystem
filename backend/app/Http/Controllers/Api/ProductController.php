<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\MessagesController;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function getAll(Request $request)
    {
        $data = Product::with(['productTags' => function ($query) use ($request) {
            $query->select('guid', 'product_tag_name');
        }])
            ->with(['productUsers' => function ($query) {
                $query->select('guid', 'name');
            }]);

        if (!empty($request['product_tag_id'])) {
            $data = $data->whereHas("productTags", function ($query) use ($request) {
                $query->where('guid', $request['product_tag_id']);
            });
        }

        $data = $data->where('status', 'active');
        $data = $data->orderBy('created_at', 'desc');

        if (!empty($request['page']) && !empty($request['limit'])) {
            $data = $data->paginate($request['limit']);
            $data = $data->items();
        } else {
            $data = $data->get();
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getData($guid)
    {
        /// GET DATA
        $data = Product::with(['productTags' => function ($query) {
            $query->select('guid', 'product_tag_name');
        }])
            ->with(['productUsers' => function ($query) {
                $query->select('guid', 'name', 'email');
            }])
            ->where('guid', '=', $guid)
            ->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function getAllDataTable()
    {
        $data = Product::with(['productTags' => function ($query) {
            $query->select('guid', 'product_tag_name');
        }])
            ->with(['productUsers' => function ($query) {
                $query->select('guid', 'name');
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->make(true);

        return $dataTable;
    }

    public function insertData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'description' => 'required',
            'is_google_drive' => 'required|boolean',
            'link' => 'required',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        //PRODUCT TAGS
        $tags = json_decode("[]", true);
        $tag = null;
        if (!empty($request['product_tag'])) {
            foreach ($request['product_tag'] as $key => $value) {
                array_push($tags, $value);
            }

            $tag = ProductTag::find($tags);
            if (count($request['product_tag']) != count($tag)) {
                return ResponseController::getResponse(null, 400, "Invalid product tag parameter");
            }
        }

        //AUTHOR
        $authors = json_decode("[]", true);
        $author = null;
        if (!empty($request['author'])) {
            foreach ($request['author'] as $key => $value) {
                array_push($authors, $value);
            }

            $author = User::find($authors);
            if (count($request['author']) != count($author)) {
                return ResponseController::getResponse(null, 400, "Invalid author parameter");
            }
        }

        //MANAGE URL
        $previewLink = $request['link'];
        $downloadLink = $request['link'];
        if ($request['is_google_drive']) {
            $url = $request['link'];
            $path = parse_url($url, PHP_URL_PATH);
            $pathWithoutSlash = substr($path, 1);

            $googleId = explode("/", $pathWithoutSlash);

            if (count($googleId) >= 2) {
                $downloadLink = "https://drive.google.com/uc?id=" . $googleId[2] . "&export=download";
            }
        }



        //INSERT DATA
        $data = Product::create([
            'product_name' => $request['product_name'],
            'description' => $request['description'],
            'is_google_drive' => $request['is_google_drive'],
            'preview_link' => $previewLink,
            'download_link' => $downloadLink,
        ]);

        $data->productTags()->attach($tag);
        $data->productUsers()->attach($author);

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function updateData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guid' => 'required|string|max:36',
            'product_name' => 'required|string|max:255',
            'description' => 'required',
            'is_google_drive' => 'required|boolean',
            'link' => 'required',
            'status' => 'required|string|max:255',
        ], MessagesController::messages());

        if ($validator->fails()) {
            return ResponseController::getResponse(null, 422, $validator->errors()->first());
        }

        /// VALIDATE INPUT STATUS
        $checkStatus = false;
        if ($request['status'] == 'active' || $request['status'] == 'deleted') {
            $checkStatus = true;
        }

        if (!$checkStatus) {
            return ResponseController::getResponse(null, 400, "Invalid status parameter");
        }

        /// GET DATA
        $data = Product::where('guid', '=', $request['guid'])->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        //PRODUCT TAGS
        $tags = json_decode("[]", true);
        $tag = null;
        if (!empty($request['product_tag'])) {
            foreach ($request['product_tag'] as $key => $value) {
                array_push($tags, $value);
            }

            $tag = ProductTag::find($tags);
            if (count($request['product_tag']) != count($tag)) {
                return ResponseController::getResponse(null, 400, "Invalid product tag parameter");
            }
        }

        //MANAGE URL
        $previewLink = $request['link'];
        $downloadLink = $request['link'];
        if ($request['is_google_drive']) {
            $url = $request['link'];
            $path = parse_url($url, PHP_URL_PATH);
            $pathWithoutSlash = substr($path, 1);

            $googleId = explode("/", $pathWithoutSlash);

            if (count($googleId) >= 2) {
                $downloadLink = "https://drive.google.com/uc?id=" . $googleId[2] . "&export=download";
            }
        }

        //AUTHOR
        $authors = json_decode("[]", true);
        $author = null;
        if (!empty($request['author'])) {
            foreach ($request['author'] as $key => $value) {
                array_push($authors, $value);
            }

            $author = User::find($authors);
            if (count($request['author']) != count($author)) {
                return ResponseController::getResponse(null, 400, "Invalid author parameter");
            }
        }

        /// UPDATE DATA
        $data->product_name = $request['product_name'];
        $data->description = $request['description'];
        $data->is_google_drive = $request['is_google_drive'];
        $data->preview_link = $previewLink;
        $data->download_link = $downloadLink;
        $data->status = $request['status'];

        $data->productTags()->sync($tag);
        $data->productUsers()->sync($author);

        $data->save();

        return ResponseController::getResponse($data, 200, 'Success');
    }

    public function deleteData($guid)
    {
        /// GET DATA
        $data = Product::where('guid', '=', $guid)->first();

        if (!isset($data)) {
            return ResponseController::getResponse(null, 400, "Data not found");
        }

        $data->productTags()->detach();
        $data->productUsers()->detach();

        $data->delete();

        return ResponseController::getResponse(null, 200, 'Success');
    }
}
