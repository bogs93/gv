<template>
 <div class="container">
    <div class="row">
        <div class="col">
            <div id="desc_form">
                <div class="container">
                    <div class="row justify-content-between">
                        <h3 class="text-left">
                            <i class="fas fa-car"></i>
                                 Nuevo Ingreso Vehiculo </h3>   
                    </div>                                                      
                </div>                
            </div>
        </div>     
    </div> 
   <!-- Columna1/3-->       
    <div iv class="row lpad" >
        <div class="col-md-4 "     >
            <label for="empresa">Empresa</label>
            <input type="text" class="form-control" id=empresa placeholder="Empresa">   
        </div>
        <div class="col-md-4">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id=marca placeholder="Marca">
        </div><div class="col-md-4">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id=modelo placeholder="Modelo">
        </div>
    </div>
    <div iv class="row lpad" >
        <div class="col-md-4">
            <label for="serie">Serie</label>
            <input type="text" class="form-control" id=serie placeholder="Serie">
        </div>
        <div class="col-md-4">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id=placa placeholder="Placa">
        </div><div class="col-md-4">
            <label for="tcirc">T.Circulacion</label>
            <input type="text" class="form-control" id=tcirc placeholder="T.Circulación">
        </div>
    </div> 
    <div iv class="row lpad" >
        <div class="col-md">
            <label for="capacidad">Capacidad</label>
            <input type="text" class="form-control" id=capacidad placeholder="Capacidad">
        </div>
        <div class="col-md">
            <label for="motor">Motor</label>
            <select class="custom-select" id=motor>
                <option selected>Motores</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md">
            <label for="ejes">Ejes</label>
            <select class="custom-select" id=ejes>
                <option selected>Ejes</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                </select> 
                </div>
        <div class="col-md">
            <label for="serv">Servicios</label>
            <select class="custom-select" id=serv>
                <option selected>Servicios</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div> 
    <div iv class="row justify-content-center"> 
        <div class="col-md-4">                              
        <a class="btn  btn-guarda btn-outline-primary btn-lg">Guardar</a>
        </div>                    
    </div> 
</div>
   
</template>

<script>

</script>

<style scope>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
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
