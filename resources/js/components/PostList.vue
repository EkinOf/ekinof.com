<template>
    <div class="tile is-ancestor">
        <div class="tile is-vertical">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <div v-for="(post, postKey) in posts" :key="postKey">
                        <a :href="post.link">
                            <article class="tile is-child notification">
                                <p class="title">{{ post.title }}</p>
                            </article>
                        </a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PostList",
    props: ['posts']
}
</script>

<style scoped>

</style>
