<template>
    <Dashboard>
        <Card title="Cadastrar novo usuário">
            <form @submit.prevent="submit">
                <div class="lg:w-1/3 mb-6">
                    <FormInput label="Nome" name="name" :form="form" placeholder="Digite o nome do usuário"
                        class="mb-3" />
                    <FormInput label="E-mail" name="email" :form="form" placeholder="Digite o nome do usuário"
                        class="mb-3" />
                </div>

                <div class="flex gap-3">
                    <button class="btn btn-blue" type="submit">
                        <FontAwesomeIcon icon="save" />
                        <span class="text-sm">
                            Salvar
                        </span>
                    </button>

                    <Link :href="backUrl" class="btn btn-gray">
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
    methods: {
        submit() {
            const appUrl = this.$page.props.appUrl;
            const url = new URL(`admin/users`, appUrl);
            this.form.post(url.toString());
        }
    }
};
</script>
