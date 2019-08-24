<template>
    <transition name="bounce">
        <tr v-if="show">
            <td scope="row">
                    <p class="text-left"> {{ item.title }} </p> 
            </td>
            <td scope="row">
                    <p class="text-left"> {{ item.name }} </p class="text-left"> 
            </td>
            <td scope="row">
                    <p class="text-left"> {{ item.price }} </p class="text-left"> 
            </td>
            <td scope="row">
                    <p class="text-left"> {{ item.stock }} </p class="text-left"> 
            </td>
        
            <td v-on:click="editProduct()" class="cursor-custom"><a><span class="fa fa-eye" aria-hidden="true"></span>&nbsp;<small>Editar</small></a></td>
            
            <td id="deleteBtn" v-on:click="deleteProduct()" class="cursor-custom"><span class="fa fa-times" aria-hidden="true"></span>&nbsp;<small>    Eliminar</small></td>
                
        </tr>
    </transition>
    
</template>

<script>
    module.exports = {
        props: ['item'],
        watch: {
            item: function(val){
                console.log('esta es ' + val);
            }
        },
        data() {
            return {
                editMode: false,
                show: true
            }
        },
        mounted() {
            console.log('cargado componente productos');
        },
        methods: {
            editProduct(){
                this.$emit('editProduct', this.item);
            },
            deleteProduct(){
                axios.delete('api/products/' + this.item.id).then((response) => {
                    this.$emit('deleteProduct', this.item);
                    this.show=false;
                });
            }
        }
    }
</script>