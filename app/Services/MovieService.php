<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MovieService
{
    protected $movieRepo;

    public function __construct(MovieRepositoryInterface $movieRepo)
    {
        $this->movieRepo = $movieRepo;
    }

    public function getAll($search = null)
    {
        return $this->movieRepo->getAll($search);
    }

    public function getById($id)
    {
        return $this->movieRepo->find($id);
    }

    public function store($data, $file = null)
    {
        if ($file) {
            $data['foto_sampul'] = $file->store('movie_covers', 'public');
        }

        return $this->movieRepo->store($data);
    }

    public function update($id, $data, $file = null)
    {
        $movie = $this->movieRepo->find($id);

        if ($file) {
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            if (File::exists(public_path('images/' . $movie->foto_sampul))) {
                File::delete(public_path('images/' . $movie->foto_sampul));
            }

            $data['foto_sampul'] = $fileName;
        }

        return $this->movieRepo->update($id, $data);
    }

    public function delete($id)
    {
        $movie = $this->movieRepo->find($id);

        if (File::exists(public_path('images/' . $movie->foto_sampul))) {
            File::delete(public_path('images/' . $movie->foto_sampul));
        }

        return $this->movieRepo->delete($id);
    }
}
