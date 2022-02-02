@extends('layouts.app')

@section('content')

    <h1 class="text-center">SPA Blog</h1>
    <div class="row flex-wrap">

        <div class="card col-3" v-for="post in posts">
            <img class="card-img-top" :src="'storage/' + post.image" alt="">
            <div class="card-body">

                <h4 class="card-title">@{{ post.title }}</h4>
                <p class="card-text">@{{ post.body }}</p>
            </div>
        </div>
    </div>

@endsection
