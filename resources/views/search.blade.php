@extends('layouts.web')

@section('title', $search)

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title" v-if="search!==''">Your search: <i class="is-family-monospace">{{ $search }}</i></p>
            <p class="title" v-else>Your search was empty!</p>

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
                search: @json($search),
                posts: @json($posts)
            }
        });
    </script>
@stop
