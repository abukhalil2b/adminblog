@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	{{$post->title}}
                </div>

                <div class="card-body">
						<img src="{{asset('storage').'/'.$post->img}}" class="img">
                </div>
                <p>
                	{{$post->content}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
