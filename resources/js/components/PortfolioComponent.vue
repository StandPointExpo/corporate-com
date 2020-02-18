<template>
    <div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 box-portfolio">
            <div class="col mb-4 mt-1 project-item" v-for="(portfolio, index) in portfolios">
                <div class="project-info">
                    <img v-lazy="portfolio.images[0].preview_url" >
                    <div class="project-details" @click="showGallery(portfolio.images)">
                        <h5 class="white-text red-border-bottom">{{portfolio.title}}</h5>
                        <div class="details white-text">{{portfolio.description}}</div>
                    </div>
                </div>
            </div>
        </div>
        <vue-easy-lightbox
            :visible="visible"
            moveDisabled
            :imgs="images"
            @hide="handleHide"
        >
            <template v-slot:loading="{loading}">
                <div class="loading-lightbox">
                    <img src="/images/ajax-loader.gif">
                </div>
            </template>
        </vue-easy-lightbox>
    </div>
</template>

<script>
    import vueEasyLightbox from 'vue-easy-lightbox';

    export default {
        props: ['portfolios'],
        components: {
            'vue-easy-lightbox': vueEasyLightbox,
        },
        data: function () {
            return {
                visible: false,
                images: [],
                loadImg: false
            }
        },
        mounted() {
            console.log(this.portfolios)
        },
        methods: {
            showImg(index) {
                this.index = index
                this.visible = true
            },
            handleHide() {
                this.visible = false
            },
            showGallery(gallery) {
                this.images = this.portfolioImages(gallery)
                this.visible = true;
            },
            portfolioImages(portfolioImages) {
                console.log(portfolioImages)
                let images = [];
                Object.entries(portfolioImages).forEach((item, index) => {
                    images.push(item[1].large_image);

                });
                return images;

            }
        }
    }
</script>
<style lang="scss" scoped>
    .loading-lightbox{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
        .btn__close, .btn__next, .btn__prev {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            opacity: .6;
            font-size: 32px;
            color: #fff;
            transition: .15s linear;
            -webkit-tap-highlight-color: transparent;
            outline: 0;
        }

        .btn__prev {
            left: 12px;
        }
        .btn__prev.disable,
        .btn__prev.disable:hover {
             cursor: default;
             opacity: .2;
         }
        .btn__next {
            right: 12px;
        }
        .vel-icon {
            width: 1em;
            height: 1em;
            vertical-align: -.15em;
            fill: currentColor;
            overflow: hidden;
        }
</style>
