<script setup>
import { reactive } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router, Link } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";

const props = defineProps({
    user: Object,
});

const toast = useToast();

const userParams = reactive({
    name: props.user.data.name,
    email: props.user.data.email,
    phone: props.user.data.phone,
    status: props.user.data.status,
    role: props.user.data.role,
    password: null,
    password_confirmation: null,
});

function createUserHandler() {
    toast.success('User updated successfully');
    router.put(route("users.update", props.user.data.id), userParams);
}
</script>

<template>
    <Head title="Edit User" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit User
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center justify-between px-6 pt-5">
                        <div class="text-gray-900">Edit User</div>
                        <Link
                            :href="route('users.index')"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2"
                            >Back</Link
                        >
                    </div>

                    <form
                        @submit.prevent="createUserHandler"
                        class="shadow-md sm:rounded-lg p-2 m-5 border border-gray-300"
                    >
                        <div class="p-4">
                            <div class="mb-2">
                                <label
                                    for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Name</label
                                >
                                <input
                                    v-model="userParams.name"
                                    type="text"
                                    id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John Doe"
                                />
                                <p
                                    v-if="$page.props.errors.name"
                                    class="mt-1 text-sm text-red-600 dark:text-red-500"
                                >
                                    {{ $page.props.errors.name }}
                                </p>
                            </div>

                            <div class="mb-2">
                                <label
                                    for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Email</label
                                >
                                <input
                                    v-model="userParams.email"
                                    type="email"
                                    id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="johndoe@example.com"
                                />
                                <p
                                    v-if="$page.props.errors.email"
                                    class="mt-1 text-sm text-red-600 dark:text-red-500"
                                >
                                    {{ $page.props.errors.email }}
                                </p>
                            </div>

                            <div class="mb-2">
                                <label
                                    for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Phone</label
                                >
                                <input
                                    v-model="userParams.phone"
                                    type="tel"
                                    id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="01XXX-XXXXXX"
                                />
                                <p
                                    v-if="$page.props.errors.phone"
                                    class="mt-1 text-sm text-red-600 dark:text-red-500"
                                >
                                    {{ $page.props.errors.phone }}
                                </p>
                            </div>

                            <div class="mb-2">
                                <label
                                    for="role"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Select a role</label
                                >
                                <select
                                    v-model="userParams.role"
                                    id="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                    <option selected>Choose a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <p
                                    v-if="$page.props.errors.role"
                                    class="mt-1 text-sm text-red-600 dark:text-red-500"
                                >
                                    {{ $page.props.errors.role }}
                                </p>
                            </div>

                            <div class="mb-2">
                                <label
                                    for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Select a status</label
                                >
                                <select
                                    v-model="userParams.status"
                                    id="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                >
                                    <option selected>Choose a status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <p
                                    v-if="$page.props.errors.status"
                                    class="mt-1 text-sm text-red-600 dark:text-red-500"
                                >
                                    {{ $page.props.errors.status }}
                                </p>
                            </div>

                            <div class="mb-2">
                                <label
                                    for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Password</label
                                >
                                <input
                                    v-model="userParams.password"
                                    type="password"
                                    id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Enter your password"
                                />
                                <p
                                    v-if="$page.props.errors.password"
                                    class="mt-1 text-sm text-red-600 dark:text-red-500"
                                >
                                    {{ $page.props.errors.password }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <label
                                    for="confirm_password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    >Confirm password</label
                                >
                                <input
                                    v-model="userParams.password_confirmation"
                                    type="password"
                                    id="confirm_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Confirm your password"
                                />
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
