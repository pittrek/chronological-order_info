<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Tvshow;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $seasons = Season::all();
        return view('seasons.index', ['seasons' => $seasons]);
    }

    public function list(Request $request): JsonResponse
    {
        $seasons = Season::all();
        return DataTables::make($seasons)
            ->addColumn('action', function($row) {
                $actionBtn = '<a href="' . route('seasons.edit', ['season' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="' . route('seasons.destroy', ['season' => $row->id]) .'" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->editColumn('tvshow', function($row) {
                return $row->tv->name . ' (' . $row->tv->acronym . ') ';
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('seasons.create', ['tvshows' => Tvshow::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $season = new Season($request->all());
        $season->save();
        return redirect()->route('seasons.index', ['season' => $season->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Season $season)
    {
        return view('seasons.edit', ['season' => $season, 'tvshows' => Tvshow::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Season $season)
    {
        $season->fill($request->all());
        $season->save();
        return redirect()->route('seasons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Season $season)
    {
        //
    }
}
