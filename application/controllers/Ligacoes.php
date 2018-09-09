<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ligacoes extends CI_Controller {

	public function index()
	{
		$config = array(
			"base_url"    => base_url('index.php/ligacoes/p'),
			"per_page"    => 50,
			"num_links"   => 5,
			"uri_segment" => 3,
			"total_rows"  => $this->ligacoes->totalRegistros(),
			"full_tag_open" => "<ul class='pagination justify-content-center'>",
			"full_tag_close" => "</ul>",
			"first_link" => FALSE,
			"last_link" => FALSE,
			"first_tag_open" => "<li class='page-link'>",
			"first_tag_close" => "</li>",
			"prev_link" => "Anerior",
			"prev_tag_open" => "<li class='prev page-link'>",
			"prev_tag_close" => "</li>",
			"next_link" => "Próxima",
			"next_tag_open" => "<li class='next page-link'>",
			"next_tag_close" => "</li>",
			"last_tag_open" => "<li class='page-link'>",
			"last_tag_close" => "</li>",
			"cur_tag_open" => "<li class='active'><a href='#' class='page-link'>",
			"cur_tag_close" => "</a></li>",
			"num_tag_open" => "<li class='page-link'>",
			"num_tag_close" => "</li>"
		);

		$this->pagination->initialize($config);
		$dados['paginacao'] = $this->pagination->create_links();

		$offset = ($this->uri->segment(3) ? $this->uri->segment(3) : 0);

		// Buscra os dados
		$ligacoes = $this->ligacoes->getLigacoes('data_ligacao', 'desc', $config['per_page'], $offset);
		$dados['ligacoes'] = $this->ligacoes->Formatar($ligacoes);
		
		$this->load->view('includes/header');
		$this->load->view('ligacoes/home',$dados);
		$this->load->view('includes/footer');
	}

	public function atualizar()
	{
		$array_items = array('error_ligacao','success_ligacao');
		$this->session->unset_userdata($array_items);

		$ligacao = $this->input->post();

		$status = $this->ligacoes->atualizar($ligacao['id'], $ligacao);
		//echo "<pre>"; print_r($status); die;

		if(!$status):
			$this->session->set_flashdata('error_atualizar_ligacao', 'Não foi possível alterar a <strong>Ligação</strong>.');
		else:
			$this->session->set_flashdata('success_atualizar_ligacao', '<strong>Ligação</strong> alterada com sucesso.');
		endif;

		$ligacoes = $this->ligacoes->getLigacoes();
		$dados['ligacoes'] =$this->ligacoes->Formatar($ligacoes);

		$this->load->view('includes/header');
		$this->load->view('ligacoes/home',$dados);
		$this->load->view('includes/footer');
	}

	public function salvar()
	{
		$array_items = array('error_atualizar_ligacao','success_atualizar_ligacao');
		$this->session->unset_userdata($array_items);

		$ligacao = $this->input->post();
		
		$status = $this->ligacoes->inserir($ligacao);
		
		if(!$status):
			$this->session->set_flashdata('error_ligacao', 'Não foi possível cadastrar a <strong>Ligação</strong>.');
		else:
			$this->session->set_flashdata('success_ligacao', '<strong>Ligação</strong> cadastrada com sucesso.');
		endif;

		$ligacoes = $this->ligacoes->getLigacoes();
		$dados['ligacoes'] =$this->ligacoes->Formatar($ligacoes);

		$this->load->view('includes/header');
		$this->load->view('ligacoes/home',$dados);
		$this->load->view('includes/footer');
	}

	public function detalhes()
	{
		// Buscra os dados
		$dados['ligacao'] = $this->ligacoes->getLigacao($this->uri->segment(3));
		$dados['custo'] = $this->configuracoes->getConfiguracoes();
						
		$this->load->view('includes/header');
		$this->load->view('ligacoes/detalhes',$dados);
		$this->load->view('includes/footer');
	}

	public function excluir()
	{
		$array_items = array('error_ligacao','error_atualizar_ligacao','success_ligacao','success_atualizar_ligacao');
		$this->session->unset_userdata($array_items);

		$status = $this->ligacoes->excluir($this->uri->segment(3));
		
		if(!$status):
			$this->session->set_flashdata('error_excluir_ligacao', 'Não foi possível excluir a <strong>Ligação</strong>.');
		else:
			$this->session->set_flashdata('success_excluir_ligacao', '<strong>Ligação</strong> excluída com sucesso.');
		endif;

		$ligacoes = $this->ligacoes->getLigacoes();
		$dados['ligacoes'] =$this->ligacoes->Formatar($ligacoes);

		$this->load->view('includes/header');
		$this->load->view('ligacoes/home',$dados);
		$this->load->view('includes/footer');
	}

} // fim da class