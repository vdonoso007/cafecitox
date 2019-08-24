<template>
    <transition name="bounce">
        <div v-if="show" style="display:flex; justify-content:center;">
            <div class="card" style="width: 40rem;">
                <img src="img_capture.png" class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title">{{ product==null?'':product.title }}</h5>
                    <p class="card-text">{{ product==null?'':product.description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><input type="text" name="title" class="form-control" placeholder="Ingrese un titulo" v-model="product.title" /></li>
                    <li class="list-group-item"><input type="text" name="name" class="form-control" placeholder="Ingrese un nombre" v-model="product.name" /></li>
                    <li class="list-group-item">
                        <select v-model="product.group_id" class="form-control">
                            <option value="one" selected>Please select one</option>
                            <option v-for="group in groups" v-bind:value="group.group_id">{{group.name}}</option>
                        </select>
                    </li>
                    <li class="list-group-item"><textarea class="form-control" placeholder="Ingrese una descripcion" v-model="product.description" ></textarea></li>
                    <li class="list-group-item"><input type="text" name="price" class="form-control" placeholder="Ingrese el precio" v-model="product.price" /></li>
                    <li class="list-group-item"><input type="text" name="stock" class="form-control" placeholder="Ingrese el stock a despachar" v-model="product.stock" /></li>
                </ul>
                <div class="card-body">
                    <button v-on:click="createProduct()" class="btn btn-primary">Guardar</button>
                    <button v-on:click="hide()" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    module.exports = {
        props: ['editproduct'],
        data(){
            return  {
                groups: [],
                product: this.editproduct,
                uri: "",
                show: true
            }
        },
        mounted(){
            this.init();
        },
        methods: {
            init(){
                axios.get('/api/groups').then((response) => {
                    this.groups = response.data;
                });
            },
            createProduct(){

                const params = {
                    title: this.product.title,
                    name: this.product.name,
                    description: this.product.description,
                    price: this.product.price,
                    stock: this.product.stock,
                    group: this.product.group_id,
                    image: 'uno.png'
                };

                if (this.product.hasOwnProperty('id'))
                {
                    axios.put('api/products/' + this.product.id, params).then((response) => {
                        this.$emit('updated', response.data);
                    });
                }
                else {
                    axios.post('api/products', params).then((response) => {
                        this.$emit('created', response.data);
                    });
                }
            },
            hide(){
                this.show=false;
                this.$emit('hideform', false);
            }

        }
    }
</script>