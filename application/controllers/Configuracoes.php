<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

	public function index()
	{
		// Buscra os dados
		$dados['configuracoes'] = $this->configuracoes->getConfiguracoes();
		
		$this->load->view('includes/header');
		$this->load->view('configuracoes/home',$dados);
		$this->load->view('includes/footer');
	}

	public function atualizar()
	{
		$configuracao = $this->input->post();

		$status = $this->configuracoes->atualizar($configuracao['id'], $configuracao);
		
		if(!$status):
			$this->session->set_flashdata('error', 'Não foi possível atualizar o <strong>Custo do Minuto</strong>.');
		else:
			$this->session->set_flashdata('success', '<strong>Custo do Minuto</strong> atualizado com sucesso.');
		endif;

		$dados['configuracoes'] = $this->configuracoes->getConfiguracoes($configuracao['id']);

		$this->load->view('includes/header');
		$this->load->view('configuracoes/home',$dados);
		$this->load->view('includes/footer');
	}

} // fim da class
