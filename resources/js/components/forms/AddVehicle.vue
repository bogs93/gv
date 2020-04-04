<template>
  <div class="container" id="addVehicle">
    <div class="row">
      <div class="col">
        <div id="desc_form">
          <div class="container">
            <div class="row justify-content-between">
              <h3 class="text-left">
                <i class="fas fa-car"></i>
                Nuevo Ingreso Vehiculo++
              </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Columna1/3-->
    <div iv class="row lpad">
      <div class="col-md-4">
        <label for="empresa">Empres2a</label>
        <input type="text" class="form-control" placeholder="Empresa" v-model="empresa">
      </div>
      <div class="col-md-4">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" id="marca" placeholder="Marca" v-model="marca">
      </div>
      <div class="col-md-4">
        <label for="modelo">Modelo</label>
        <input type="text" class="form-control" id="modelo" placeholder="Modelo" v-model="modelo">
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md-4">
        <label for="serie">Serie</label>
        <input type="text" class="form-control" id="serie" placeholder="Serie" v-model="serie">
      </div>
      <div class="col-md-4">
        <label for="placa2">Placa</label>
        <input type="text" class="form-control" id="placa2" placeholder="Placa" v-model="placa">
      </div>
      <div class="col-md-4">
        <label for="tcirc">T.Circulacion</label>
        <input
          type="text"
          class="form-control"
          id="tcirc"
          placeholder="T.Circulación"
          v-model="circula"
        >
      </div>
    </div>
    <div iv class="row lpad">
      <div class="col-md">
        <label for="capacidad">Capacidad</label>
        <input
          type="text"
          class="form-control"
          id="capacidad"
          placeholder="Capacidad"
          v-model="capacidad"
        >
      </div>
      <div class="col-md">
        <label for="motor1">Motor</label>
        <select class="form-control" id="motor1" v-model="motors">
          <option v-for="moto in smotor" v-bind:value="moto.id">{{ moto.name }}</option>
        </select>
      </div>
      <div class="col-md">
        <label for="ejes">Ejes</label>
        <select class="form-control" id="ejes" v-model="axes">
          <option v-for="eje in sejes" v-bind:value="eje.id">{{ eje.name }}</option>
        </select>
      </div>
      <div class="col-md">
        <label for="serv">Servicios</label>
        <select class="form-control" id="serv" v-model="servi">
          <option v-for="serv in sserv" v-bind:value="serv.id">{{ serv.name }}</option>
        </select>
      </div>
    </div>
    <div iv class="row justify-content-center">
      <div class="col-md-4">
        <a class="btn btn-guarda btn-outline-primary btn-lg">Guardar</a>
      </div>
    </div>
  </div>
</template>

<script>
import EvenBus from "../../even-bus";
export default {
  data() {
    return {
      empresa: "",
      marca: "",
      modelo: "",
      serie: "",
      placa: "",
      circula: "",
      capacidad: "",
      motors: "",
      smotor: [],
      suser: [],
      axes: "",
      sejes: [],
      servi: "",
      sserv: [],
      usuaroBuscado:[]
    };
  },
  mounted() {
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
.btn-guarda {
  padding: 5%;
  margin-top: 5%;
}
.lpad {
  padding-top: 4%;
  text-align: left;
  padding-left: 4%;
}
</style>
