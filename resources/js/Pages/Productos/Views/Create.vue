<template>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                Crear producto
            </h2>
        </template>

        <div class="py-2">
            <div class="w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-purple-200 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <form @submit.prevent="submitform">
                            
                            <div class="p-4 m-4">
                                <Card>
                                <template #title >
                                        Datos del producto
                                </template>
                                <template #content>
                                    <div class="card flex justify-center">
                                        <FloatLabel class="mt-8 w-3/4">
                                            <label for="username" class="block text-center">Nombre del producto</label>
                                            <InputText type="text" class="w-full" v-model="FormCreate.nombre" />
                                        </FloatLabel>
                                    </div>
                                    <div class="ml-20">
                                        
                                    </div>
                                    <div class="card flex justify-center ">
                                        
                                            <Select 
                                                v-model="FormCreate.marca" 
                                                :options="marcas" 
                                                optionLabel="name" 
                                                placeholder="Seleccione una marca" 
                                                class="w-3/4 mt-4" 
                                            />
                                    </div>
                                    <div class="card flex justify-center">
                                        <FloatLabel class="mt-8 w-3/4">
                                            <label for="username" class="block text-center">Descripción</label>
                                            <Textarea v-model="FormCreate.descripcion" rows="3" cols="30"  class="w-full"/>
                                        </FloatLabel>
                                    </div>
                                    <div class="card flex justify-center">
                                        <FloatLabel class="mt-8 mr-8">
                                            <label for="username">Costo total</label>
                                            <InputText type="number" @input="calculaPrecio" v-model="FormCreate.costo"  />
                                        </FloatLabel>
                                        <FloatLabel class="mt-8 mr-8">
                                            <label for="username">Cantidad</label>
                                            <InputText type="number" @input="calculaCostoUnitario" v-model="FormCreate.cantidad" />
                                        </FloatLabel>
                                        <FloatLabel class="mt-8 mr-8">
                                            <label for="username">Costo unitario</label>
                                            <InputText type="number" v-model="FormCreate.costoUnitario"  />
                                        </FloatLabel>
                                    </div>
                                    <div class="card flex justify-center">
                                        <FloatLabel class="mt-8 ">
                                            <label for="username">Precio de venta</label>
                                            <InputText type="number" @input="calculaGanancia" v-model="FormCreate.precio"  />
                                        </FloatLabel>
                                        <FloatLabel class="mt-8 ml-8">
                                            <label for="username">Porcentaje de ganacia</label>
                                            <InputGroup>
                                                <InputGroupAddon>
                                                        <p>%</p>
                                                </InputGroupAddon>
                                                <InputText type="number" @input="calculaPrecio" v-model="FormCreate.porcentaje" />
                                            </InputGroup>
                                        </FloatLabel>
                                        <FloatLabel class="mt-8 ml-8">
                                            <label for="username">Ganacia en pesos </label>
                                            <InputText type="number" v-model="FormCreate.ganancia" />
                                        </FloatLabel>
                                        <FloatLabel class="mt-8 ml-8">
                                            <label for="username">Ganacia total</label>
                                            <InputText type="number" v-model="FormCreate.gananciaTotal" />
                                        </FloatLabel>
                                    </div>
                                    <div class="card flex justify-center mt-8">
                                        <Select 
                                            v-model="FormCreate.categoria" 
                                            :options="categorias" 
                                            optionLabel="name" 
                                            placeholder="Seleccione una categoría" 
                                            class="w-1/4 mr-10" 
                                        />
                                        <Select 
                                            v-model="FormCreate.ubicacion" 
                                            :options="ubicaciones" 
                                            optionLabel="name" 
                                            placeholder="Seleccione una ubicación" 
                                            class="w-1/4 ml-10" 
                                        />
                                    </div>
                                    <div class="card flex justify-center mt-8 ">
                                        <button type="submit" class="mr-20 text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Guardar</button>
                                        <button type="button" @click="lipiar"  class="mr-20 text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Limpiar</button>
                                        <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Cancelar</button>
                                    </div>
                                </template>
                                </Card>
                            </div>
                        </form>
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
import Card from 'primevue/card';
import 'primeicons/primeicons.css';
import { ref } from 'vue';
import Textarea from 'primevue/textarea';
import FloatLabel from 'primevue/floatlabel';
import Select from 'primevue/select';
import InputGroup from 'primevue/inputgroup';
import InputGroupAddon from 'primevue/inputgroupaddon';





const FormCreate = ref({
        nombre: ''
        , descripcion: ''
        , precio:''
        , costo: ''
        , marca:''
        , categoria: ''
        , ubicacion: ''
        , ganancia: ''
        , porcentaje: '20'
        , cantidad:'1'
        , costoUnitario:''
        , gananciaTotal:''
    });

const categorias = [
  { name: 'Electrónica', code: 'ele' },
  { name: 'Ropa', code: 'rop' },
  { name: 'Alimentos', code: 'ali' }
];

const ubicaciones = [
  { name: 'Almacén A', code: 'almA' },
  { name: 'Almacén B', code: 'almB' },
  { name: 'Almacén C', code: 'almC' }
];
const marcas = [
  { name: 'Papelería X', code: 'papX' },
  { name: 'Papelería Y', code: 'papY' },
  { name: 'Papelería Z', code: 'papZ' },
  { name: 'Papelería A', code: 'papA' },
  { name: 'Papelería B', code: 'papB' },
];


function calculaPrecio(){
    let ganacia = FormCreate.value.costo*(FormCreate.value.porcentaje/100)/FormCreate.value.cantidad;
    FormCreate.value.ganancia = ganacia;
    FormCreate.value.precio = (parseFloat(FormCreate.value.costoUnitario) + parseFloat(FormCreate.value.ganancia))
    FormCreate.value.gananciaPesos=
    FormCreate.value.gananciaTotal=FormCreate.value.ganancia*FormCreate.value.cantidad;
    calculaCostoUnitario();
}

function calculaCostoUnitario(){
    FormCreate.value.costoUnitario=FormCreate.value.costo/FormCreate.value.cantidad
    calculaPrecio()
}

function calculaGanancia(){
    FormCreate.value.porcentaje=((FormCreate.value.precio*100)/FormCreate.value.costoUnitario)-100;
    calculaPrecio();
}

function lipiar(){
    FormCreate.value.costo = 0;
    FormCreate.value.cantidad = 1;
    FormCreate.value.costoUnitario = 0;
    FormCreate.value.precio = 0;
    FormCreate.value.porcentaje = 20;
    FormCreate.value.ganancia = 0;
    FormCreate.value.gananciaTotal = 0;
}
async function submitform () {
        const url = new URL('productos.store', window.location.origin); //debes registrarla en el arvhico de rutas, recuerda revisar el controldor y el metodo respectivo
        //url.searchParams.append('nombre_del_parametro', parametro); //asi agregamos todos los parametros que quieras emter a la URL, NO es necesario que los definas en la ruta
        const options = {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            }
        };
        try {
            const response = await fetch(url, options);
            if (!response.ok) {
                throw new Error(`Error: ${response.status} ${response.statusText}`);
            }
            const data = await response.json();
            if (data.error) {
               // aqui va todo el codigo en caso que responda con un error la peticion
            } else {
                //Si no hay errores aqui manejas lo demas recuerda que los datos accedes con data.campo 
            }
            return data;
        } catch (error) {
            console.log('Error en metodo fetch:', error);
        }
}


</script>