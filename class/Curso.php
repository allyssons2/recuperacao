<?php

    class Curso
    {
        private $nome;
        private $nivel;
        private $valor;
        private $descricao;

        public function __construct(){}

        public function create($_nome, $_nivel, $_valor, $_descricao)
        {
            $this->nome = $_nome;
            $this->nivel = $_nivel;
            $this->valor = $_valor;
            $this->descricao = $_descricao;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getNivel()
        {
            return $this->nivel;
        }

        public function getValor()
        {
            return $this->valor;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

        public function setNome($_nome)
        {
            $this->nome = $_nome;
        }

        public function setNivel($_nivel)
        {
            $this->nivel = $_nivel;
        }

        public function setValor($_valor)
        {
            $this->valor = $_valor;
        }

        public function setDescricao($_descricao)
        {
            $this->descricao = $_descricao;
        }

        public function cadastrarCurso()
        {
            try 
            {
                include("assets/db/conn.php");
                $sql = "CALL piCurso(:nome, :nivel, :valor, :descricao)";
    
                $data = [
                    'nome' => $this->nome,
                    'nivel' => $this->nivel,
                    'valor' => $this->valor,
                    'descricao' => $this->descricao
                ];
    
                $statement = $conn->prepare($sql);
                $statement->execute($data);
    
                return true;

            } 
            catch (Exception $e) 
            {
                return false;
            }
        }

        public function listarCurso()
        {
           try 
           {
                include("assets/db/conn.php");

                $sql = "CALL psListarCurso()";
                $data = $conn->query($sql)->fetchAll();

                return $data;
           } 
           catch (Exception $e) 
           {
               return false;
           }
        }

        public function buscarCurso($_id)
        {
            include("assets/db/conn.php");

            $sql = "CALL psCurso('$_id')";
            $data = $conn->query($sql)->fetchAll();

            foreach ($data as $item) {
                $this->nome = $item["nome"];
                $this->nivel = $item["nivel"];
                $this->valor = $item["valor"];
                $this->descricao = $item["descricao"];
            }

            return true;

        }

        public function atualizarCurso($_id)
        {
            include("assets/db/conn.php");
            $sql = "CALL puCurso(:id, :nome, :nivel, :valor, :descricao)";

            $data = [
                'id' => $_id,
                'nome' => $this->nome,
                'nivel' => $this->nivel,
                'valor' => $this->valor,
                'descricao' => $this->descricao
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }

        public function excluirCurso($_id)
        {
            include("assets/db/conn.php");
            $sql = "CALL pdCurso(:id)";

            $data = [
                'id' => $_id
            ];

            $statement = $conn->prepare($sql);
            $statement->execute($data);

            return true;
        }
    }

?>