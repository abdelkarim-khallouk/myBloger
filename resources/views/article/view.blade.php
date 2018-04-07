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
                            <th scope="row">1</th>
                            <td><a href="{{ "article/".$article->id }}">{{ $article->title }}</a></td>
                            <td>{{$article->user_id}}</td>
                            <td><span class="glyphicon glyphicon-edit"> Edit</td>
                            <td><span class="glyphicon glyphicon-trash"> Delete</td>
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
