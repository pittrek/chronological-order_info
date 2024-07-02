<?php

namespace App\Http\Controllers;

use App\Models\Tvshow;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TvshowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tvShows = Tvshow::all();
        return view('tvshows.index', ['tvshows' => $tvShows]);
    }

    public function list(Request $request)
    {
        $tvShows = Tvshow::all();
        return DataTables::make($tvShows)
            ->addColumn('action', function($row) {
                $actionBtn = '<a href="' . route('tvshows.edit', ['tvshow' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . route('tvshows.destroy', ['tvshow' => $row->id]) .'" class="delete btn btn-danger btn-sm">Delete</a>';
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
        return view('tvshows.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tvshow = new Tvshow($request->all());
        if ($request->has('thumbnail')) {
            $thumbnail = file_get_contents($request->file('thumbnail')->getPathname());
            $tvshow->thumbnail = $thumbnail;
            $tvshow->originalFileName = $request->file('thumbnail')->getClientOriginalName();
        }
        $tvshow->save();
        return redirect()->route('tvshows.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tvshow $tvshow)
    {
        //
    }

    public function showImage(int $id)
    {
        $tvshow = Tvshow::find($id);
        return $tvshow->thumbnail;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tvshow $tvshow)
    {
        return view('tvshows.edit', ['tvshow' => $tvshow]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tvshow $tvshow)
    {
        $tvshow->fill($request->except('thumbnail'));
        if ($request->has('thumbnail')) {
            $thumbnail = file_get_contents($request->file('thumbnail')->getPathname());
            $tvshow->thumbnail = $thumbnail;
            $tvshow->originalFileName = $request->file('thumbnail')->getClientOriginalName();
        }
        $tvshow->save();
        return redirect()->route('tvshows.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tvshow $tvshow)
    {
        //
    }
}
