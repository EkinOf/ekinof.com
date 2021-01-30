@extends('layouts.web')

@section('meta')
    <meta property="og:url" content="{{ $post->link }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{ $post->title }}"/>
    <meta property="og:description" content="{{ strip_tags($post->excerpt) }}"/>
    <meta property="og:image" content="{{ asset($post->preview_image) }}"/>

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@christophrumpel" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{{ strip_tags($post->excerpt) }}"/>
    <meta name="twitter:image" content="{{ asset($post->preview_image) }}"/>
@stop

@section('title', $post->title)

@section('content')
    <section class="hero">
        <div class="hero-body">
            <a :href="post.link"><p class="title has-text-primary">@{{ post.title }}</p></a>
            <p class="subtitle">@{{ toLocaleString(post.date) }}</p>
        </div>
    </section>
    <span>Share this post</span>
    <br>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
       class="twitter-share-button"
       data-size="large"
       :data-url="post.link"
       data-via="EkinOf"
       data-related="EkinOf"
       data-show-count="false"
       data-dnt="true">Tweet</a>
    <button class="button is-small" @click="copyLink">Copy URL</button>
    <br>
    <br>
    <div class="content" v-html="post.content"></div>
    <span>Share this post</span>
    <br>
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw"
       class="twitter-share-button"
       data-size="large"
       :data-url="post.link"
       data-via="EkinOf"
       data-related="EkinOf"
       data-show-count="false"
       data-dnt="true">Tweet</a>
    <button class="button is-small" @click="copyLink">Copy URL</button>
    <br>
    <br>
@stop

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            mixins: [aside],
            data: {
                post: @json($post)
            },
            methods: {
                copyLink: function () {
                    navigator.clipboard.writeText(this.post.link);
                    this.$buefy.snackbar.open({
                        type: 'is-info',
                        message: 'URL copied! 😉',
                    })
                },
                toLocaleString: function (date) {
                    return DateTime.fromISO(date).toLocaleString();
                }
            }
        });
    </script>
@stop
