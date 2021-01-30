@extends('layouts.web')

@section('title', 'Home')

@section('content')
    <section class="hero">
        <div class="hero-body">
            <p class="title">Latest posts</p>
        </div>
    </section>
    <v-post-list :posts="posts"></v-post-list>
    <b-pagination
        :total="pages*10"
        v-model="currentPage"
        :range-before="3"
        :range-after="1"
        :simple="false"
        :rounded="false"
        :per-page="10"
        icon-prev="chevron-left"
        icon-next="chevron-right"
        aria-next-label="Next page"
        aria-previous-label="Previous page"
        aria-page-label="Page"
        aria-current-label="Current page">
    </b-pagination>
@stop

@section('script')
    <script>
        const vue = new Vue({
            el: '#app',
            mixins: [aside],
            data: {
                posts: @json($posts),
                currentPage: @json($currentPage),
                postsPerPage: @json($postsPerPage),
                pages: @json($pages),

            },
            watch: {
                currentPage: function (value, oldValue) {
                    if (oldValue < value) {
                        this.getNextPage();
                    } else {
                        this.getPreviousPage();
                    }
                }
            },
            methods: {
                getPreviousPage: function () {
                    axios.get('/api/posts', {params: {
                            'current-page': this.currentPage,
                            'posts-per-page': this.postsPerPage
                        }}).then(response => {
                            this.posts = response.data;
                        }).catch(error => {
                            this.$buefy.snackbar.open({
                                type: 'is-danger',
                                message: 'Something went wrong, can\'t load posts 😢',
                            })
                        });
                },
                getNextPage: function () {
                    axios.get('/api/posts', {params: {
                            'current-page': this.currentPage,
                            'posts-per-page': this.postsPerPage
                        }}).then(response => {
                            this.posts = response.data;
                        }).catch(error => {
                            this.$buefy.snackbar.open({
                                type: 'is-danger',
                                message: 'Something went wrong, can\'t load posts 😢',
                            })
                        });
                }
            }
        });
    </script>
@stop
