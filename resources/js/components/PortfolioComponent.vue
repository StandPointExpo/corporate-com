<template>
    <div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 box-portfolio">
            <div class="col mb-4 mt-1 project-item" v-for="(portfolio, index) in portfolios">
                <div class="project-info">
                    <img :src="portfolio.images[0].preview_url" alt="preview" class="preview">
                    <div class="project-details" @click="showGallery(portfolio.images)">
                        <h5 class="white-text red-border-bottom">{{portfolio.title}}</h5>
                        <div class="details white-text">{{portfolio.description}}</div>
                    </div>
                </div>
            </div>
        </div>
        <vue-easy-lightbox
            :visible="visible"
            :imgs="images"
            @hide="handleHide"
        ></vue-easy-lightbox>
    </div>
</template>

<script>
    import vueEasyLightbox from 'vue-easy-lightbox';

    export default {
        props: ['portfolios'],
        components: {
            'vue-easy-lightbox': vueEasyLightbox
        },
        data: function () {
            return {
                visible: false,
                images: []
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
