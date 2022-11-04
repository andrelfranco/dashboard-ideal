<template>
    <div class="flex items-center justify-center pt-10 lg:px-0 sm:px-6 px-4">
        <div class="w-full px-6 flex items-center justify-between border-t border-gray-200 dark:border-gray-700">
            <div>
                <Link v-if="data.prev_page_url" :href="data.prev_page_url"
                    class="flex gap-2 items-center pt-3 text-gray-700 hover:text-indigo-700 cursor-pointer">
                <FontAwesomeIcon icon="arrow-left" />
                <p class="text-sm font-medium leading-none">Página anterior</p>
                </Link>
            </div>
            <div class="sm:flex hidden">
                <Link v-for="link in cleanLinks" :key="link.label" :href="link.url"
                    class="text-sm font-medium leading-none cursor-pointer text-gray-600 dark:text-gray-200  hover:text-indigo-700 dark:hover:text-indigo-400 border-t border-transparent hover:border-indigo-400 pt-3 mr-4 px-2"
                    :class="{ 'text-indigo-700 border-t-2 border-indigo-700': link.active }">
                {{ link.label }}
                </Link>
            </div>
            <div>
                <Link v-if="data.next_page_url" :href="data.next_page_url"
                    class="flex gap-2 items-center pt-3 text-gray-700 hover:text-indigo-700 cursor-pointer">
                <p class="text-sm font-medium leading-none">Próxima página</p>
                <FontAwesomeIcon icon="arrow-right" />
                </Link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: Object
    },
    computed: {
        cleanLinks() {
            const cleanLinks = [...this.data.links];
            cleanLinks.shift();
            cleanLinks.pop();
            return cleanLinks;
        }
    }
}
</script>
