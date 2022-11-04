<template>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto bg-black bg-opacity-30"
        :id="`delete-user-${user.id}-modal`" tabindex="-1" :aria-labelledby="`delete-user-${user.id}-modal-label`"
        aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-2xl outline-none text-current">
                <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 bg-white rounded-t-2xl">
                    <h5 class="text-xl leading-5 font-bold" :id="`delete-user-${user.id}-modal-label`">
                        Deletar usuário?
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="submit">
                    <div class="modal-body relative py-8 px-4">
                        <div class="text-center text-5xl mb-6">
                            <div class="text-red-500">
                                <FontAwesomeIcon icon="warning" />
                            </div>
                        </div>
                        <p class="text-center">
                            Você está prestes a deletar o usuário <strong>{{ user.name }}</strong>. <br>
                            Tem certeza que deseja deletar?
                        </p>
                    </div>
                    <div class="modal-footer flex gap-3 items-center justify-end p-4">
                        <button class="btn btn-sm btn-red" type="submit">
                            <FontAwesomeIcon icon="trash" />
                            <span class="text-sm">
                                Deletar
                            </span>
                        </button>
                        <button class="btn btn-sm btn-gray" data-bs-dismiss="modal" type="button">
                            <FontAwesomeIcon icon="cancel" />
                            <span class="text-sm">
                                Cancelar
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    props: {
        user: Object
    },
    setup() {
        let form = useForm();

        return {
            form
        };
    },
    methods: {
        submit() {
            const appUrl = this.$page.props.appUrl;
            const url = new URL(`admin/users/${this.user.id}`, appUrl);
            this.form.delete(url.toString(), {
                onSuccess: () => {
                    document.querySelector('[aria-modal="true"] .btn-close').click()
                }
            });
        }
    }
};
</script>
