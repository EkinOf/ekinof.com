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
        Hi, my name's EkinOf!<br>
        I'm a fullstack developer in his twenties.<br>
        I develop code in PHP and JS mostly, but sometimes I make some python.<br>
        <br>
        I'm a huge fan of movies, you can check my <a href="https://letterboxd.com/EkinOf/" target="_blank">letterboxd account</a>.
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
