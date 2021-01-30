@extends('layouts.web')

@section('title', 'About me')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">About me</p>
        </div>
    </section>
    <br>
    <div class="content">

    </div>
@stop

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            mixins: [aside]
        });
    </script>
@stop
