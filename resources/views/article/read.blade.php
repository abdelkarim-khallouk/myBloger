@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Article title: <b>{{ $article->title }}</b></div>

                <div class="panel-body">
                    <p>
                        {{ $article->article_body }}
                    </p>

                    <div class="panel-heading">
                      <h3>Comments<h3>
                      @foreach ($article->comments as $comment)
                        <p class="lead pull-right">{{ $comment->created_at }}</p>
                        <p class="lead">{{ $comment->comment_body }}</p>
                      @endforeach
                      <form action="/article/{{ $article->id }}" method="POST">
                        {{csrf_field()}}
                          <div class="form-group">
                            <label for="comment"></label>
                            <textarea class="form-control" name="comment" id="comment" placeholder="Comment .." rows="3"></textarea>
                            </br>
                            <button class="btn btn-primary" type="submit">Add new comment</button>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection