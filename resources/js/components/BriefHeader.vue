<template>
    <div class="brief-page__header row">
        <div class="col-12 col-md-8">
            <img class="logo" src="/images/icons/logo.svg">
        </div>
        <div class="col-12 col-md-4 d-flex align-items-center">
            <div class="brief-page__header-contacts">
                <p v-for="(phone, index) in phones" :key="index" class="pb-0 mb-0"><a :href="`tel:${phone.phone}`">{{ phone.phone }}</a>
                </p>
                <a :href="`mailto:${contacts.email}`">{{ contacts.email }}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BriefHeader",
    props: {
        contacts: {
            type: Object
        },
        phones: {
            type: Array
        }
    }
}
</script>

<style scoped>

</style>
