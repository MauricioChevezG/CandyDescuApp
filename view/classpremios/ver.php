	<br>
	<div class="row">
	<div class="col-sm-offset-4 col-sm-4">  
			<div  class="panel panel-default">
				<div class="panel-heading">Detalle del premio</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item"><strong>Código del premio: </strong><?php echo $this->classpremios->getAtributo('cd_id_premio');?></li>
						<li class="list-group-item"><strong>Nombre del premio: </strong><?php echo $this->classpremios->getAtributo('cd_des_premio');?></li>
						<li class="list-group-item"><strong>Nombre del premio: </strong><?php echo $this->classpremios->getAtributo('cd_decuento_premio');?></li>
						
					</ul>
					<a href="?c=classpremios&m=index" class="btn btn-danger" role="button"><span class="
glyphicon glyphicon-triangle-left"></span> Regresar</a>  

				</div>
			</div>
			</div>
		</div>
   
