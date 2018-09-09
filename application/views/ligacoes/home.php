	<div class="container">
		<h1 class="mt-5">Ligação</h1>
		
		<?php if ($this->session->flashdata('error_ligacao') == TRUE): ?>
			<p><?php echo $this->session->flashdata('error_ligacao'); ?></p>
		<?php elseif ($this->session->flashdata('error_atualizar_ligacao') == TRUE): ?>
			<p><?php echo $this->session->flashdata('error_atualizar_ligacao'); ?></p>
		<?php elseif ($this->session->flashdata('error_excluir_ligacao') == TRUE): ?>
			<p><?php echo $this->session->flashdata('error_excluir_ligacao'); ?></p>
		<?php endif; ?>

		<?php if ($this->session->flashdata('success_ligacao') == TRUE): ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<?php echo $this->session->flashdata('success_ligacao'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php elseif ($this->session->flashdata('success_atualizar_ligacao') == TRUE): ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<?php echo $this->session->flashdata('success_atualizar_ligacao'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php elseif ($this->session->flashdata('success_excluir_ligacao') == TRUE): ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<?php echo $this->session->flashdata('success_excluir_ligacao'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>

		<div class="col-md-8 order-md-1">
			<form class="needs-validation" method="post" action="<?php echo base_url('index.php/ligacoes/salvar')?>" enctype="multipart/form-data" validate>
				<input type="hidden" name="id" value="">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="num_origem">Número de origem</label>
						<input type="text" class="form-control" name="num_origem" placeholder="" value="" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="num_destino">Número de destino</label>
						<input type="text" class="form-control" name="num_destino" placeholder="" value="" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="tempo_ligacao">Tempo da ligação</label>
						<input type="text" class="form-control" name="tempo_ligacao" placeholder="" value="" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="data_ligacao">Data da ligação</label>
						<input type="date" class="form-control" name="data_ligacao" placeholder="" value="" required>
					</div>
					<div class="col-md-6 mb-3">
						<label for="hora_ligacao">Hora da ligação</label>
						<input type="time" class="form-control" name="hora_ligacao" placeholder="" value="" required>
					</div>
				</div>
				<button class="btn btn-primary btn-lg " type="submit">Gravar</button>
				<button class="btn btn-warning btn-lg " type="button" onClick="history.go(-1)">Voltar</button>
			</form>
		</div>
		<br>
		<div>
			<h2 class="text-center">Lista de Registros</h2>
			<table class="table table-hover">
				<thead>
					<tr class="table-primary">
						<th scope="col" class="text-center">Número de origem</th>
						<th scope="col" class="text-center">Número de destino</th>
						<th scope="col" class="text-center">Tempo da ligação</th>
						<th scope="col" class="text-center">Data da ligação</th>
						<th scope="col" class="text-center">Hora da ligação</th>
						<th scope="col" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if ($ligacoes == FALSE): 
					?>
						<tr><td colspan="2">Nenhum registro encontrado</td></tr>
					<?php 
					else: 
						$conta = 1;
					?>
						<?php foreach ($ligacoes as $row): ?>
							<tr>
								<td><?php echo $conta.'&nbsp;&nbsp;-&nbsp;&nbsp;'.$row['num_origem'] ?></td>
								<td class="text-center"><?php echo $row['num_destino'] ?></td>
								<td class="text-center"><?php echo $row['tempo_ligacao'] ?></td>
								<td class="text-center"><?php echo nice_date($row['data_ligacao'],'d/m/Y'); ?></td>
								<td class="text-center"><?php echo $row['hora_ligacao'] ?></td>
								<td class="text-center"><a href="<?php echo $row['detalhe_url'] ?>">[Detalhes]</a> <a href="<?php echo $row['excluir_url'] ?>">[Excluir]</a></td>
							</tr>
						<?php 
							$conta++;
						endforeach; 
					endif; ?>
				</tbody>
			</table>
		</div>
		<nav aria-label="Page navigation">
			<?php echo $paginacao; ?>
		</nav>
	</div>
