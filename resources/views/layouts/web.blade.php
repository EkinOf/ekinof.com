<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="preload" href="/css/app.css" as="style">
    {!! Html::style('/css/app.css') !!}
    @yield('meta', View::make('layouts.meta'))
    <link rel="icon" href="{!! asset('images/favicon.png') !!}">
    <link rel="icon" href="{!! asset('images/favicon-32.png') !!}" sizes="32x32">
    <link rel="icon" href="{!! asset('images/favicon-57.png') !!}" sizes="57x57">
    <link rel="icon" href="{!! asset('images/favicon-76.png') !!}" sizes="76x76">
    <link rel="icon" href="{!! asset('images/favicon-96.png') !!}" sizes="96x96">
    <link rel="icon" href="{!! asset('images/favicon-128.png') !!}" sizes="128x128">
    <link rel="icon" href="{!! asset('images/favicon-192.png') !!}" sizes="192x192">
    <link rel="icon" href="{!! asset('images/favicon-228.png') !!}" sizes="228x228">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="twitter:dnt" content="on">
    <title>@yield('title') - {!! config('app.name') !!}</title>
</head>
<body>
    <div id="app" class="has-background-light">
        <b-navbar class="has-background-white">
            <template #brand>
                <b-navbar-item href="{!! route('home') !!}">
                    <img src="{!! asset('images/logo.svg') !!}" width="128px" alt="logo">
                </b-navbar-item>
            </template>
            <template #start>
                <b-navbar-item href="{!! route('home') !!}" class="has-text-weight-bold">
                    Home
                </b-navbar-item>
                <b-navbar-item href="{!! route('about') !!}" class="has-text-weight-bold">
                    About
                </b-navbar-item>
            </template>
            <template #end>
                <b-navbar-item href="{!! env('GITHUB_URL') !!}" target="_blank">
                    <i class="fab fa-lg fa-github-alt has-text-black"></i>
                </b-navbar-item>
                <b-navbar-item href="{!! env('TWITTER_URL') !!}" target="_blank">
                    <i class="fab fa-lg fa-twitter has-text-twitter"></i>
                </b-navbar-item>
            </template>
        </b-navbar>
        <div class="container is-fullhd">
            <div class="columns is-desktop">
                <div class="column">
                    @yield('content')
                </div>
                <div class="column is-4-desktop">
                    <div class="tile is-ancestor my-6">
                        <div class="tile is-horizontal">
                            <div class="tile">
                                <div class="tile is-parent is-vertical">
                                    <div class="tile is-child box">
                                        <p class="title">Search</p>
                                        <form action="{!! route('search') !!}" method="get">
                                            <div class="field has-addons">
                                                <div class="control">
                                                    <b-input name="query" v-model="search" placeholder="Type your search"></b-input>
                                                </div>
                                                <div class="control">
                                                    <b-button class="button is-primary" native-type="submit">Go!</b-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tile is-child box">
                                        <p class="title">Categories</p>
                                        <b-taglist>
                                            <span v-for="(category, categoryKey) in categories" :key="categoryKey">
                                                <a :href="'/categories/'+category.id">
                                                    <b-tag type="is-primary">@{{ category.id }}</b-tag>
                                                </a>
                                                &nbsp;
                                            </span>
                                        </b-taglist>
                                    </div>
                                    <div class="tile is-child box">
                                        <a class="twitter-timeline" data-dnt="true" data-height="1500" href="https://twitter.com/EkinOf?ref_src=twsrc%5Etfw">Tweets by EkinOf</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    <strong><a href="{!! env('APP_URL') !!}">ekinof.com</a></strong> by <a href="{!! env('TWITTER_URL') !!}" target="_blank">EkinOf</a>.
                    The source code is free to fork <a href="https://github.com/EkinOf/ekinof.com" target="_blank">here</a>.
                </p>
                <p>
                    CSS by <a href="https://bulma.io" target="_blank">Bulma</a>.
                    Logo <i class="far fa-copyright"></i> by <a href="https://twitter.com/Artwo" target="_blank">Artwo</a>.
                </p>
            </div>
        </footer>
    </div>
    {!! Html::script(mix('/js/app.js')) !!}
    <script>
        const aside = {
            data: {
                categories: [],
                search: '',
            },
            mounted: function () {
                this.getCategories();
            },
            methods: {
                getCategories: function () {
                    axios.get('{!! route('categories.index') !!}')
                        .then(response => {
                            this.categories = response.data;
                        }).catch(error => {
                            this.$buefy.snackbar.open({
                                type: 'is-danger',
                                message: 'Something went wrong, can\'t load categories 😢',
                            })
                        })
                }
            }
        };
    </script>
    @yield('script')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>
