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

                        <div id="comments" style="margin-top: 10px;">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>操作失败</strong> 输入不符合要求<br><br>
                                    {!! implode('<br>', $errors->all()) !!}
                                </div>
                            @endif

                            <div class="conmments" style="margin-top: 50px;">
                                @foreach ($article->hasManyComments as $comment)
                                    <div class="one" style="border-top: solid 20px #efefef; padding: 5px 20px;">
                                        <div class="nickname" data="{{ $comment->nickname }}">
                                            @if ($comment->website)
                                                <a href="{{ $comment->website }}">
                                                    <h3>{{ $comment->nickname }}</h3>
                                                </a>
                                            @else
                                                <h3>{{ $comment->nickname }}</h3>
                                            @endif
                                            <h6>{{ $comment->created_at }}</h6>
                                        </div>
                                        <div class="content">
                                            <p style="padding: 20px;">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                        <div class="reply" style="text-align: right; padding: 5px;">
                                            <a href="#new" onclick="reply(this);">回复</a>
                                        </div>
                                    </div>

                                @endforeach
                            </div>

                            <div id="new">
                                <form action="{{ url('comment') }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">

                                    <div class="form-group">
                                        <label>Nickname</label>
                                        <input type="text" name="nickname" class="form-control" style="width: 300px;"
                                               required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" style="width: 300px;">
                                    </div>
                                    <div class="form-group">
                                        <label>Home page</label>
                                        <input type="text" name="website" class="form-control" style="width: 300px;">
                                    </div>
                                    <div class="form-group">
                                        <label>Content</label>
                                        <textarea name="content" id="newFormContent" class="form-control" rows="10"
                                                  required="required"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-success col-lg-12">Submit</button>
                                </form>
                            </div>

                            <script>
                                function reply(a) {
                                    var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
                                    var textArea = document.getElementById('newFormContent');
                                    textArea.innerHTML = '@' + nickname + ' ';
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection