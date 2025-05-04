<?php

namespace App\Http\Controllers;

//use App\Services\AppleMusic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PodcastController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
//        protected AppleMusic $apple,
    )
    {
    }

    /**
     * Show information about the given podcast.
     */
    public function show(string $id): View
    {
        return view('podcasts.show', [
//            'podcast' => $this->apple->findPodcast($id)
        ]);
    }

    /**
     * Store a new podcast.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // Create podcast...

//        ProcessPodcast::dispatch($podcast);
    }
}
