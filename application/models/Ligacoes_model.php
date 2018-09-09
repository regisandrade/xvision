<?php

class Ligacoes_model extends CI_Model{

	function __construct() {
        parent::__construct();
        $this->tabela = 'ligacoes';
    }

    function getLigacao($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->tabela);
		if ($query->num_rows() > 0) :
			return $query->row();
		else:
			return null;
		endif;
	}

	function getLigacoes($sort = 'data_ligacao', $order = 'desc', $limit = null, $offset = null){
		$this->db->order_by($sort, $order);
		$this->db->where('excluido', 'Nao');

		if($limit)
			$this->db->limit($limit, $offset);

		$query = $this->db->get($this->tabela);

		if ($query->num_rows() > 0) :
			return $query->result_array();
		else:
			return null;
		endif;
	}

	function atualizar($id, $dados) {
		if(is_null($id) || !isset($dados))
			return false;

		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $dados);
	}

	function inserir($dados) {
		if(!isset($dados))
			return false;

		return $this->db->insert($this->tabela, $dados);
	}

	function excluir($id) {
		if(!isset($id))
			return false;
		$dados = array('excluido' => 'Sim');
		$this->db->where('id', $id);
		return $this->db->update($this->tabela, $dados);
	}

	function formatar($ligacoes){
		if($ligacoes):
			for($i = 0; $i < count($ligacoes); $i++):
				$ligacoes[$i]['detalhe_url'] = base_url('index.php/ligacoes/detalhes')."/".$ligacoes[$i]['id'];
				$ligacoes[$i]['excluir_url'] = base_url('index.php/ligacoes/excluir')."/".$ligacoes[$i]['id'];
			endfor;
			return $ligacoes;
		else:
			return false;
		endif;
	}

	function totalRegistros()
	{
		$this->db->where('excluido', 'Nao');
		return $this->db->count_all($this->tabela);
	}

}