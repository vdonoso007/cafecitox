<template>

    <tr>
        <td scope="row">
                <input v-if="editMode" type="text" class="form-control" v-model="item.title" > </input>
                <p class="text-left" v-else> {{ item.title }} </p> 
        </td>
        <td scope="row">
                <input v-if="editMode" type="text" class="form-control" v-model="item.name" > </input>
                <p class="text-left" v-else> {{ item.name }} </p class="text-left"> 
        </td>
        <td scope="row">
                <input v-if="editMode" type="text" class="form-control" v-model="item.price" > </input>
                <p class="text-left" v-else> {{ item.price }} </p class="text-left"> 
        </td>
        <td scope="row">
                <input v-if="editMode" type="text" class="form-control" v-model="item.stock" > </input>
                <p class="text-left" v-else> {{ item.stock }} </p class="text-left"> 
        </td>
    
        <td v-on:click="updateProduct()" v-if="editMode" class="cursor-custom"><a><span class="fa fa-eye" aria-hidden="true"></span>&nbsp;<small>Guardar Cambios</small></a></td>
    
        <td v-on:click="editProduct()" v-else class="cursor-custom"><a><span class="fa fa-eye" aria-hidden="true"></span>&nbsp;<small>Editar</small></a></td>
        
        <td id="deleteBtn" v-on:click="deleteProduct()" class="cursor-custom"><span class="fa fa-times" aria-hidden="true"></span>&nbsp;<small>    Eliminar</small></td>
            
    </tr>

</template>

<script>
    module.exports = {
        props: ['item'],
        data() {
            return {
                editMode: false
            }
        },
        mounted() {
            console.log('cargado componente productos');
        },
        methods: {
            updateProduct(){

            },
            editProduct(){

            },
            deleteProduct(){

            }
        }
    }
</script>