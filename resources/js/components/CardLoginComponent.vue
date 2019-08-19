<template>
    <div class="card" style="width: 18rem;">

        <div style="display: flex;justify-content:center;padding:16px;">
            <img src="login.png" style="height: 70%;width: 70%;" 
                class="card-img-top img-fluid" >
        </div>

        <div class="card-body">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" v-model="user" class="form-control" placeholder="Ingrese su usuario" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-key"></i></span>
                </div>
                <input type="password" v-model="password" class="form-control" placeholder="Ingrese su contraseña" aria-label="Contrasena" aria-describedby="basic-addon1">
            </div>

            <a v-on:click.prevent="login()" class="btn btn-primary">
                <span class="text-white">Ingresar</span>
            </a>
        </div>    

    </div>
</template>

<script>
    module.exports = {
        data() {
            return {
                'user': '',
                'password': ''
            }
        },
        mounted() {

            console.log('levantado');
        },
        methods: {

            login(){
                const params = {
                    user: this.user,
                    password: this.password
                };
                axios.post('/api/access', params).then((response) => {
                    if (response.data.acceso){
                        //redireccionar al home
                        window.location.href = 'product';
                    }
                    else{
                        alert(response.data.msg);
                    }
                });
            }

        }
    }
</script>