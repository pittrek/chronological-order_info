<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Tvshow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('episodes.index', ['episodes' => Episode::all()]);
    }

    public function list(Request $request): JsonResponse
    {
        $episodes = Episode::all();
        return DataTables::make($episodes)
            ->addColumn('action', function(Episode $row) {
                return '<a href="' . route('episodes.edit', ['episode' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . route('episodes.destroy', ['episode' => $row->id]) .'" class="delete btn btn-danger btn-sm">Delete</a>';
            })
            ->addColumn('tvshow', function(Episode $row) {
                return $row->season->tv->name . ' (' . $row->season->tv->acronym . ') ';
            })
            ->editColumn('season', function (Episode $row) {
                return $row->season->name;
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('episodes.create', ['seasons' => Season::all(), 'tvshows' => Tvshow::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $episode = new Episode($request->all());
        $episode->save();
        return redirect()->route('episodes.index', ['episodes' => Episode::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Episode $episode)
    {
        return view('episodes.edit', ['seasons' => Season::all(), 'episode' => $episode]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Episode $episode)
    {
        $episode->fill($request->except('thumbnail'));
        if ($request->has('thumbnail')) {
            $thumbnail = file_get_contents($request->file('thumbnail')->getPathname());
            $episode->thumbnail = $thumbnail;
            $episode->originalFileName = $request->file('thumbnail')->getClientOriginalName();
        }
        $episode->save();
        return redirect()->route('episodes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Episode $episode)
    {
        //
    }
}
