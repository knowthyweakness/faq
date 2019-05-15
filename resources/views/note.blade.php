@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Note</div>

                    <div class="card-body">

                        {{$note->body}}
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary float-right"
                           href="{{ route('notes.edit',['id'=> $note->id])}}">
                            Edit Note
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['notes.destroy', $note->id]])}}
                        <button class="btn btn-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><a class="btn btn-primary float-left"
                                                href="{{ route('answers.create', ['note_id'=> $note->id])}}">
                            Write a Note
                        </a></div>

                    <div class="card-body">
                        @forelse($note->answers as $answer)
                            <div class="card">
                                <div class="card-body">{{$answer->body}}</div>
                                <div class="card-footer">

                                    <a class="btn btn-primary float-right"
                                       href="{{ route('answers.show', ['note_id'=> $note->id,'answer_id' => $answer->id]) }}">
                                        View
                                    </a>

                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Notes</div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
@endsection