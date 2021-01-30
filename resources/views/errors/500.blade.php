@extends('layouts.web')

@section('title', '500 Error')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">500 Error</p>
            <p class="subtitle">Oops?!</p>
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
