<template>
    <div id="dashboard" class="relative">
        <div class="h-screen w-full absolute top-0 left-0 z-0">
            <div class="h-48 w-full bg-blue-500"></div>
            <div class="h-[calc(100vh-12rem)] bg-slate-100"></div>
        </div>
        <div class="flex h-screen w-full absolute top-0 left-0 z-10">
            <div class="lg:w-2/12">
                <Sidebar />
            </div>
            <div class="lg:w-10/12 p-6 overflow-y-auto">
                <Navbar />
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h1 class="text-2xl text-white font-bold">{{ title }}</h1>
                    </div>
                    <div>
                        <slot name="header-tools"></slot>
                    </div>
                </div>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
import Navbar from '@/js/Layouts/Dashboard/Partials/Navbar.vue';
import Sidebar from '@/js/Layouts/Dashboard/Partials/Sidebar.vue';

export default {
    components: {
        Navbar,
        Sidebar
    },
    props: {
        title: String
    }
};
</script>
