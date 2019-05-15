<?php

namespace App\Http\Controllers;


use App\Note;
use App\Question;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($question)
    {
        $note = new Answer;
        $edit = FALSE;
        return view('noteForm', ['note' => $note,'edit' => $edit, 'question' =>$question  ]);
    }

    public function store(Request $request, $question)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $input = request()->all();
        $question = Question::find($question);
        $Note = new Note($input);
        $Note->user()->associate(Auth::user());
        $Note->question()->associate($question);
        $Note->save();
        return redirect()->route('questions.show',['question_id' => $question->id])->with('message', 'Saved');
    }

    public function show($question,  $note)
    {
        $note = Note::find($note);
        return view('note')->with(['note' => $note, 'question' => $question]);
    }
    public function edit($question,  $note)
    {
        $note = Answer::find($note);
        $edit = TRUE;
        return view('noteForm', ['note' => $note, 'edit' => $edit, 'question'=>$question ]);
    }
    public function update(Request $request, $question, $note)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);

        $note = Note::find($note);
        $note->body = $request->body;
        $note->save();
        return redirect()->route('notes.show',['question_id' => $question, 'note_id' => $note])->with('message', 'Updated');
    }

    public function destroy($question, $note)
    {
        $note = Note::find($note);
        $note->delete();
        return redirect()->route('questions.show',['question_id' => $question])->with('message', 'Delete');
    }
}