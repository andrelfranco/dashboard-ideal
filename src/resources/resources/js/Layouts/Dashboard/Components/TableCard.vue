<template>
    <div class="table-card bg-white rounded-xl drop-shadow-md pb-5">
        <div class="title px-6 pt-6 pb-3">
            <h2 class="font-bold text-gray-700">{{ title }}</h2>
        </div>
        <div class="body">
            <div class="table-container overflow-x-auto relative">
                <table class="table w-full text-sm text-left">
                    <thead class="text-xs text-gray-500 uppercase bg-slate-200">
                        <tr>
                            <th v-for="head in heads" class="px-6 py-3">{{ head }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <slot></slot>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="footer">
            <Pagination v-if="data !== undefined" :data="data" />
        </div>
    </div>
</template>

<script>
import { Pagination } from '@/js/Layouts/Dashboard/Components';

export default {
    components: {
        Pagination
    },
    props: {
        title: String,
        heads: Array,
        data: Object
    }
}
</script>
