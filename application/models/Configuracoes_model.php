<?php

class Configuracoes_model extends CI_Model{

	function __construct() {
        parent::__construct();
        $this->tabela = 'configuracoes';
    }

    function getConfiguracoes($sort = 'id', $order = 'asc'){
		$this->db->order_by($sort, $order);
		$query = $this->db->get($this->tabela);
		if ($query->num_rows() > 0) :
			return $query->row();
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

}