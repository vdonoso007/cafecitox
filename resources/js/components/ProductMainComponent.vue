<template>
    <div>

        <div class="row justify-content-between " style="padding: 32px;">
            <div class="col-5">
                <h2>Administración de Productos</h2>
                <hr>
                <br>
            </div>
            <div class="col-2">
                <br>
                <button v-on:click.prevent="showProductForm()" class="btn btn-primary">{{ show?'Voler al listado':'Crear Producto' }}</button>
            </div>
        </div>

        <div class="row" style="padding: 32px;">
            <div class="col-lg-12">
                <transition name="bounce">
                    <product-component :editproduct="itemtomodify" v-if="show" @created="productCreated" @hideform="hideCreateForm" ></product-component>
                
                <div v-else class="table-responsive-lg">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Stock</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
        
                            <tbody>
                                <products-component @deleteProduct="deleteProduct" @editProduct="editProduct" v-for="product in products" :key="product.id" :item="product" ></products-component>
                            </tbody>
                        </table>
                </div>
                </transition>
                                
            </div>
        </div>
    </div>
</template>

<script>

module.exports = {

        data() {
            return {
                welcome: 'Bievenidos al mantenimiento de productos',
                show: false,
                products: [],
                itemtomodify: {}
            }
        },
        mounted() {
            console.log('cargado componente producto');
            this.init();
        },
        methods: {
            init(){
                axios.get('/api/products').then((response) => {
                    this.products = response.data;
                });
            },
            showProductForm(){
                this.itemtomodify = {
                    title: '',
                    group_id: 0,
                    name: '',
                    description: '',
                    price: '',
                    stock: '',
                    image: ''
                };
                this.show = !this.show;
            },
            hideCreateForm(flag){
                this.show = flag;
            },
            productCreated(productItem){
                this.products.unshift(productItem);
                this.showProductForm();
            },
            editProduct(item){
                this.itemtomodify = item;
                this.show = !this.show;
            },
            deleteProduct(item){
                var i = this.products.indexOf(item);
                this.products.splice(i, 1);
            }
        }
    }
</script>