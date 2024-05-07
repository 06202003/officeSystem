<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Http;

class ProjectManagementController extends Controller
{
    public function index()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $projectAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project/datatable');

        $projectCategoryAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project-category/datatable');

        $boardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/board/datatable');

        $catalogAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/catalog/datatable');

        $cardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/card/datatable');

        $checklistAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist/datatable');

        $checklistItemAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist-item/datatable');

        $dataProject = $projectAPI->json();
        $dataBoard = $boardAPI->json();
        $dataProjectCategory = $projectCategoryAPI->json();
        $dataCatalog = $catalogAPI->json();
        $dataCard = $cardAPI->json();
        $datachecklist = $checklistAPI->json();
        $datachecklistItem = $checklistItemAPI->json();

        return view('dashboard.project.index', compact('token', 'dataCatalog', 'dataCard', 'dataProject', 'dataProjectCategory', 'datachecklist', 'dataBoard', 'datachecklistItem','session'));
    }

    public function project()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $projectAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project/datatable');

        $projectCategoryAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project-category/datatable');

        $boardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/board/datatable');

        $catalogAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/catalog/datatable');

        $cardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/card/datatable');

        $checklistAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist/datatable');

        $dataProject = $projectAPI->json();
        $dataBoard = $boardAPI->json();
        $dataProjectCategory = $projectCategoryAPI->json();
        $dataCatalog = $catalogAPI->json();
        $dataCard = $cardAPI->json();
        $datachecklist = $checklistAPI->json();

        return view('dashboard.project.project', compact('token', 'dataCatalog', 'dataCard', 'dataProject', 'dataProjectCategory', 'datachecklist', 'dataBoard', 'session'));
    }

    public function loadProject($project_guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $projectAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project/datatable');

        $projectCategoryAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project-category/datatable');

        $boardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/board/datatable');

        $catalogAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/catalog/datatable');

        $cardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/card/datatable');

        $checklistAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist/datatable');

        $dataProject = $projectAPI->json();
        $dataBoard = $boardAPI->json();
        $dataProjectCategory = $projectCategoryAPI->json();
        $dataCatalog = $catalogAPI->json();
        $dataCard = $cardAPI->json();
        $datachecklist = $checklistAPI->json();

        return view('dashboard.project.test', compact('token', 'dataCatalog', 'dataCard', 'dataProject', 'dataProjectCategory', 'datachecklist', 'dataBoard', 'session'));
    }

    public function board()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $projectAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project/datatable');

        $projectCategoryAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project-category/datatable');

        $boardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/board/datatable');

        $catalogAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/catalog/datatable');

        $cardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/card/datatable');

        $checklistAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist/datatable');

        $dataProject = $projectAPI->json();
        $dataBoard = $boardAPI->json();
        $dataProjectCategory = $projectCategoryAPI->json();
        $dataCatalog = $catalogAPI->json();
        $dataCard = $cardAPI->json();
        $datachecklist = $checklistAPI->json();

        return view('dashboard.project.board', compact('token', 'dataCatalog', 'dataCard', 'dataProject', 'dataProjectCategory', 'datachecklist', 'dataBoard', 'session'));
    }

    public function boardTest()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $projectAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project/datatable');

        $projectCategoryAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project-category/datatable');

        $boardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/board/datatable');

        $catalogAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/catalog/datatable');

        $cardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/card/datatable');

        $checklistAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist/datatable');

        $dataProject = $projectAPI->json();
        $dataBoard = $boardAPI->json();
        $dataProjectCategory = $projectCategoryAPI->json();
        $dataCatalog = $catalogAPI->json();
        $dataCard = $cardAPI->json();
        $datachecklist = $checklistAPI->json();

        return view('dashboard.project.test', compact('token', 'dataCatalog', 'dataCard', 'dataProject', 'dataProjectCategory', 'datachecklist', 'dataBoard', 'session'));
    }
    
    public function card()
    {
        $session = new Session();
        $token = $session->get('access_token');

        $projectAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project/datatable');

        $projectCategoryAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project-category/datatable');

        $boardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/board/datatable');

        $catalogAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/catalog/datatable');

        $cardAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/card/datatable');

        $checklistAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist/datatable');

        $checklistItemAPI = Http::withHeaders([
            'Authorization' => "Bearer " . $token
        ])->get(env("URL_API", "http://example.com") . '/api/v1/checklist-item/datatable');

        $dataProject = $projectAPI->json();
        $dataBoard = $boardAPI->json();
        $dataProjectCategory = $projectCategoryAPI->json();
        $dataCatalog = $catalogAPI->json();
        $dataCard = $cardAPI->json();
        $datachecklist = $checklistAPI->json();
        $dataChecklistItem = $checklistItemAPI->json();

        return view('dashboard.project.card', compact('token', 'dataCatalog', 'dataCard', 'dataProject', 'dataProjectCategory', 'datachecklist', 'dataBoard', 'dataChecklistItem','session'));
    }

    public function indexInsert()
    {
        $session = new Session();
        $token = $session->get('access_token');

        return view('dashboard.project.index', compact('token', 'session'));
    }

    public function indexEdit($guid)
    {
        $session = new Session();
        $token = $session->get('access_token');

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $token,
            'Content-Type' => "application/json"
        ])->get(env("URL_API", "http://example.com") . '/api/v1/project');

        $data = json_decode($response, true);
        $project_category = $data['data']['project_category']["category_name"];

        return view('dashboard.project.index', compact('token', 'data', 'project_category', 'session'));
    }
}
