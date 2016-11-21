@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Comments List (Total {{ count($comments) }})
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {{ implode('<br>', $errors->all()) }}
                            </div>
                        @endif

                        @foreach($comments as $comment)
                            <h4>
                                {{ $comment->content }}
                                <br/>
                                <br/>
                                <small>
                                    <a title="点击前往" href="http://{{ $comment->website }}">{{ $comment->nickname }}</a>
                                    -
                                    <a title="发送邮件" href="mailto:{{ $comment->email }}">{{ $comment->email }}</a>
                                </small>
                                <br/><br/>
                                <a href="{{ url('admin/comment/delete/'.$comment->id) }}" class="btn btn-danger">Delete</a>
                            </h4>
                            <hr/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection