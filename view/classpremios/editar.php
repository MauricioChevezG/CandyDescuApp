
    <center>
      <h2>Editar premio: <?php echo $this->classpremios->getAtributo('cd_des_premio');?> </h2>
    </center>
   
        <form action="?c=classpremios&m=editar" method="post">
      <div class="col-sm-offset-4 col-sm-4">
      <div class="form-group">
        <label for="cd_id_premio">Código del premio:</label>
        <input type="text" class="form-control" id="cd_id_premio" name="cd_id_premio" value="<?php echo $this->classpremios->getAtributo('cd_id_premio');?>" readonly>
      </div>
      <div class="form-group">
        <label for="cd_des_premio">Nombre del premio</label>
        <input type="text" class="form-control" id="cd_des_premio" name="cd_des_premio" value="<?php echo $this->classpremios->getAtributo('cd_des_premio');?> " >
      </div>
      <div class="form-group">
        <label for="cd_decuento_premio">Descuento del premio</label>
        <input type="text" class="form-control" id="cd_decuento_premio" name="cd_decuento_premio" value="<?php echo $this->classpremios->getAtributo('cd_decuento_premio');?> " >
      </div>
      
      <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-saved"></span> Editar premio</button> 
      <a href="?c=classpremios&m=index" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      
      </div>
    </form>
  
