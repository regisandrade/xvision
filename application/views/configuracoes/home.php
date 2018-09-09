	<div class="container">
		<h1 class="mt-5">Configurações</h1>
		
		<?php if ($this->session->flashdata('error') == TRUE): ?>
			<p><?php echo $this->session->flashdata('error'); ?></p>
		<?php endif; ?>
		<?php if ($this->session->flashdata('success') == TRUE): ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif; ?>

		<div class="col-md-8 order-md-1">
			<form class="needs-validation" method="post" action="<?=base_url('index.php/configuracoes/atualizar')?>" enctype="multipart/form-data" validate>
				<input type="hidden" name="id" value="<?php echo $configuracoes->id?>">
				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="custo_ligacao_minuto">Custo do Minuto</label>
						<input type="text" class="form-control" name="custo_ligacao_minuto" placeholder="" value="<?php echo $configuracoes->custo_ligacao_minuto?>" required>
					</div>
				</div>
				<button class="btn btn-primary btn-lg " type="submit">Gravar</button>
				<button class="btn btn-warning btn-lg " type="button" onClick="history.go(-1)">Voltar</button>
			</form>
		</div>
	</div>