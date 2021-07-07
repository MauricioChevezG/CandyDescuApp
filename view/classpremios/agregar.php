   
    <center><h2>Agregar nuevo premio.</h2></center>
    <form action="?c=classpremios&m=agregar" method="post" >
    <div class="col-sm-offset-4 col-sm-4">
      <div class="form-group">
        <label for="cd_id_premio">Código del premio:</label>
        <input type="text" class="form-control" id="cd_id_premio" name="cd_id_premio">
      </div>
      <div class="form-group">
        <label for="cd_des_premio">Nombre del premio:</label>
        <input type="text" class="form-control" id="cd_des_premio" name="cd_des_premio">
      </div>
      <div class="form-group">
        <label for="cd_decuento_premio">Descuento del premio:</label>
        <input type="text" class="form-control" id="cd_decuento_premio" name="cd_decuento_premio">
      </div>

      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar premio</button> 
      <a id="regresar" class="btn btn-danger" role="button" href="?c=classpremios&m=index"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>  
      </div>
     </form>
