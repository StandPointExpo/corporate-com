<template>
    <div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 box-portfolio">
            <div class="col mb-4 mt-1 project-item" v-for="(portfolio, index) in portfolios">
                <div class="project-info">
                    <a :href="portfolio.images[0].large_url" :data-lightbox="'example-set-' + portfolio.id"
                       :data-title="portfolio.title" class="more portfolig-g-bg">
                    <img v-lazy="portfolio.images[0].preview_url" >
                    <div class="project-details" >
                        <h5 class="white-text red-border-bottom">{{portfolio.title}}</h5>
                        <div class="details white-text">{{portfolio.description}}</div>
                    </div>
                    </a>
                </div>
                <div class="project-gallert-photos" style="display: none">
                    <a v-for="(image, imgIndex) in portfolioImages(portfolio.images)"
                       :data-lightbox="'example-set-' + portfolio.id"
                       :data-title="portfolio.title" :href="image.large_url"></a>
                </div>
            </div>
        </div>
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
           //
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
                let images = [];
                Object.entries(portfolioImages).forEach((item, index) => {
                    if(index != 0)
                    images.push({
                        large_url: item[1].large_image
                    });

                });
                return images;

            }
        }
    }
</script>
<style lang="scss" scoped>

</style>
