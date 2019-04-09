<template>
  <div id="table">
     <data-modal
        :nameModal="'Pruebas'"
        :titles="['Nombre']"
        :objetoProps="this.objeto[0]"
        >
    </data-modal>
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-4">
                  <h3 class="text-left">
                      <i class="fas fa-check-double"></i>
                      Pruebas</h3>
              </div>
              <div class="col-4">
                  <a class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#dataModal">Agregar +</a>
              </div>
          </div>
      </div>
    <div class="ui container">
      <simple-vue-table
          :fields="[
            {name:'name', title: 'Nombre de la Prueba'},
            {name: '__slot:actions', title: 'Acciones'}]"
          :data="this.data"
          :route="'/tests'">>
      </simple-vue-table>
    </div>
  </div>
</template>

<script>
import EvenBus from '../../even-bus'
import SimpleVueTable from './SimpleVueTableComponent'

export default {
  name: 'app',
  data(){
      return{
          objeto:[
              {name:null}
          ]
      }
  },
  props: {
      data: Array,
  },
  components: {
    SimpleVueTable
},
created(){
    EvenBus.$on('object-added', data => {
        axios.post('/tests',{
            name: data.name
        })
        .then(function(res){
            console.log(res);
        })
        .catch(function(err){
            console.log(err);
        });
        this.data.push(data)
    })
    EvenBus.$on('object-del', index => {
        this.data.splice(index, 1);
    })
    EvenBus.$on('object-edited', data => {
        console.log(data);
        axios.put('/tests/'+data.id,{
            name: data.name
        })
        .then(function(res){
            console.log(res);
        })
        .catch(function(err){
            console.log(err);
        });
        var indexActive = 0;
        this.data.forEach(function(element,index) {
            if (element.id == data.id) {
                indexActive = index;
            }
        });
        this.data[indexActive]=data;
        this.data.push()
    })
},
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
