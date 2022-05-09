<?php
include '../../conexao/Conexao.php';

class Noticia {
    private $id;
	private $titulo;
    private $texto;
    private $horario;
    private $link;
    private $fonte;

    function getId() {
        return $this->id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getTexto() {
        return $this->texto;
    }

    function getHorario() {
        return $this->horario;
    }

    function getLink() {
        return $this->link;
    }

    function getFonte() {
        return $this->fonte;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

    function setLink($link) {
        $this->link = $link;
    }
    
    function setFonte($fonte) {
        $this->fonte = $fonte;
    }

    public function insert($dados){
    	$sql = "INSERT INTO noticia(titulo,texto,horario,link,fonte) VALUES (:titulo,:texto,:horario,:link,:fonte)";
    	$consulta = Conexao::getInstance()->prepare($sql);
        $consulta->bindValue('titulo',  $dados['titulo']);
        $consulta->bindValue('texto', $dados['texto']);
        $consulta->bindValue('horario' , $dados['horario']);
        $consulta->bindValue('link' , $dados['link']);
        $consulta->bindValue('fonte' , $dados['fonte']);
    	return $consulta->execute();

	}

	public function update($dados, $id){
		$sql = "UPDATE noticia SET titulo = :titulo,texto = :texto,horario = :horario,link = :link,fonte = :fonte WHERE id = :id ";
		$consulta = Conexao::getInstance()->prepare($sql);
		$consulta->bindValue('titulo', $dados['titulo']);
		$consulta->bindValue('texto', $dados['texto']);
		$consulta->bindValue('horario' , $dados['horario']);
        $consulta->bindValue('link' , $dados['link']);
        $consulta->bindValue('fonte' , $dados['fonte']);
		$consulta->bindValue('id', $id);
		return $consulta->execute();
	}

	public function delete($id){
		$sql =  "DELETE FROM noticia WHERE id = :id";
		$consulta = Conexao::getInstance()->prepare($sql);
		$consulta->bindValue('id', $id);
		$consulta->execute();
	}

	public function find($id = null){

	}

	public function findAll(){
		$sql = "SELECT * FROM noticia";
		$consulta = Conexao::getInstance()->prepare($sql);
		$consulta->execute();
		return $consulta->fetchAll();
	}

}

?>