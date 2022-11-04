<template>
    <aside class="h-full bg-white drop-shadow-md pt-4 pb-4 px-3">
        <div class="pt-4 pb-6">
            <h2 class="text-center">Dashboard Ideal</h2>
        </div>
        <ul>
            <li v-for="menu in menus">
                <Link :href="mountUrl(menu)" class="flex items-center py-4 px-6 gap-4 text-sm"
                    :class="{ 'active': isActive(menu) }">
                <FontAwesomeIcon :icon="menu.icon" />
                <span class="font-light text-gray-700">{{ menu.text }}</span>
                </Link>
            </li>
        </ul>
    </aside>
</template>

<script>
import menus from '@/js/config/menus.js';

export default {
    data() {
        return {
            menus
        };
    },
    methods: {
        mountUrl(menu) {
            const appUrl = this.$page.props.appUrl;
            const url = new URL(menu.url, appUrl);
            return url.toString();
        },
        isActive(menu) {
            const url = this.$page.url.includes('?') ?
                this.$page.url.slice(0, this.$page.url.indexOf('?')) :
                this.$page.url;

            return url === menu.url;
        }
    }
}
</script>
