@extends('admin')
@section('title', 'Create Manga')
@section('content')
<div class="p-3">
<div class="container">
    <h1>Create Manga</h1>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="" class="col-sm-1 col-form-label">Judul</label>
                            <div class="col-sm-11">
                                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="" class="col-sm-1 col-form-label">Synopsis</label>
                            <div class="col-sm-11">
                                <input type="text" name="synopsis" value="{{old('synopsis')}}" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-1 col-form-label">Cover</label>
                            <div class="col-sm-11">
                                <input type="file" name="cover" class="form-control">
                            </div>
                        </div>
                        <div>
                            <label for="">Genre</label>
                            <div class="row">
                                @foreach ( $genres as $genre)
                                <div class="col-2">
                                <div class="form-check">
                                    <input type="checkbox" value="{{$genre->id}}" name="genre[] "@if(is_array(old('genre')) && in_array($genre->id, old('genre'))) checked @endif class="form-check-input">
                                    <label for="" class="form-check-label " style="" >{{$genre->name_genre}}</label>
                                </div>
                                </div>
                                
                                @endforeach

                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" value="1" name="show" id="hideshow" @if(old('show')=="1") checked @endif class="form-check-input">
                            <label for="" class="form-check-label " style="cursor:pointer" id="hideshow-label">{{old('show')=="1"? 'Show':'Hide'}}</label>
                        </div>
                        <button class="btn btn-success mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
    <script>
        const labelShowHide = document.querySelector("#hideshow-label")
        document.querySelector('#hideshow').addEventListener('click', function(e){
            if(e.target.checked){
                labelShowHide.innerHTML = 'Show'
            }else{
                labelShowHide.innerHTML = 'Hide'
            }
            console.log(e.target.checked)
        })
        labelShowHide.addEventListener('click',function(e){
            if(document.querySelector('#hideshow').checked){
                document.querySelector('#hideshow').checked =  false
                labelShowHide.innerHTML = 'Hide'
            }else{
                document.querySelector('#hideshow').checked =  true
                labelShowHide.innerHTML = 'Show'   
            }
        })
    </script>
@endsection