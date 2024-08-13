<template>
    <Head title="" />
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                
            </h2>
        </template>
        <div class="py-2">
            <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="submit">
                            <table class="w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50 dark:bg-gray-900">
                                    <tr>
                                        <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            Producto
                                        </th>
                                        <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            Descripción
                                        </th>
                                        <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            Precio
                                        </th>
                                        <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            Categoría
                                        </th>
                                        <th scope="col" class="px-2 py-2 text-left text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            Ubicación
                                        </th>
                                        <th scope="col" class="relative py-2 text-left"></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div class="col-span-6 sm:col-span-3 px-1 pb-1">
                                                <InputText type="text" v-model="value" />
                                            </div>
                                        </th>
                                        <th>
                                            <div class="col-span-6 sm:col-span-3 px-1 pb-1">
                                                <InputText type="text" v-model="value" />
                                            </div>
                                        </th>
                                        <th>
                                            <div class="col-span-6 sm:col-span-3 px-1 pb-1">
                                                <InputText type="text" v-model="value" />
                                            </div>
                                        </th>
                                        <th>
                                            <div class="col-span-6 sm:col-span-3 px-1 pb-1">
                                                <InputText type="text" v-model="value" />
                                            </div>
                                        </th>
                                        <th>
                                            <div class="col-span-6 sm:col-span-3 px-1 pb-1">
                                                <InputText type="text" v-model="value" />
                                            </div>
                                        </th>
                                        <th class="text-left">
                                                <span class="isolate inline-flex rounded-md shadow-sm">
                                                    <Link
                                                        type="button"
                                                        class="relative inline-flex items-center rounded-l-md border-transparent bg-indigo-600 px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-600 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                        title="crear producto"
                                                        :href="route('productos.create')"
                                                        >
                                                        <i class="pi pi-plus" style="font-size: 1rem"></i>
                                                    </Link>
                                                    <button
                                                        type="submit"
                                                        class="relative -ml-px inline-flex items-center border-transparent bg-indigo-600 px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-600 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                                        title="buscar"
                                                    >
                                                        <i class="pi pi-search" style="font-size: 1rem"></i>
                                                    </button>
                                                    <Link
                                                        type="button"
                                                        class="relative -ml-px inline-flex items-center rounded-r-md border-transparent bg-yellow-500 py-2 px-2 text-sm font-medium text-black shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2"
                                                        title="quitar filtro"
                                                        >
                                                        <!-- :href="route('')" -->
                                                        <i class="pi pi-search" style="font-size: 1rem"></i>
                                                    </Link>
                                                </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800">
                                    <tr
                                        
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                    >
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900 dark:text-gray-100"></td>
                                        <td>
                                            <span class="isolate inline-flex rounded-md shadow-sm">
                                                <Link
                                                    type="button"
                                                    class="relative inline-flex items-center rounded-l-md border-transparent bg-gray-500 px-2 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:z-10 focus:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                                    title="editar"
                                                    >
                                                    <!-- :href="route('', )" -->
                                                    <PencilSquareIcon class="h-4 w-4" aria-hidden="true"/>
                                                </Link>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div>
                            <!-- <button @click="callTest2">Call Test2</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<script setup>
    import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
    import { Head, Link } from "@inertiajs/vue3"
    import InputText from 'primevue/inputtext';
    import 'primeicons/primeicons.css'
    // import test from '@/Pages/Productos/Composables/test'

    // Llamada a la función 'test' importada desde 'Composables/test'
    // const { test2 } = test(); 
    // Desestructurando el objeto para obtener 'test2'

    // Función para manejar el clic del botón
    // const callTest2 = () => {
    //     test2(); 
        // Llama a la función 'test2'
    // }
</script>