@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit article</div>
                    <form action="/edit/{{$article->id}}" method="POST">
                        {{csrf_field()}}
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="title">Article title</label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{ $article->title }}">
            
                                <label for="body-textArea"></label>
                                <textarea class="form-control" id="body-textArea" name="body" rows="15">{{ $article->article_body }}</textarea>
                            </div>

                            <div class="panel-heading">
                              <button type="submit" class="btn btn-primary">Edit Article</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection