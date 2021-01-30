@extends('layouts.web')

@section('title', '500 Error')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">500 Error</p>
            <p class="subtitle">Oops?!</p>
        </div>
    </section>
    <br>
    <div style="width:100%;height:0;padding-bottom:100%;position:relative;">
        <iframe src="https://giphy.com/embed/H7wajFPnZGdRWaQeu0" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
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
