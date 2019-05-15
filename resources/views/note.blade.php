@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Note</div>
                    <div class="card-body">
                        {{$note->body}}
                    </div>
                    <div class="card-footer">
                        {{ Form::open(['method'  => 'DELETE', 'route' => ['notes.destroy', $question, $note->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                        <a class="btn btn-primary float-right" href="{{ route('notes.edit',['question_id'=> $question, 'note_id'=> $note->id, ])}}">
                            Edit Note
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection