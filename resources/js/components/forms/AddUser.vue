<template>
  <div class="container" id="addUser">
    <div class="row">
      <div class="col">
        <div id="desc_form">
          <div class="container">
            <div class="row justify-content-between">
                <h3 class="text-left"  v-if="this.cliente.id==null"><i class="fas fa-user"></i>Agregar Usuario</h3>
                <h3 class="text-left"  v-else-if="this.onlyshow=='disabled'"><i class="fas fa-user"></i>Detalle del Usuario</h3>
                <h3 class="text-left"  v-else><i class="fas fa-user"></i>Editar Usuario</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md">
        <label for="empresa">Nombre</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="nameCompany" v-model="cliente.name" disabled>
        <input v-else type="text" class="form-control" id="nameCompany" v-model="cliente.name">
      </div>
    </div>

    <div iv class="row lpad">
      <div class="col-md">
        <label for="series">Correo</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="mail" v-model="cliente.email" disabled>
        <input v-else type="text" class="form-control" id="mail" v-model="cliente.email">
      </div>
  </div>

  <div v-show="this.cliente.id==null" class="row lpad">
      <div class="col-md">
        <label for="series">Contraseña</label>
        <input type="text" class="form-control" id="mail" v-model="cliente.password">
        <!-- <input v-else type="password" class="form-control" id="mail" v-model="cliente.email"> -->
      </div>
      <div class="col-md">
        <label for="series">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="password" v-model="cliente.confirmPass">
        <!-- <input v-else type="password" class="form-control" id="mail" v-model="cliente.email"> -->
      </div>
  </div>
    <div iv class="row justify-content-center">
      <div class="col-md-4">
        <button v-if="this.onlyshow!='disabled'" @click="save()" class="btn btn-outline-primary btn-md btn-guardar">Guardar</button>
        <button class="btn btn-outline-danger btn-md btn-guardar" @click="cancel()">Cancelar</button>
      </div>
    </div>
  </div>
</template>

<script>
import EvenBus from "../../even-bus";
import swal from 'sweetalert';
export default {
  data() {
    return {
      cliente: {
        id:null,
        nombre: "",
        correo: "",
        telefono: "",
        direccion: ""
      },
    };
  },
  props: {
    data: Object,
    onlyshow: String
  },
  created() {
    this.cliente = Object.assign({}, this.data);
    /*if (this.cliente != null) {
        this.cliente.user_id = this.cliente;
    }*/
  },
  methods:{
      save(){
          if (this.cliente.id==null) {
              axios
                .post("/users", {
                  name: this.cliente.name,
                  password: this.cliente.password,
                  email: this.cliente.email
                })
                .then(function(res) {
                        var ruta = '/users';
                        location.href=ruta;
                })
                .catch(function(err) {
                  console.log(err);
                });
          }else {
              axios
                .put("/users/" + this.cliente.id, {
                    email: this.cliente.email,
                    name: this.cliente.name
                })
                .then(function(res) {
                    var ruta = '/users';
                    location.href=ruta;
                })
                .catch(function(err) {
                  console.log(err);
                });
          }
      },
      cancel(){
          var back = '/users';
          location.href=back;
      }
  }
};
</script>

<style scope>
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.btn-guardar {

  margin-top: 5%;
}
.lpad {
  padding-top: 4%;
  text-align: left;
  padding-left: 4%;
}
</style>
