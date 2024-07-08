<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Franchise;
use App\Models\Movie;
use App\Models\Story;
use App\Models\Tvshow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stories.index', ['stories' => Story::all()]);
    }

    public function list(Request $request): JsonResponse
    {
        $stories = Story::all();
        return DataTables::make($stories)
            ->addColumn('season', function (Story $story) {
                return $story->episode ? $story->episode->season->name : '';
            })
            ->addColumn('number', function (Story $story) {
                return $story->episode ? $story->episode->number : '';
            })
            ->addColumn('name', function (Story $story) {
                return $story->episode ? $story->episode->name : '';
            })
            ->addColumn('tvshow', function (Story $story) {
                return $story->episode ? $story->episode->season->tv->name . ' (' . $story->episode->season->tv->acronym . ')' : '';
            })
            ->addColumn('movie', function (Story $story) {
                return $story->movie ? $story->movie->name : '';
            })
            ->addColumn('action', function(Story $row) {
                return '<a href="' . route('stories.edit', ['story' => $row->id]) . '" class="edit btn btn-success btn-sm switcher" data-rowId="' . $row->id .'" >Edit</a> <a href="' . route('stories.destroy', ['story' => $row->id]) .'" class="delete btn btn-danger btn-sm">Delete</a>';
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stories.create', ['episodes' => Episode::all(), 'movies' => Movie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $story = new Story($request->all());
        $story->franchise_id = 1;
        $story->save();
        return redirect()->route('stories.index', ['stories' => Story::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Story $story)
    {
        //
    }

    public function listFranchise(Franchise $franchise)
    {
        $stories = Story::where(['franchise_id' => $franchise->id])->orderBy('orderNum', 'asc')->get();
        return view('stories.listFranchises')->with('stories', $stories);

    }
}
