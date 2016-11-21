@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Article Details</div>
                    <div class="panel-body">
                        <center>
                            <h2>{{ $article->title }}</h2>
                            <p>{{ $article->published_at }}</p>
                            <hr/>
                        </center>
                        <p>{{ $article->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection