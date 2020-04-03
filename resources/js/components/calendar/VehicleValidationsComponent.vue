<template>
    <div class="container">
        Mes:
        <select v-model="selectedMonth" @change="monthChanged">
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
        <br><br>
        <div v-if="!loading">
            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Meses de validación</th>
                </thead>
                <tbody>
                    <tr v-for="val in response">
                        <td><a :href="'/vehicles/'+val.record.id">{{val.record.id}}</a></td>
                        <td>{{val.record.brand}}</td>
                        <td>{{val.record.model}}</td>
                        <td>{{val.record.plate_number}}</td>
                        <td>{{val.algorithm.validationMonths.join(', ')}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else>
            Cargando...
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        data(){
            return{
                response: null,
                selectedMonth: null,
                loading: false
            }
        },
        computed: {
            currentMonth(){
                let d = new Date();
                return d.getMonth();
            }
        },
        created() {
          this.selectedMonth = this.currentMonth;
          this.loading = true;
          axios.get('/vehicles/getByMonth?month='+this.currentMonth).then((response)=>{
              this.response = response.data;
          }).finally(()=>{
              this.loading = false;
          });
        },
        methods: {
            monthChanged(month){
                this.response = null;
                this.loading = true;
                axios.get('/vehicles/getByMonth?month='+this.selectedMonth).then((response)=>{
                  this.response = response.data;
                }).finally(()=>{
                    this.loading = false;
                });
            }
        }
    }
</script>
