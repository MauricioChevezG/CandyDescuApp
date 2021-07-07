<?php $result = $this->classreportepremios->listar(); ?>
       <center><h2>Ganó.</h2> </center> 
       <div class="col-sm-offset-2 col-sm-8">
   <br>
   <br>   
    <?php if ($result->num_rows): ?>
      <table class="display table table-bordered" cellpadding="0" cellspacing="0" border="0" width="100%" id="grilla-premios">
        <thead>
          <tr>
            <th>Código del Factura</th>
            <th>Nombre del premio</th>
            <th>Descuento del premio</th>
            <th style="width: 120px;">Más</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($result)):?>
            <tr>
              <td><?php echo $row[0]; ?></td>
              <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[2]; ?></td>
              <td><div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Opciones
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="?c=classreportepremios&m=reporte&id=<?php echo $row[0]; ?>" target="_blank"><span class="glyphicon glyphicon-pencil"></span> Imprimir</a></li>
                  </ul>
                </div></td>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <div style="background-color:#b2ff59" class="alert alert-info">
              <center>
                <strong>¡Información!</strong> No hay información sobre premios.
              </center>
            </div>
          <?php endif ?>
        </tbody>
      </table>
</div>
   
