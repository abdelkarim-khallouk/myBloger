@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <a class="btn btn-sm btn-circle btn-success " href="{{ url('/add') }}" ><span class="glyphicon glyphicon-plus">  </a>
                  <span class="center" > Articles</span>
                </div>

                <div class="panel-body">                    
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
                              <td><a href="{{ "edit/".$article->id }}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"> Edit</a></td>
                              <td><a href="{{ "delete/".$article->id }}" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"> Delete</a></td>
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
