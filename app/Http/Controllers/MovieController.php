<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MovieController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', ['movies' => $movies]);
    }

    public function list(Request $request)
    {
        $movies = Movie::all();
        /*return DataTables::of($movies)->addIndexColumn()->addColumn('action', function($row) {
            $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
            return $actionBtn;
        })->rawColumns(['action'])->make(true);*/
        return DataTables::make($movies)
            ->addColumn('action', function($row) {
                $actionBtn = '<a href="' . route('movies.edit', ['movie' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . route('movies.destroy', ['movie' => $row->id]) .'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->editColumn('thumbnail', function($row) {
                $img = $row->id;
                return $img;
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie($request->all());
        if ($request->has('thumbnail')) {
            $thumbnail = file_get_contents($request->file('thumbnail')->getPathname());
            $movie->thumbnail = $thumbnail;
            $movie->originalFileName = $request->file('thumbnail')->getClientOriginalName();
        }
        $movie->save();
        return redirect()->route('movies.index', ['movie' => $movie->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //dd($movie);
    }

    public function showImage(int $id)
    {
        $movie = Movie::find($id);
        return $movie->thumbnail;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->fill($request->except('thumbnail'));
        if ($request->has('thumbnail')) {
            $thumbnail = file_get_contents($request->file('thumbnail')->getPathname());
            $movie->thumbnail = $thumbnail;
            $movie->originalFileName = $request->file('thumbnail')->getClientOriginalName();
        }
        $movie->save();
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
