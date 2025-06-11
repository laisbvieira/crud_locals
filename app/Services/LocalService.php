<?php

namespace App\Services;

use App\Models\Local;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LocalService
{
    public function listAll()
    {
        return Local::all();
    }

    public function create(array $data)
    {
        return Local::create($data);
    }

    public function findById(int $id)
    {
        return Local::find($id);
    }

    public function update(int $id, array $data)
    {
        $local = $this->findById($id);
        $local->update($data);
        return $local;
    }

    public function delete(int $id)
    {
        $local = $this->findById($id);
        $local->delete();
    }

    public function filterByName(string $name) {
        return Local::whereRaw(
            "unaccent(lower(name)) LIKE unaccent(lower(?))",
            ["%$name%"]
        )->get();
    }

    public function findBySlug(string $slug) {
        return Local::whereRaw(
            "unaccent(lower(slug)) LIKE unaccent(lower(?))",
            ["%$slug%"]
        )->get();
    }

}
