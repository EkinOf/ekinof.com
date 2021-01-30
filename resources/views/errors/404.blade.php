@extends('layouts.web')

@section('title', '404 Error')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">404 Error</p>
            <p class="subtitle">Where do you think you are?!</p>
        </div>
    </section>
    <br>
    <div style="width:100%;height:0;padding-bottom:57%;position:relative;">
        <iframe src="https://giphy.com/embed/j9XoexYMmd7LdntEK4" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
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
