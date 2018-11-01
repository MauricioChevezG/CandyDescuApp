<center><h2>Verificar nuevo cliente</h2></center>
    <form action="?c=classjuego&m=verificaCliente" method="post">
    <div class="col-sm-offset-4 col-sm-4">
      <div class="form-group">
        <label for="cedula">Cédula:</label>
        <input type="text" class="form-control" id="cedula" name="cedula">
      </div>
      <div class="form-group">
        <label for="factura">Factura :</label>
        <input type="text" class="form-control" id="factura" name="factura">
      </div>
      <input type="submit" name="submit" class="btn btn-success" value="Verificar">
      <a id="regresar" class="btn btn-danger" role="button" href="?c=classprincipal&m=index"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>  
      </div>
     </form>