<template>
    <Dashboard>
        <Card :title="`Editar dados de ${user.name}`">
            <form @submit.prevent="submit">
                <div class="lg:w-1/3 mb-6">
                    <FormInput label="Nome" name="name" :form="form" placeholder="Digite o nome do usuário"
                        class="mb-3" />
                    <FormInput label="E-mail" name="email" :form="form" placeholder="Digite o nome do usuário"
                        class="mb-3" />
                </div>

                <div class="flex gap-3">
                    <button
                        class="flex gap-2 items-center bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 rounded-md py-3 px-6 text-white font-bold leading-none"
                        type="submit">
                        <FontAwesomeIcon icon="save" />
                        <span class="text-sm">
                            Salvar
                        </span>
                    </button>

                    <Link :href="backUrl"
                        class="flex gap-2 items-center bg-gray-200 hover:bg-gray-300 active:bg-gray-400 rounded-md py-3 px-6 font-bold leading-none">
                        <FontAwesomeIcon icon="cancel" />
                        <span class="text-sm">
                            Cancelar
                        </span>
                    </Link>
                </div>

            </form>
        </Card>
    </Dashboard>
</template>

<script>
import Dashboard from '@/js/Layouts/Dashboard/Dashboard.vue';
import { Card, FormInput } from '@/js/Layouts/Dashboard/Components';
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Dashboard,
        Card,
        FormInput
    },
    props: {
        user: Object
    },
    setup() {
        let form = useForm({
            name: '',
            email: ''
        });

        return {
            form
        };
    },
    computed: {
        backUrl() {
            const appUrl = this.$page.props.appUrl;
            const backUrl = new URL(`admin/users`, appUrl);
            return backUrl.toString();
        }
    },
    mounted() {
        this.form.name = this.user.name;
        this.form.email = this.user.email;
    },
    methods: {
        submit() {
            const appUrl = this.$page.props.appUrl;
            const url = new URL(`admin/users/${this.user.id}`, appUrl);
            this.form.put(url.toString());
        }
    }
};
</script>
