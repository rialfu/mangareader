@extends('admin')
@section('title', 'Create Manga')
@section('css')

.form-upload div{
    border-width:3px; border-style:dotted;height:150px; width:100%;font-size:20px;
}
.form-upload div:hover{

}

{{-- .preview-image{
    position:relative;
    width:100%;
    max-height:180px;
    height:180px;
}

.preview-image .img{
    width:100%;
    max-height:150px;
    overflow:hidden;
}
.preview-image img{
    width:100%;
    
}
.preview-image>input{
    margin-top:10px;
    width:100%;
    position:absolute;
    bottom:0;
    left:0;
}
[class^="ico-"], [class*=" ico-"] {
    font: normal 1em/1 Arial, sans-serif;
    display: inline-block;
}
  
.ico-times::before { content: "\2716";font-size:20px; color:black; }
.ico-times{
    position:absolute;
    top:5px;
    right:5px;
    cursor:pointer;
    z-index:2;
} --}}
.ico-times::before { content: "\2716";font-size:20px; color:black; }
.ico-times{
    display:none;
    position:absolute;
    top:5px;
    right:5px;
    cursor:pointer;
    z-index:2;
}
.image-crop-preview {
    position:relative;
    {{-- width: 100%; --}}
    aspect-ratio:1/1;
    {{-- height: 300px; --}}
    background-image: url('https://images.unsplash.com/photo-1569878698889-7bffa1896872?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60');
    background-position: center center;
    background-repeat: no-repeat;
}
.image-crop-preview>div{
    display:none;
}
.image-crop-preview:hover .ico-times{
    display:block;
}
.image-crop-preview:hover div{
    display:block;
    background-color: rgba(248, 247, 216, 0.7);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.preview-image-container{
    margin-top:10px;
}

@endsection
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
                            <label for="" class="col-sm-1 col-form-label">Name Chapter</label>
                            <div class="col-sm-11">
                                <input type="text" name="name_chapter" value="{{old('name_chapter')}}" class="form-control">
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-1 col-3">
                                <div class="form-check">
                                    <input type="checkbox" value="1" name="show" id="hideshow" @if(old('show')=="1") checked @endif class="form-check-input">
                                    <label for="" class="form-check-label " style="cursor:pointer" id="hideshow-label">{{old('show')=="1"? 'Show':'Hide'}}</label>
                                </div>
                            </div>
                            <div class="col-md-11 col-9">
                                <div>
                                    {{-- <label for="">Language</label> --}}
                                    <select class="form-select" aria-label="Default select example" name="lang">
                                        <option selected>Language</option>
                                        <option value="id">Indonesia</option>
                                        <option value="en">English</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <div style="margin:20px 0 20px 0;padding:20px;width:100%;min-height:100px;background-color:#f3f3f3;">
                            <div class="position-relative form-upload">
                                <div style="" class="text-center d-flex align-items-center justify-content-center" >
                                    upload
                                </div>
                                <input type="file" name="cache" id="cache-upload" style="z-index:1;top:0; left:0; height:150px;opacity:0;cursor:pointer;width:100%; position: absolute;">
                            </div>
                            
                            <div class="row preview-image-form mt-2"> --}}
                                {{-- <div class="col-md-3 col-sm-4 col-6">
                                    <div class="preview-image">
                                        <div class="img">
                                            <img class="" src="https://www.wallpapers13.com/wp-content/uploads/2015/12/Nature-Lake-Bled.-Desktop-background-image-840x525.jpg"  alt="">
                                        </div>
                                        
                                        <input type="file" name="file[]" id="" class="form-control" style="display:none;">
                                        <input type="text" name="fileName[]" class="inputFileName">
                                        <i class="ico-times delete" role="img" aria-label="Cancel"></i>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            
                        {{-- </div> --}}
                        {{-- <div style="width:100%;border:1px solid black;padding:15px;overflow-y:scroll;max-height:350px;" id="form-upload-parent">
                            <div style="width:100%; height:130px; border-style:dotted;" class="d-flex align-items-center justify-content-center" id="upload">
                                <input type="file" multiple>
                            </div>
                            <div style="" class="preview-image-container">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <div class="image-crop-preview">
                                            <div style=""></div>
                                            <i class="ico-times delete" role="img" aria-label="Cancel"></i>
                                        </div>
                                        <input type="text" name="rename[]" class="form-control my-2">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="image-crop-preview">
                                            <div ></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="image-crop-preview">

                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <div class="image-crop-preview">

                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="image-crop-preview">

                                        </div>
                                    </div>
                                </div>
                                <div>

                                </div>
                            </div>
                        </div> --}}
                        <div id="formUpload" class="mt-2">

                        </div>
                        <button class="btn btn-success mt-3">Add Chapter</button>
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
        const upload = document.querySelector("#upload")
        // upload.addEventListener('dragover', function(ev){
        //     console.log('over', ev)
        //     ev.preventDefault()
        // })
        // upload.addEventListener('dragenter', function(ev){
        //     ev.preventDefault()
        //     console.log('dragstart',ev.target)
        //     upload.style.background = 'black'
        // })
        // upload.addEventListener('dragend', endDrag)
        // upload.addEventListener('dragleave', endDrag)
        // function endDrag(ev){
        //     ev.preventDefault()
        //     ev.target.style.background = null
        // }
        // const centerCroppeds = document.querySelectorAll('.image-crop-preview')
        // centerCroppeds.forEach(element => {
            
        // });
        // function addLayer(ev){
        //     const div = document.createElement('div')
        //     div.setAttribute('class', 'layer-image')
        //     ev.target.appendChild(div)
        // }
        // function delLayer(ev){
        //     ev.target.innerHTML = ''
        // }
        // upload.addEventListener('drop', function(ev){
        //     console.log("drop",ev, ev.dataTransfer.files)
        //     ev.preventDefault()
        //     ev.target.style.background = null;
        //     if(ev.dataTransfer.files){
        //         for(let i=0; i< ev.dataTransfer.files.length; i++){
        //             const file = ev.dataTransfer.files[i];
        //             if(file['type'].startsWith('image')){
                        

                        
        //             }

        //         }
        //         // console.log(ev.dataTransfer.files.length)
        //         // ev.dataTransfer.files.forEach((file)=>{
        //         //     console.log(file)
        //         // })
        //     }
        // })
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

        class DropZone{
            colorDragStart = 'grey';
            scrollable = false;
            parent = null;
            fileListContainer = null;
            upload = null;
            customNameUpload = null;
            customRenameUpload = null;
            dragStart = function(ev, classParent){
                console.log(classParent)
                ev.preventDefault();
                ev.target.style.background = classParent.colorDragStart;
            }
            endDrag = function(ev){
                console.log('enddrag')
                ev.preventDefault();
                ev.target.style.background = null;
            }
            delFile = function(ev, parentClass){
                const element = ev.target.parentNode.parentNode;
                parentClass.fileListContainer.removeChild(element)
                console.log(element)
            }
            dragOver = function(ev){
                console.log('over')
                ev.preventDefault()
            }
            addFile = function(ev, parentClass){
                console.log('add')
                ev.preventDefault()
                ev.target.style.background = null;
                if(ev.dataTransfer.files){
                    for(let i=0; i< ev.dataTransfer.files.length; i++){
                        const file = ev.dataTransfer.files[i];
                        if(file['type'].startsWith('image')){
                            const col = document.createElement('div')
                            col.setAttribute('class', 'col-md-3 mb-2 col-sm-4 col-6')

                            const imageCropPreview = document.createElement('div')
                            imageCropPreview.setAttribute('class', 'image-crop-preview')
                            const input = document.createElement('input')
                            input.setAttribute('type', 'file')
                            input.setAttribute('name', parentClass.customNameUpload)
                            input.style.display = 'none';
                            const dt = new DataTransfer()
                            dt.items.add(file)
                            input.files = dt.files
                            console.log(input.files)
                            const reader = new FileReader();
                            reader.onloadend = function () {
                                imageCropPreview.style.backgroundImage = 'url("' + reader.result + '")';
                            }
                            reader.readAsDataURL(file);
                            
                            const div1 = document.createElement('div')
                            imageCropPreview.appendChild(div1)

                            // <i class="ico-times delete" role="img" aria-label="Cancel"></i>
                            const iComponent = document.createElement('i')
                            iComponent.setAttribute('class', 'ico-times')
                            iComponent.setAttribute('role','img')
                            iComponent.setAttribute('aria-label','Cancel')
                            iComponent.addEventListener('click', function(ev){ parentClass.delFile(ev, parentClass)})
                            imageCropPreview.appendChild(iComponent)
                            // <input type="text" name="rename[]" class="form-control my-2">
                            
                            col.appendChild(imageCropPreview)
                            col.appendChild(input)
                            if(parentClass.customRenameUpload){
                                const inputRename = document.createElement('input');
                                inputRename.setAttribute('class', 'form-control my-2')
                                inputRename.setAttribute('name', parentClass.customRenameUpload+'[]')
                                col.appendChild(inputRename)
                            }
                            parentClass.fileListContainer.appendChild(col)
                        }
                    }
                }
            }
            
            constructor(target, {scrollable = false, maxHeight = 350, customNameUpload = 'image[]', rename = ''}={}){
                const f = this;
                parent = document.querySelector(target)
                if(parent != null && scrollable){
                    parent.style.maxHeight = maxHeight+'px'
                    parent.style.overflowY = 'scroll'
                    this.scrollable = scrollable;
                }
                if(parent == null){
                    return;
                }
                if(rename){
                    this.customRenameUpload = rename;
                }
                this.customNameUpload = customNameUpload;
                // width:100%;border:1px solid black;padding:15px;
                parent.style.width = '100%';
                parent.style.border = '1px solid black';
                parent.style.padding = '15px';

                const upload = document.createElement('div')
                // idth:100%; height:130px; border-style:dotted;
                upload.style.width = '100%';
                upload.style.height = '130px';
                upload.style.borderStyle = 'dotted';
                upload.setAttribute('class', 'd-flex align-items-center justify-content-center')
                upload.addEventListener('dragend', this.endDrag)
                upload.addEventListener('dragleave', this.endDrag)
                
                
                upload.addEventListener('dragenter', function(ev){ f.dragStart(ev, f)});
                upload.addEventListener('dragover', this.dragOver);
                upload.addEventListener('drop', function(ev){f.addFile(ev, f)});
                this.upload = upload
                
                const input = document.createElement('input')
                input.setAttribute('type', 'file')
                input.setAttribute('multiple', 'multiple')
                
                upload.appendChild(input)
                parent.appendChild(upload)
                
                const containerContent = document.createElement('div')
                containerContent.setAttribute('class', 'preview-image-container')

                this.fileListContainer = document.createElement('div')
                this.fileListContainer.setAttribute('class', 'row')

                containerContent.appendChild(this.fileListContainer)
                parent.appendChild(containerContent)
            }
            
            
        }
        new DropZone('#formUpload',{scrollable:true, rename:'fileName'})
        // const cache = document.querySelector('#cache-upload')
        // const previewImage = document.querySelector('.preview-image-form')
        // cache.addEventListener('change', handleImageCustom, false)
        // function handleImageCustom(e){
        //     console.log()
        //     const divParent = document.createElement('div')
        //     divParent.setAttribute('class','col-md-3 col-sm-4 col-6')
        //     divParent.setAttribute('val', previewImage.children.length)
        //     const divParent1 = document.createElement('div')
        //     divParent1.setAttribute('class','preview-image')

        //     const divImg = document.createElement('div')
        //     divImg.setAttribute('class', 'img')
        //     const img = document.createElement('img')
        //     var reader = new FileReader();
        //     reader.onload = function (event) {
        //         img.src = event.target.result
        //     }
        //     reader.readAsDataURL(e.target.files[0]);
        //     divImg.appendChild(img)
        //     divParent1.appendChild(divImg)

        //     const file = cache.cloneNode(true)
        //     file.removeAttribute('style')
        //     file.removeAttribute('name')
        //     file.setAttribute('name','image[]')
        //     file.removeAttribute('id')
        //     divParent1.appendChild(file)

        //     const fileName = document.createElement('input')
        //     fileName.setAttribute('name', 'fileName[]')
        //     fileName.setAttribute("class", "inputFileName")
        //     fileName.addEventListener('keypress', rename)
        //     divParent1.appendChild(fileName)

        //     const close = document.createElement('i')
        //     close.setAttribute('class', 'ico-times delete')
        //     close.setAttribute('role','img')
        //     close.setAttribute('aria-label', 'Cancel')
        //     close.addEventListener('click', deletePhoto, false)
        //     divParent1.appendChild(close)

        //     divParent.appendChild(divParent1)
        //     previewImage.appendChild(divParent)

        //     e.target.value = null
        // }
        function rename(ev){
            const f = ev.target.parentNode.querySelector('input[type=file]')
            if(f){
                console.log(f.files)
                const file = f.files[0]
                console.log(file)
                f.files[0] = new File([file], ev.target.value, {
                    type: file.type,
                    lastModified: file.lastModified,
                })

            }
            console.log(ev.target.parentNode.querySelector('input[type=file]'))
        }
        function deletePhoto(e){

            const element = e.target.parentNode.parentNode
            const index = [...previewImage.children].indexOf(element)
            previewImage.removeChild(element)
            console.log(element, index)
        }

        
    </script>
@endsection