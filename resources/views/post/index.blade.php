@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">list of posts</div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>title</td>
                            <td>status</td>
                            <td>
                                posted by
                            </td>
                            @if(auth()->user()->user_type=='admin')
                            <td>control</td>
                            @endif
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>
                                <a href="{{route('admin.post.show',['id'=>$post->id])}}">{{$post->title}}</a>
                            </td>
                            <td>
                                <p class="{{$post->active==1?'active':'deactive'}}">
                                    {{$post->active==1?'active':'deactive'}}
                                </p>
                            </td>
                            <td>
                                {{$post->user->name}}
                            </td>
                            @if(auth()->user()->user_type=='admin')
                            <td>
                                @if($post->active==0)
                                <a href="{{route('admin.post.accept',['id'=>$post->id])}}">accept</a>
                                @endif
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
