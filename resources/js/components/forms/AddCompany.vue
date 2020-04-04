<template>
  <div class="container" id="editVehicle">
    <div class="row">
      <div class="col">
        <div id="desc_form">
          <div class="container">
            <div class="row justify-content-between">
                <h3 class="text-left"  v-if="this.cliente.id==null"><i class="fas fa-user"></i>Agregar Cliente</h3>
                <h3 class="text-left"  v-else-if="this.onlyshow=='disabled'"><i class="fas fa-user"></i>Detalle del Cliente</h3>
                <h3 class="text-left"  v-else><i class="fas fa-user"></i>Editar Cliente</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md">
        <label for="empresa">Nombre de la empresa</label>
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
      <div class="col-md">
        <label for="series">RFC</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="rfc" v-model="cliente.rfc" disabled>
        <input v-else type="text" class="form-control" id="rfc" v-model="cliente.rfc">
      </div>
  </div>
    <div iv class="row lpad">
      <div class="col-md">
        <label for="series">Nombre de Contacto</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="nameContact" v-model="cliente.contact" disabled>
        <input v-else type="text" class="form-control" id="nameContact" v-model="cliente.contact">
      </div>
      <div class="col-md">
        <label for="placa2">Telefono</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="cellphone" v-model="cliente.cellphone" disabled>
        <input v-else type="text" class="form-control" id="cellphone" v-model="cliente.cellphone">
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md">
        <label for="capacidad">Direccion</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="address" v-model="cliente.address" disabled>
        <input v-else type="text" class="form-control" id="address" v-model="cliente.address">
      </div>
      <div class="col-md">
        <label for="motor1">Municipio</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="municipality" v-model="cliente.municipality" disabled>
        <input v-else type="text" class="form-control" id="municipality" v-model="cliente.municipality">
      </div>
      <div class="col-md">
        <label for="ejes">Estado</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="state" v-model="cliente.state" disabled>
        <input v-else type="text" class="form-control" id="state" v-model="cliente.state">
      </div>
      <div class="col-md">
        <label for="serv">Codigo Postal</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="cp" v-model="cliente.cp" disabled>
        <input v-else type="text" class="form-control" id="cp" v-model="cliente.cp">
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
        nombre: "emp",
        correro: "",
        telefono: "",
        direccion: ""
      },
      clientes:[],
      smotor: [],
      sejes: [],
      sserv: []
    };
  },
  props: {
    data: Object,
    onlyshow: String
  },
  created() {
    this.cliente = Object.assign({}, this.data);

  },
  methods:{
      save(){
          if (this.cliente.id==null) {
              axios
                .post("/customers", {
                  name: this.cliente.name,
                  email: this.cliente.email,
                  rfc: this.cliente.rfc,
                  cellphone: this.cliente.cellphone,
                  contact: this.cliente.contact,
                  address: this.cliente.address,
                  municipality: this.cliente.municipality,
                  state: this.cliente.state,
                  cp: this.cliente.cp
                })
                .then(function(res) {
                        var ruta = '/customers/';
                        location.href=ruta;
                })
                .catch(function(err) {
                  console.log(err);
                });
          }else {
              axios
                .put("/customers/" + this.cliente.id, {
                    name: this.cliente.name,
                    company_id: this.cliente.company_id,
                    email: this.cliente.email,
                    rfc: this.cliente.rfc,
                    cellphone: this.cliente.cellphone,
                    contact: this.cliente.contact,
                    address: this.cliente.address,
                    municipality: this.cliente.municipality,
                    state: this.cliente.state,
                    cp: this.cliente.cp,
                    user_id: this.cliente.user_id
                })
                .then(function(res) {
                    var ruta = '/customers/';
                    location.href=ruta;
                })
                .catch(function(err) {
                  console.log(err);
                });
          }
      },
      cancel(){
          var back = '/customers';
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
