<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocalRequest;
use App\Http\Requests\UpdateLocalRequest;
use App\Services\LocalService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class LocalController extends Controller
{
    private $localService;

    public function __construct(LocalService $localService)
    {
        $this->localService = $localService;
    }

    public function index(Request $request)
    {
        $name = $request->query('name');

        if ($name) {
            $results = $this->localService->filterByName($name);

            if ($results->isEmpty()) {
                return response()->json([
                    'message' => 'Nenhum local encontrado com esse nome.'
                ], 404);
            }

            return response()->json($results);
        }

        $locals = $this->localService->listAll();

        if ($locals->isEmpty()) {
            return response()->json([
                'message' => 'Nenhum local cadastrado.'
            ], 404);
        }

        return response()->json($locals);
    }


    public function store(StoreLocalRequest $request)
    {

        $data = $request->validated();

        $local = $this->localService->create($data);
        return response()->json($local, 201);
    }

    public function show($id)
    {
        $local = $this->localService->findById($id);

        if (!$local) {
            return response()->json(['message' =>'Nenhum local encontrado.'], 404);
        }
        return response()->json($local);
    }

    public function update(UpdateLocalRequest $request, $id)
    {
        $data = $request->validated();

        $local = $this->localService->findById($id);

        if (!$local) {
            return response()->json(['message' => 'Local não encontrado.'], 404);
        }

        $updatedLocal = $this->localService->update($id, $data);

        return response()->json($updatedLocal);
    }



    public function destroy($id)
    {
        $this->localService->delete($id);
        return response()->json(null, 204);
    }
}
