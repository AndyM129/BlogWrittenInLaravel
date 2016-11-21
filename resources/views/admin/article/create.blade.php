@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Article</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Create Error</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/article/store') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="title" class="form-control" required="required" placeholder="Title">
                            <br>
                            <input type="text" name="intro" class="form-control" required="required" placeholder="Intro">
                            <br>
                            <textarea name="content" rows="10" class="form-control" required="required" placeholder="Content"></textarea>
                            <br>
                            <button class="btn btn-lg btn-info">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection