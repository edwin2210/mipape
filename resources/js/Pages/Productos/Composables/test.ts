// test.ts
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue'

const test = ( props ) => {

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


// function calculaPrecio(){
// let ganacia = FormCreate.value.costo*(FormCreate.value.porcentaje/100)/FormCreate.value.cantidad;
// FormCreate.value.ganancia = ganacia;
// FormCreate.value.precio = (parseFloat(FormCreate.value.costoUnitario) + parseFloat(FormCreate.value.ganancia))
// FormCreate.value.gananciaPesos=
// FormCreate.value.gananciaTotal=FormCreate.value.ganancia*FormCreate.value.cantidad;
// calculaCostoUnitario();
// }

// function calculaCostoUnitario(){
// FormCreate.value.costoUnitario=FormCreate.value.costo/FormCreate.value.cantidad
// calculaPrecio()
// }

// function calculaGanancia(){
// FormCreate.value.porcentaje=((FormCreate.value.precio*100)/FormCreate.value.costoUnitario)-100;
// calculaPrecio();
// }

// function lipiar(){
// FormCreate.value.costo = 0;
// FormCreate.value.cantidad = 1;
// FormCreate.value.costoUnitario = 0;
// FormCreate.value.precio = 0;
// FormCreate.value.porcentaje = 20;
// FormCreate.value.ganancia = 0;
// FormCreate.value.gananciaTotal = 0;
// }

const submitform = () => {
    let url = new URL(route('producto.store'))
    // const params = {
    // docente_id: props.docente_id
    // }
    // for (let k in params) {
    //     url.searchParams.append(k, params[k]);
    // }
    const response = fetch(url, {
        method: 'POST'
        , body: JSON.stringify( FormCreate.value )
        , headers: {
            'Authorization': 'Bearer '+props.token
            , 'Content-type': 'application/json; charset=UTF-8'
        },
    })
    response
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            
            if (data.success) {   

            }
            if (data.error) {

            }
            if(data.errors){

            }                                 
        })
        .catch((error) => {
            console.log(error)                
        })
    }




    return{
        categorias
    ,   ubicaciones
    ,   marcas
    ,   FormCreate
    ,   submitform
    }
}
export default test;
