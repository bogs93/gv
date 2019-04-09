<template>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="desc_form">
                <div class="container">
                    <div class="row justify-content-between">
                        <h3 class="text-left">
                            <i class="fas fa-car"></i>
                                 Nueva Captura Verificación </h3>   
                    </div>                                                      
                </div>                
            </div>
        </div>     
    </div> 
    <div iv class="row lpad" style=""> <!--Linea1 -->
        <div class="col-md-3">
            <label for="aprov">N°Aprobación</label>
            <input type="text" class="form-control" id=aprov placeholder="N°Aprobación">   
        </div>
        <div class="col-md-3">
            <label for="acredita">Acreditación</label>
            <input type="text" class="form-control" id=acredita placeholder="Acreditación">
        </div>
        <div class="col-md-3">
            <label for="semestre">Semestre</label>
            <input type="text" class="form-control" id=semestre placeholder="Semestre">
        </div>
        <div class="col-md-3">
            <label for="resultado">Resultado</label>
            <input type="text" class="form-control" id=resultado placeholder="Resultado">
        </div>
    </div>

    <div iv class="row lpad" > <!--Linea2 -->
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
            <label for="motor">Motor</label>
            <select class="custom-select" id=motor>
                <option selected>Motores</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
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
            <label for="motor">Motor</label>
            <select class="custom-select" id=motor>
                <option selected>Motores</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>       
    </div>
    <div iv class="row lpad" > <!--Linea3 -->
        <div class="col-md-4">
            <label for="rfc">RFC</label>
            <input type="text" class="form-control" id=rfc placeholder="RFC">   
        </div>
        <div class="col-md-8">
            <label for="nrsocial">Nombre o Razón Social</label>
            <input type="text" class="form-control" id=nrsocial placeholder="Nombre o Razón Social">   
        </div>
    </div>
    <div iv class="row lpad" > <!--Linea4 -->
        <div class="col-md-3">
            <label for="domicilio">Domicilio</label>
            <input type="text" class="form-control" id=domicilio placeholder="Domicilio">   
        </div>
        <div class="col-md-3" style="padding2%">
            <label for="municipio">Municipio</label>
            <input type="text" class="form-control" id=nrsocial placeholder="Municipio">
        </div>
         <div class="col-md-3">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id=estado placeholder="Estado">   
        </div>
        <div class="col-md-3">
            <label for="cp">Codigo Postal</label>
            <input type="text" class="form-control" id=cp placeholder="Codigo Postal">
        </div>
    </div>

    <div iv class="row lpad" > <!--Linea5 -->
     <div class="col-md-3">
            <label for="NSerie">N° Serie</label>
            <input type="text" class="form-control" id=NSerie placeholder="N° Serie">
        </div>
         <div class="col-md-3">
            <label for="placa">Placa</label>
            <input type="text" class="form-control" id=placa placeholder="Placa">   
        </div>
        <div class="col-md-3">
            <label for="tcirculacion">T.Circulacion</label>
            <input type="text" class="form-control" id=tcirculacion placeholder="T.Circulacion">
        </div>
        <div class="col-md-3">
            <label for="amodelo">Año Modelo</label>
            <select class="custom-select" id=amodelo>
                <option selected>Año Modelo</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
    </div>
    <div iv class="row lpad" > <!--Linea6 -->
        <div class="col-md">
            <label for="tvehiculo">Tipo Vehiculo</label>
            <select class="custom-select" id=tvehiculo>
                <option selected>Tipo Vehiculo</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
         <div class="col-md">
            <label for="tserv">Tipo Servicio</label>
            <select class="custom-select" id=tserv>
                <option selected>Tipo Servicio</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md">
            <label for="vpresenta">Vehiculo se Presento</label>
            <select class="custom-select" id=vpresenta>
                <option selected>Vehiculo se Presento</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="odometro">Odometro</label>
            <input type="text" class="form-control" id=odometro placeholder="Odometro">
        </div>
    </div>

    <div iv class="row lpad" > <!--Linea7 -->
        <div class="col-md-4">
            <label for="nomtec">Nombre del Tecnico</label>
            <input type="text" class="form-control" id=nomtec placeholder="Nombre del Tecnico">
        </div>
        <div class="col-md-8">
            <label for="observa">Observaciones</label>
            <input type="text" class="form-control" id=observa placeholder="Observaciones">
        </div>
    
    </div>

     <div iv class="row justify-content-center srow"> 
        <div class="col-md-4">                              
        <a class="btn btn-guarda btn-outline-primary btn-lg ">Guardar</a>
        </div>                    
    </div>
</div> 

</template>
<script>
export default {
  
    
}
</script>

<style scoped>
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
