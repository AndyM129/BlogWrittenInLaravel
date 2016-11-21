@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Article List (Total {{ count($articles) }})
                        <a href="{{ url('admin/article/create') }}">[New Article]</a>
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {{ implode('<br>', $errors->all()) }}
                            </div>
                        @endif

                        @foreach($articles as $article)
                            <h4>
                                <a href="{{ url('/article/show/'.$article->id) }}">{{ $article->title }}</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <small>{{ $article->published_at }}</small>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ url('admin/article/edit/'.$article->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('admin/article/delete/'.$article->id) }}" class="btn btn-danger">Delete</a>
                            </h4>
                            <p>{{ $article->intro }}</p>
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection