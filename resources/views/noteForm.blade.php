@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-body">
                    @if($edit === FALSE)
                        {!! Form::model($note, ['route' => ['notes.store', $question], 'method' => 'post']) !!}

                    @else()
                        {!! Form::model($note, ['route' => ['notes.update', $question, $note], 'method' => 'patch']) !!}
                    @endif
                    <div class="form-group">
                        {!! Form::label('body', 'Body') !!}
                        {!! Form::text('body', $note->body, ['class' => 'form-control','required' => 'required']) !!}
                    </div>
                    <button class="btn btn-success float-right" value="submit" type="submit" id="submit">Save
                    </button>
                    {!! Form::close() !!}
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection