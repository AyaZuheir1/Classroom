<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TopicController extends Controller
{

    public function index(Request $request): Renderable
    {

        $topics = Topic::orderBy('Created_at', 'DESC')->get(); // return collection of topic

        $success = session('success');

        return view('topics.index', compact('topics', 'success'));
    }
    public function create()
    {
        return view('topics.create');
    }


    public function store(Request $request): RedirectResponse
    {

        $topics = Topic::create($request->all());



        return redirect()->route('topics.index');
    }
    public function show($id)
    {
        $topic = Topic::findOrFail($id);

        return view('topics.show')
            ->with([
                'topic' => $topic,
            ]);
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.edit', [
            'topic' => $topic
        ]);
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        $topic->update($request->all());

        return Redirect::route('topics.index')
            ->with('success', 'topic updated');
    }

    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
        $topic->destroy($id);


        return redirect(route('topics.index'))
            ->with('success', 'Topic deleted');
    }
}
