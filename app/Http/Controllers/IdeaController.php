<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View as ViewView;

class IdeaController extends Controller
{

    private $rules = [
        'title' => 'required|string|max:100',
        'description' => 'required|string|max:300',
    ];
    
    private array $errorMessages = [
        'title.required' => 'El campo título es obligatorio.',
        'title.string' => 'El campo título debe ser de tipo texto.',
        'title.max' => 'El campo título no debe ser mayor a 100 caracteres.',
    
        'description.required' => 'El campo descripción es obligatorio.',
        'description.string' => 'El campo descripción debe ser de tipo texto.',
        'description.max' => 'El campo descripción no debe ser mayor a 300 caracteres.',
    ];

    public function index(Request $request): View
    {
        $ideas = Idea::myIdeas($request->filtro)->theBest($request->filtro)->get();
        return view('ideas.index',['ideas' => $ideas]);
    }

    public function create(): View
    {
        return view('ideas.create_or_edit');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules, $this->errorMessages);

        Idea::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        session()->flash('message','Idea creada correctamente!');

        return redirect()->route('idea.index');

    }
    
    public function edit(Idea $idea): View
    {
        $this->authorize('update', $idea);
        return view('ideas.create_or_edit')->with('idea', $idea);
    }

    public function update(Request $request, Idea $idea): RedirectResponse
    {
        $this->authorize('update', $idea);

        $validated = $request->validate($this->rules, $this->errorMessages);

        $idea->update($validated);

        session()->flash('message','Idea editada correctamente!');

        return redirect(route('idea.index'));
    }

    public function show(Idea $idea): View
    {
        return view('ideas.show')->with('idea', $idea);
    }

    public function delete(Idea $idea): RedirectResponse
    {
        $this->authorize('delete', $idea);

        $idea->delete();

        session()->flash('message','Idea eliminada correctamente!');

        return redirect()->route('idea.index');
    }

    public function synchronizeLike(Request $request, Idea $idea): RedirectResponse
    {
        $this->authorize('updateLikes', $idea);

        $request->user()->ideasLiked()->toggle([$idea->id]);

        $idea->update(['likes' => $idea->users()->count()]);

        return redirect()->route('idea.show', $idea);
    }

    public function bestIdeaUser(Request $request) : View
    {
        $user = $request->user();
        $bestIdea = $user->ideas()->orderBy('likes', 'desc')->first();
        return view('dashboard', compact('bestIdea'));
    }

}
