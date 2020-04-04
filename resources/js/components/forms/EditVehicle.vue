<template>
  <div class="container" id="editVehicle">
      <div class="row align-items-start">
         <div class="col-3">
              <h4 @click='goBack()' style="color: #023297;"><i class="fas fa-chevron-left"></i>Vehiculos</h4>
          </div>
      </div>
    <div class="row">
      <div class="col">
        <div id="desc_form">
          <div class="container">
            <div class="row justify-content-between">
                <h3 class="text-left"  v-if="this.vehicle.id==null"><i class="fas fa-car"></i>Agregar Vehiculo</h3>
                <h3 class="text-left"  v-else-if="this.onlyshow=='disabled'"><i class="fas fa-car"></i>Detalle del Vehiculo</h3>
                <h3 class="text-left"  v-else><i class="fas fa-car"></i>Editar Vehiculo</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Columna1/3-->
    <div iv class="row lpad">
      <div class="col-md-4">
        <label for="empresa">Empresa</label>
        <!-- <select disabled class="form-control" id="serv" v-model="vehicle.user_id">
          <option v-for="cliente in suser" v-bind:value="cliente.id">{{ cliente.name }}</option>
        </select> -->
        <input disabled type="text" class="form-control" id="brand" v-model="suser.name">
      </div>
      <div class="col-md-4">
        <label for="brand">Marca</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="brand" v-model="vehicle.brand" disabled>
        <input v-else type="text" class="form-control" id="brand" v-model="vehicle.brand">
      </div>
      <div class="col-md-4">
        <label for="model">Modelo</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="model" v-model="vehicle.model" disabled>
        <input v-else type="text" class="form-control" id="model" v-model="vehicle.model">
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md-4">
        <label for="series">Serie</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="series" v-model="vehicle.series" disabled>
        <input v-else type="text" class="form-control" id="series" v-model="vehicle.series">
      </div>
      <div class="col-md-4">
        <label for="placa2">Placa</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="placa2" v-model="vehicle.plate_number" disabled>
        <input v-else type="text" class="form-control" id="placa2" v-model="vehicle.plate_number">
      </div>
      <div class="col-md-4">
        <label for="tcirc">T.Circulacion</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="tcirc" v-model="vehicle.folio_circulation" disabled>
        <input v-else type="text" class="form-control" id="tcirc" v-model="vehicle.folio_circulation">
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md">
        <label for="capacidad">Capacidad</label>
        <input v-if="this.onlyshow=='disabled'" type="text" class="form-control" id="capacidad" v-model="vehicle.capacity" disabled>
        <input v-else type="text" class="form-control" id="capacidad" v-model="vehicle.capacity">
      </div>
      <div class="col-md">
        <label for="motor1">Motor</label>
        <select v-if="this.onlyshow=='disabled'" class="form-control" id="motor1" v-model="vehicle.engine_id" disabled>
          <option v-for="moto in smotor" v-bind:value="moto.id">{{ moto.name }}</option>
        </select>
        <select v-else class="form-control" id="motor1" v-model="vehicle.engine_id">
          <option v-for="moto in smotor" v-bind:value="moto.id">{{ moto.name }}</option>
        </select>
      </div>
      <div class="col-md">
        <label for="ejes">Ejes</label>
        <select v-if="this.onlyshow=='disabled'"  disabled class="form-control" id="ejes" v-model="vehicle.axes_id">
          <option v-for="eje in sejes" v-bind:value="eje.id">{{ eje.name }}</option>
        </select>
        <select v-else class="form-control" id="ejes" v-model="vehicle.axes_id">
          <option v-for="eje in sejes" v-bind:value="eje.id">{{ eje.name }}</option>
        </select>
      </div>
      <div class="col-md">
        <label for="serv">Servicios</label>
        <select v-if="this.onlyshow=='disabled'" disabled class="form-control" id="serv" v-model="vehicle.service_id">
          <option v-for="serv in sserv" v-bind:value="serv.id">{{ serv.name }}</option>
        </select>
        <select v-else class="form-control" id="serv" v-model="vehicle.service_id">
          <option v-for="serv in sserv" v-bind:value="serv.id">{{ serv.name }}</option>
        </select>
      </div>
    </div>
    <div iv class="row justify-content-center">
      <div class="col-md-4">
        <button v-if="this.onlyshow!='disabled'" @click="save()" class="btn btn-outline-primary btn-md btn-guardar">Guardar</button>
        <button class="btn btn-outline-danger btn-md btn-guardar" @click="goBack()">Cancelar</button>
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
      vehicle: {
        backRuta: 'showVehicles/5',
        id:null,
        empresa: "emp",
        brand: "",
        model: "",
        series: "",
        plate_number: "",
        folio_circulation: "",
        capacity: "",
        user_id:"",
        engine_id: "",
        axes_id: "",
        service_id: ""
      },
      clientes:[],
      smotor: [],
      sejes: [],
      sserv: [],
      suser:[]
    };
  },
  props: {
    data: Object,
    onlyshow: String,
    cliente: Number
  },
  created() {
    this.vehicle = Object.assign({}, this.data);
    if (this.cliente != null) {
        this.vehicle.user_id = this.cliente;
    }
    axios
      .get("/users")
      .then(res => (this.clientes = res.data))
      .catch(function(err) {
        console.log(err);
      });
    axios
      .get("/axes")
      .then(res => (this.sejes = res.data))
      .catch(function(err) {
        console.log(err);
      });
      axios
        .get("/findUser/"+this.vehicle.user_id)
        .then(res => (this.suser = res.data))
        .catch(function(err) {
          console.log(err);
        });
    axios
      .get("/services")
      .then(res => (this.sserv = res.data))
      .catch(function(err) {
        console.log(err);
      });
    axios
      .get("/engines")
      .then(res => (this.smotor = res.data))
      .catch(function(err) {
        console.log(err);
      });
  },
  methods:{
      save(){
          if (this.vehicle.id==null) {
              axios
                .post("/vehicles", {
                  brand: this.vehicle.brand,
                  model: this.vehicle.model,
                  series: this.vehicle.series,
                  plate_number: this.vehicle.plate_number,
                  folio_circulation: this.vehicle.folio_circulation,
                  capacity: this.vehicle.capacity,
                  axes_id: this.vehicle.axes_id,
                  engine_id: this.vehicle.engine_id,
                  service_id: this.vehicle.service_id,
                  user_id: this.vehicle.user_id
                })
                .then(function(res) {
                        var ruta = '/showVehicles/'+res.data.vehicle.user_id;
                        location.href=ruta;
                })
                .catch(function(err) {
                  console.log(err);
                });
          }else {
              axios
                .put("/vehicles/" + this.vehicle.id, {
                    brand: this.vehicle.brand,
                    model: this.vehicle.model,
                    series: this.vehicle.series,
                    plate_number: this.vehicle.plate_number,
                    folio_circulation: this.vehicle.folio_circulation,
                    capacity: this.vehicle.capacity,
                    axes_id: this.vehicle.axes_id,
                    engine_id: this.vehicle.engine_id,
                    service_id: this.vehicle.service_id,
                    user_id: this.vehicle.user_id
                })
                .then(function(res) {
                    var ruta = '/showVehicles/'+res.data.vehicle.user_id;
                    location.href=ruta;
                })
                .catch(function(err) {
                  console.log(err);
                });
          }
      },
      goBack(){
          location.href="/showVehicles/"+this.vehicle.user_id;
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
