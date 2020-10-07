@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">create a post</div>

                <div class="card-body">
                    <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                    	@csrf
						<div class="form-grop">
						    <input class="form-control" name="title" placeholder="title" />
						</div>

						<div class="form-grop">
							<textarea class="form-control" name="content" placeholder="content" >	
							</textarea>
						</div> 
						<div class="form-grop">
						    <input class="form-control" type="file" name="image" />
						</div> 
						<div class="form-grop">
							<button class="btn btn-primary" >save</button>
						</div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
