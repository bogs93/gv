<template>
  <div id="table">
      <!--add-role-modal></add-role-modal-->
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-4">
                  <h3 class="text-left">
                      <i class="fas fa-user"></i>
                      Clientes</h3>
              </div>
              <div class="col-4">
                  <a href="/customers/create" class="btn btn-outline-primary btn-sm" style="margin-bottom: 1%;">Agregar +</a>
                 </div>
          </div>
      </div>
    <div class="ui container">
      <detail-vue-table
          :fields="[
            {name: 'name', title: 'Nombre',dataClass:'text-left'},
            {name:'email', title: 'Correo',dataClass:'text-left'},
            {name: '__slot:vehicles', title: 'Vehiculos',dataClass:'text-center'},
            {name: '__slot:actions', title: 'Acciones',dataClass:'text-center'}]"
          :data="this.data"
          :route="'/customers'">
          <!--ROUTE PARA ACTIONS BUTTON  -->
      </detail-vue-table>
    </div>
  </div>
</template>

<script>
import EvenBus from '../../even-bus'
import DetailVueTable from './DetailVueTableComponent'

export default {
  name: 'app',
  data(){
      return{
          datos:[
              {id:'1',name:'cliente 1',mail:'cliente1@gmail.com',tel:'656415101',address:'calle 1 col 1'},
              {id:'2',name:'cliente 2',mail:'cliente2@gmail.com',tel:'656415101',address:'calle 2  col 2'},
              {id:'3',name:'cliente 3',mail:'cliente3@gmail.com',tel:'656415101',address:'calle 3 col 3'},
              {id:'4',name:'cliente 4',mail:'cliente4@gmail.com',tel:'656415101',address:'calle 4  col 4'},
              {id:'5',name:'cliente 5',mail:'cliente5@gmail.com',tel:'656415101',address:'calle 5 col 5'},
              {id:'6',name:'cliente 6',mail:'cliente6@gmail.com',tel:'656415101',address:'calle 6 col 6'},
              {id:'7',name:'cliente 7',mail:'cliente7@gmail.com',tel:'656415101',address:'calle 7 col 7'}
          ]
      }
  },
  props: {
      data: Array,
  },
  components: {
    DetailVueTable
},
/*created(){
    EvenBus.$on('role-added', data => {
        this.data.push(data)
    })
    EvenBus.$on('role-del', index => {
        this.data.splice(index, 1);
    })
    EvenBus.$on('role-update', data => {
        var indexActive = 0;
        this.data.forEach(function(element,index) {
            if (element.id == data.id) {
                indexActive = index;
            }
        });
        this.data[indexActive]=data;
        this.data.push()
    })
},*/
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
