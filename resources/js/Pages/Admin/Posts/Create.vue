<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';


const form = useForm({
    title: '',
});
</script>

<template>
    <Head title="Create New Post" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
               <Link
                    :href="route('posts.index')"
                    class="px-3 py-2 bg-indigo-500 hover:bg-indigo-700 text-white font-semibold rounded"
                >
                    Back
                </Link>
            </div>

            <div class="mt-6 max-w-md mx-auto bg-slate-100 shadow-lg rounded-lg p-6">
                <h1 class="text-xl2 p4">Create New Post</h1>
                <form @submit.prevent="form.post(route('posts.store'))">
                    <div class="mt-4">
                        <InputLabel for="title" value="Title" />

                        <TextInput
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div class="flex items-center mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Create
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
