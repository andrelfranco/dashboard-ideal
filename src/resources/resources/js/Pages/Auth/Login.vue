<template>
    <div class="flex h-screen">
        <div class="flex lg:w-5/12 items-center justify-center">
            <div class="lg:w-7/12">
                <form @submit.prevent="submit">
                    <div class="flex flex-col gap-6">
                        <h1 class="text-4xl font-bold">Entre com sua conta</h1>

                        <div class="flex flex-col gap-2">
                            <label for="">E-mail</label>
                            <input v-model="form.email" type="text" placeholder="Digite seu e-mail"
                                class="w-100 border focus:outline-none focus:border-indigo-500 rounded-md py-2 px-3">
                            <p v-if="form.errors.email" v-text="form.errors.email" class="text-sm text-red-600"></p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="">Senha</label>
                            <input v-model="form.password" type="password" placeholder="Digite seu e-mail"
                                class="w-100 border focus:outline-none focus:border-indigo-500 rounded-md py-2 px-3">
                            <p v-if="form.errors.password" v-text="form.errors.password" class="text-sm text-red-600"></p>
                        </div>

                        <button
                            class="w-full bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 rounded-md py-2 text-white font-bold"
                            type="submit">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="lg:w-7/12">
            <div class="w-full h-full">
                <img :src="loginImage" class="object-cover h-full w-full">
            </div>
        </div>
    </div>
</template>
<script>
import { loginImage } from '@/js/config/login.js';

export default {
    data() {
        return {
            loginImage
        }
    }
}
</script>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    email: '',
    password: ''
});

const submit = () => {
    form.post('/login');
};
</script>
