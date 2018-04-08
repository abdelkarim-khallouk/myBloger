@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Articles</div>

                <div class="panel-body">
                    <a class="btn btn-info" href="{{ url('/add') }}" >Add an article</a>
                    
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Author</th>
                        </tr>
                      </thead>
                      <tbody>
                        

                        @foreach($articles as $article)
                          
                            <tr>
                              <th scope="row">{{ $article->id }}</th>
                              <td><a href="{{ "article/".$article->id }}">{{ $article->title }}</a></td>
                              <td>
                                @foreach($authors as $author)
                                  @if($author->id == $article->user_id) 
                                    {{ $author->name }} 
                                  @endif
                                @endforeach
                              </td>
                              <td><span class="glyphicon glyphicon-edit text-primary"> <a href="{{ "edit/".$article->id }}" class="">Edit</a></td>
                              <td><span class="glyphicon glyphicon-trash text-danger"> <a href="{{ "delete/".$article->id }}" class="">Delete</a></td>
                            </tr>
                        @endforeach



                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
