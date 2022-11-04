<template>
    <div class="card bg-white rounded-xl drop-shadow-md pb-5">
        <div class="title px-6 pt-6 pb-3">
            <h2 class="font-bold text-gray-700">{{ title }}</h2>
        </div>
        <div class="body px-6">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
    }
}
</script>
