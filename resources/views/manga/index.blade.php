@extends('admin')
@section('title', 'Manga')
@section('content')
<div class="p-3">
    <h1>Manga</h1>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="{{route('create-manga')}}" class="btn btn-success">Create Manga</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th width="430">Title</th>
                        <th>Genre</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($mangas as $manga)
                            <tr>
                                <td>{{$manga->title}}</td>
                                <td>{{$manga->genres->implode('name_genre',', ')}}</td>
                                <td>
                                    <a href="{{route('edit-manga',['id'=>$manga->id])}}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <a href="{{route('chapter',['id'=>$manga->id,'title'=>$manga->title])}}" class="btn btn-sm btn-primary">
                                        Chapter
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$mangas->onEachSide(5)->links()}}
            </div>
        </div>
    </div>
</div>
@endsection