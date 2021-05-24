@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
    <form action="{{route('admin.post.add')}}" method="post">
        @csrf
        <div class="card">

            <div class="card-body">
                @include('errorBars.errorsArray',['title' => 'Error','errors'=>$errors])
                <div class="row">
                    <div class="col-md-12">
                        <i class="fa fa-pencil-square-o"></i> <label>Create a New Post</label>
                    </div>
                </div>
                <br>
                <br>
                <br>
               <div class="row">
                   <div class="col-md-1"></div>
                   <div class="col-md-10">
                       <div class="row">
                           <div class="col-md-2">
                               <label >
                                   Name
                               </label>
                               <br>
                           </div>
                           <div class="col-md-6">
                           <input name="title" class="form-control">
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-2">
                               <label class="text-right" >
                                   Content
                               </label>
                               <br>
                           </div>
                           <div class="col-md-10">
                               <textarea class="summernote" name="contentdata" style="height: 40vh"></textarea>


                           </div>
                       </div>

                       <br>
                       <div class="row">
                           <div class="col-md-12 ">
                               <button class="btn btn-primary float-right" type="submit" >Create</button>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-1"></div>
               </div>
            </div>
        </div>
    </form>
</div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script>

       function addPost()
        {
            alert($('#summernote').code())
        }
        $(document).ready(function(){



        });

    </script>
@endsection