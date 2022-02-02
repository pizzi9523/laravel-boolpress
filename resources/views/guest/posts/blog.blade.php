@extends('layouts.app')

@section('content')

    <h1 class="text-center">SPA Blog</h1>
    <div class="row flex-wrap">

        <div class="container">
            <div class="row">
                <div class="col-4 my-2" v-for="post in posts">
                    <div class="card">
                        <img class="card-img-top" :src="'storage/' + post.image" alt="">
                        <div class="card-body">
                            <h4 class="card-title">@{{ post.title }}</h4>
                            <p class="card-text">@{{ post.body }}</p>
                            <p class="card-text">@{{ post.category.name }}</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
