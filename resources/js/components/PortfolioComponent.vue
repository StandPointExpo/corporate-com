<template>
    <div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-sm-2 box-portfolio">
            <div class="col mb-4 mt-1 project-item" v-for="(portfolio, index) in list">
                <div class="project-info">
                    <a :href="portfolio.main_image_large" :data-lightbox="'example-set-' + portfolio.id"
                       :data-title="portfolio.title" class="more portfolig-g-bg">
                        <img v-lazy="portfolio.main_image_thumb">
                        <div class="project-details">
                            <h5 class="white-text red-border-bottom">{{ portfolio.title }}</h5>
                            <div class="details white-text">{{ portfolio.description }}</div>
                        </div>
                    </a>
                </div>
                <div class="project-gallert-photos" style="display: none">
                    <a v-for="(image, imgIndex) in portfolioImages(portfolio)"
                       :data-lightbox="'example-set-' + portfolio.id"
                       :data-title="portfolio.title" :href="image.large_url"></a>
                </div>
            </div>
            <infinite-loading @infinite="infiniteHandler"></infinite-loading>
        </div>
    </div>
</template>

<script>
import vueEasyLightbox from 'vue-easy-lightbox';

export default {
    props: ['portfolios', 'api'],
    components: {
        'vue-easy-lightbox': vueEasyLightbox
    },
    data: function () {
        return {
            visible: false,
            images: [],
            loadImg: false,
            page: 2,
            list: this.portfolios
        }
    },
    mounted() {
        //
    },
    methods: {
        infiniteHandler($state) {
            axios.get(this.api, {
                params: {
                    page: this.page,
                },
            }).then(({data}) => {
                if (data.data.length) {
                    this.page += 1;
                    this.list.push(...data.data);
                    $state.loaded();
                } else {
                    $state.complete();
                }
            });
        },
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
        portfolioImages(portfolio) {
            let images = [];
            Object.values(portfolio.images).forEach((item, index) => {
                if (item.is_main === 0 && portfolio.main_image_id !== item.id) {
                    images.push({
                        large_url: item.large_url
                    });
                }
            });
            return images;

        }
    }
}
</script>
<style lang="scss" scoped>

</style>
