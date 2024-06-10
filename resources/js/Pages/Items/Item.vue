<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import useItems from '../../Composables/items.js';
import { onMounted } from 'vue';

const { items, getItem } = useItems()

onMounted(() => {
    getItem(props.id)
})

const props = defineProps({
    id: {
        type: Boolean,
    },
});
</script>

<template>
  <AuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Item {{  id }}</h2>
      </template>
      <section>
           <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                  <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form  class="mt-6 space-y-6">
                        <div>
                            <InputLabel for="name" value="Name" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="items.name"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <InputError class="mt-2" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="items.description"
                                required
                                autocomplete="username"
                            />

                            <InputError class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <PrimaryButton>Save</PrimaryButton>

                            <Transition
                                enter-active-class="transition ease-in-out"
                                enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out"
                                leave-to-class="opacity-0"
                            >
                            </Transition>
                        </div>
                    </form>
                  </div>
                </div>
            </div>

      </section>
  </AuthenticatedLayout>
</template>
