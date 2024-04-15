<?php


use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\View\View;

 

class ChirpController extends Controller

{


    /**

     * Store a newly created resource in storage.

     */

    public function store(Request $request)


    {

        //

        $validated = $request->validate([

            'message' => 'required|string|max:255',

        ]);

 

        $request->user()->chirps()->create($validated);

 

        return redirect(route('chirps.index'));

    }

    public function index(): View

    {

        return view('chirps.index');

        return view('chirps.index', [

            'chirps' => Chirp::with('user')->latest()->get(),

        ]);

    }
    public function show(Chirp $chirp)

    {

        //

    }

 

    /**

     * Show the form for editing the specified resource.

     */

     public function edit(Chirp $chirp): View

    {

        Gate::authorize('update', $chirp);

 

        return view('chirps.edit', [

            'chirp' => $chirp,

        ]);

    }
 

    /**

     * Remove the specified resource from storage.

     */

     public function destroy(Chirp $chirp): RedirectResponse

    {

        Gate::authorize('delete', $chirp);

 

        $chirp->delete();

 

        return redirect(route('chirps.index'));

    }

    public function update(Request $request, Chirp $chirp): RedirectResponse
    {

        //

        Gate::authorize('update', $chirp);

 

        $validated = $request->validate([

            'message' => 'required|string|max:255',

        ]);

 

        $chirp->update($validated);

 

        return redirect(route('chirps.index'));

    }

 

}

