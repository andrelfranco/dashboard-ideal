<template>
    <Dashboard title="Usuários">
        <template v-slot:header-tools>
            <Link :href="`/admin/users/create`" class="btn btn-sm btn-white">Cadastrar</Link>
        </template>
        <TableCard title="Usuários" :heads="['Nome', 'E-mail', 'Criado em:', '']" :data="users">
            <tr v-for="user in users.data">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.human_created_at }}</td>
                <td class="flex items-center gap-2 text-gray-400">
                    <Link :href="`/admin/users/${user.id}/edit`" class="hover:text-gray-500">
                    <FontAwesomeIcon icon="user-edit" />
                    </Link>
                    <button class="hover:text-red-600" type="button" data-bs-toggle="modal"
                        :data-bs-target="`#delete-user-${user.id}-modal`">
                        <FontAwesomeIcon icon="trash" />
                    </button>
                </td>
            </tr>
        </TableCard>
        <div v-for="user in users.data">
            <DeleteModal :user="user" />
        </div>
    </Dashboard>
</template>

<script>
import Dashboard from '@/js/Layouts/Dashboard/Dashboard.vue';
import { TableCard } from '@/js/Layouts/Dashboard/Components';
import DeleteModal from './DeleteModal.vue';

export default {
    components: {
        Dashboard,
        TableCard,
        DeleteModal
    },
    props: {
        users: Object
    }
};
</script>
