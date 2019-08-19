<template>
        <div style="display:flex; justify-content:center;">
            <div class="card" style="width: 40rem;">
                <img src="img_capture.png" class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title">{{title}}</h5>
                    <p class="card-text">{{description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><input type="text" name="title" class="form-control" placeholder="Ingrese un titulo" v-model="title" /></li>
                    <li class="list-group-item"><input type="text" name="name" class="form-control" placeholder="Ingrese un nombre" v-model="name" /></li>
                    <li class="list-group-item">
                        <select v-model="group" class="form-control">
                            <option value="one" selected>Please select one</option>
                            <option v-for="group in groups" v-bind:value="group.id">{{group.name}}</option>
                        </select>
                    </li>
                    <li class="list-group-item"><textarea class="form-control" placeholder="Ingrese una descripcion" v-model="description" ></textarea></li>
                    <li class="list-group-item"><input type="text" name="price" class="form-control" placeholder="Ingrese el precio" v-model="price" /></li>
                    <li class="list-group-item"><input type="text" name="stock" class="form-control" placeholder="Ingrese el stock a despachar" v-model="stock" /></li>
                </ul>
                <div class="card-body">
                    <button v-on:click="createProduct()" class="btn btn-primary">Guardar</button>
                    <button v-on:click="hide()" class="btn btn-primary">Cancelar</button>
                </div>
            </div>
        </div>

</template>

<script>
    module.exports = {
        data(){
            return {
                id: 0,
                title: '',
                group: 0,
                name: '',
                description: '',
                price: '',
                stock: '',
                image: '',
                groups: []
            }
        },
        mounted(){
            console.log('componente product cargado');
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
                    title: this.title,
                    name: this.name,
                    description: this.description,
                    price: this.price,
                    stock: this.stock,
                    group: this.group,
                    image: 'uno.png'
                };
                axios.post('api/products', params).then((response) => {
                    console.log('ingresado ' + response.data);
                    this.$emit('created', response.data);
                });
            },
            hide(){
                this.$emit('hideform', false);
            }

        }
    }
</script>