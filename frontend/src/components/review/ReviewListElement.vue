<template>
    <div class="review-wrp">
        <div class="review">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-32x32">
                        <img src="https://bulma.io/images/placeholders/128x128.png">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="top-line">
                        <strong><a>John Smith</a></strong>
                        <small><a>21 September 2018</a></small>
                    </div>
                    <div class="content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
                        </p>
                    </div>
                    <nav class="level">
                        <div class="level-left">
                            <a class="level-item">
                                <span class="icon is-small"><i class="far fa-arrow-alt-circle-up"></i></span>
                                <span class="is-size-6">Upvote</span>
                            </a>
                            <a class="level-item">
                                <span class="icon is-small"><i class="far fa-arrow-alt-circle-down"></i></span>
                                <span class="is-size-6">Downvote</span>
                            </a>
                        </div>
                    </nav>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ReviewListElement"
    }
</script>

<style scoped>
    .review-wrp {
        background: #fff;
        border-top: 1px solid #efeff4;
    }

    .review {
        padding: 15px;
    }

    .top-line {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .icon {
        margin-right: 5px;
    }

</style>