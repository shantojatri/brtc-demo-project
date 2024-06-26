<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, router } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

defineProps({
    users: Object,
});

const toast = useToast();

const DeleteUser = (userId) => {
    if (confirm("Confirm delete this user!")) {
        // toast.success('User Deleted successfully');
        router.delete(route("users.destroy", userId), {
        onSuccess: () => toast.success('User deleted successfully'),
    });
    }
};
</script>

<template>
    <Head title="User List" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User List
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between px-6 pt-5">
                        <div class="text-gray-900">All User List</div>
                        <Link
                            :href="route('users.create')"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2"
                            >Add New</Link
                        >
                    </div>

                    <!-- Table  -->
                    <div
                        class="relative overflow-x-auto shadow-md sm:rounded-lg p-2 m-5 border border-gray-300"
                    >
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50"
                            >
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input
                                                id="checkbox-all-search"
                                                type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                            />
                                            <label
                                                for="checkbox-all-search"
                                                class="sr-only"
                                                >checkbox</label
                                            >
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Phone</th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="user in users.data"
                                    :key="users.id"
                                    class="bg-white border-b hover:bg-gray-50"
                                >
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input
                                                id="checkbox-table-search-1"
                                                type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                            />
                                            <label
                                                for="checkbox-table-search-1"
                                                class="sr-only"
                                                >checkbox</label
                                            >
                                        </div>
                                    </td>
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ user.name }}
                                    </th>
                                    <td class="px-6 py-4">{{ user.email }}</td>
                                    <td class="px-6 py-4">{{ user.phone }}</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-xs font-medium me-2 px-2.5 py-0.5 rounded"
                                            :class="
                                                user.status === 'active'
                                                    ? 'bg-green-100 text-green-800'
                                                    : 'bg-red-100 text-red-800'
                                            "
                                        >
                                            {{ user.status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-xs font-medium me-2 px-2.5 py-0.5 rounded"
                                            :class="
                                                user.role === 'admin'
                                                    ? 'bg-pink-100 text-pink-800'
                                                    : 'bg-yellow-100 text-yellow-800'
                                            "
                                        >
                                            {{ user.role }}
                                        </span>
                                    </td>
                                    <td class="flex items-center px-6 py-4">
                                        <Link
                                            :href="route('users.edit', user.id)"
                                            class="font-medium text-blue-600 hover:underline"
                                        >
                                            Edit
                                        </Link>

                                        <button
                                            @click="DeleteUser(user.id)"
                                            class="font-medium text-red-600 hover:underline ms-3"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
