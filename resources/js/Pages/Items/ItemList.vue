<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import useItems from '../../Composables/items.js';
import { onMounted } from 'vue';

const { items, getItems, getItem } = useItems()

onMounted(() => {
    getItems()
})
</script>
<template>
    <Head title="Items" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Items</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table-fixed border-collapse border border-slate-500">
                      <thead>
                        <tr>
                          <th class="border border-slate-600 ...">Name</th>
                          <th class="border border-slate-600 ...">Description</th>
                          <th class="border border-slate-600 ..."></th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in items" :key="item.id">
                          <td class="border border-slate-700 ...">{{ item.name }}</td>
                          <td class="border border-slate-700 ...">{{ item.description }}</td>
                          <td class="border border-slate-700 ...">
                            <!-- <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                              View
                            </button> -->
                            <a :href="route('items.view', item.id)">
                                View
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
