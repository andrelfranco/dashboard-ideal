<template>
    <div class="flex flex-col gap-2">
        <label :for="name">{{ label }}</label>
        <input v-model="form[name]" type="text" :placeholder="placeholder"
            class="w-100 border focus:outline-none focus:border-indigo-500 rounded-md py-2 px-3">
        <p v-if="form.errors[name]" v-text="form.errors[name]" class="text-sm text-red-600"></p>
    </div>
</template>

<script>
export default {
    props: {
        label: String,
        name: String,
        placeholder: String,
        form: Object,
        value: String
    }
}
</script>
