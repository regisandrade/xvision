	<div class="container">
		<h1 class="mt-5">Detalhes da ligação</h1>
		
		<div class="col-md-8 order-md-1">
			<form class="needs-validation" method="post" action="<?php echo base_url('index.php/ligacoes/atualizar')?>" enctype="multipart/form-data" validate>
				<input type="hidden" name="id" value="<?php echo $ligacao->id;?>">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="num_origem">Número de origem</label>
						<br><strong><?php echo $ligacao->num_origem;?></strong>
					</div>
					<div class="col-md-6 mb-3">
						<label for="num_destino">Número de destino</label>
						<br><strong><?php echo $ligacao->num_destino;?></strong>
					</div>
				</div>
				<div class="row ">
					<div class="col-md-6 mb-3">
						<label for="tempo_ligacao">Tempo da ligação</label>
						<br><strong><?php echo $ligacao->tempo_ligacao;?></strong>
					</div>
					<div class="col-md-6 mb-3 p-3 mb-2 bg-light text-dark">
						<label for="tempo_ligacao" class="text-danger"><strong>Custo da ligação</strong></label>
						<br><strong class="text-danger">R$ <?php echo number_format(calcularCustoLigacao($ligacao->tempo_ligacao,$custo->custo_ligacao_minuto),2,',','.');?></strong>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="data_ligacao">Data da ligação</label>
						<br><strong><?php echo nice_date($ligacao->data_ligacao,'d/m/Y');?></strong>
					</div>
					<div class="col-md-6 mb-3">
						<label for="hora_ligacao">Hora da ligação</label>
						<br><strong><?php echo $ligacao->hora_ligacao;?></strong>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="comentario">Comentários:</label>
						<textarea name="comentario" rows="5"><?php echo $ligacao->comentario;?></textarea>
					</div>
				</div>
				<button class="btn btn-primary btn-lg " type="submit">Gravar</button>
				<button class="btn btn-warning btn-lg " type="button" onClick="history.go(-1)">Voltar</button>
			</form>
		</div>
	</div>