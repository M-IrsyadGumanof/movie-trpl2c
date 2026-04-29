<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreMovieRequest;

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

    //  DETAIL
    public function detail($id)
    {
        $movie = $this->movieService->getById($id);
        return view('detail', compact('movie'));
    }

    //  FORM CREATE
    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    //  STORE
    public function store(StoreMovieRequest $request)
    {
        $this->movieService->store(
            $request->validated(),
            $request->file('foto_sampul')
        );

        return redirect('/')->with('success', 'Film berhasil ditambahkan.');
    }

    //  DATA MOVIES
    public function data()
    {
        $movies = $this->movieService->getAll();
        return view('data-movies', compact('movies'));
    }

    //  FORM EDIT
    public function form_edit($id)
    {
        $movie = $this->movieService->getById($id);
        $categories = Category::all();

        return view('form-edit', compact('movie', 'categories'));
    }

    //  UPDATE
    public function update(Request $request, $id)
    {
        $this->movieService->update(
            $id,
            $request->all(),
            $request->file('foto_sampul')
        );

        return redirect('/movies/data')->with('success', 'Data berhasil diperbarui');
    }

    // DELETE
    public function delete($id)
    {
        $this->movieService->delete($id);

        return redirect('/movies/data')->with('success', 'Data berhasil dihapus');
    }
}

