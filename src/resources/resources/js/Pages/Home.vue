<template>
    <Dashboard>
        <h1 class="text-2xl underline">
            I'm home!
        </h1>
    </Dashboard>
</template>

<script>
import Dashboard from '../Layouts/Dashboard/Dashboard.vue';
import { Card } from '../Layouts/Dashboard/Components';

export default {
    components: {
        Dashboard,
        Card
    }
};
</script>
