@extends('layouts.web')

@section('title', $category->id)

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">All the posts for the category <i class="is-family-monospace">@{{ category.id }}</i></p>
        </div>
    </section>
    <v-post-list :posts="posts"></v-post-list>
@stop

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            mixins: [aside],
            data: {
                category: @json($category),
                posts: @json($posts)
            }
        });
    </script>
@stop
