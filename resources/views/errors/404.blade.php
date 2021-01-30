@extends('layouts.web')

@section('title', '404 Error')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">404 Error</p>
            <p class="subtitle">Where do you think you are?!</p>
        </div>
    </section>
@stop

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            mixins: [aside]
        });
    </script>
@stop
