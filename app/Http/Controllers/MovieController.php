<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreMovieRequest;
use App\Services\MovieService;

class MovieController extends Controller
{

    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        $movies = $this->movieService->getAll(request('search'));
        return view('homepage', compact('movies'));
    }

    public function detail($id)
    {
        $movie = $this->movieService->getById($id);
        return view('detail', compact('movie'));
    }

    public function store(StoreMovieRequest $request)
    {
        $this->movieService->store(
            $request->validated(),
            $request->file('foto_sampul')
        );

        return redirect('/')->with('success', 'Film berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $this->movieService->update(
            $id,
            $request->all(),
            $request->file('foto_sampul')
        );

        return redirect('/movies/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->movieService->delete($id);
        return redirect('/movies/data')->with('success', 'Data berhasil dihapus');
    }
}
