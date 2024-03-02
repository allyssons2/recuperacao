CREATE TABLE curso
(
	idCurso			    INT PRIMARY KEY AUTO_INCREMENT,
    nome				VARCHAR(100),
    nivel               INT,
    valor		        DECIMAL(10,2),
    descricao           VARCHAR(2000)
);

DELIMITER //

CREATE PROCEDURE piCurso
(
	IN _nome		VARCHAR(100),
    IN _nivel       INT,
    IN _valor		DECIMAL(10,2),
    IN _descricao	VARCHAR(2000)
)
BEGIN
	INSERT INTO curso (nome, nivel, valor, descricao) VALUES (_nome, _nivel, _valor, _descricao);
END //

DELIMITER //
CREATE PROCEDURE psListarCurso()
BEGIN
SELECT * FROM curso;
END //

DELIMITER //
CREATE PROCEDURE psCurso
(
	IN _id		INT
)
BEGIN
SELECT * FROM curso
WHERE idCurso = _id;
END //

DELIMITER //
CREATE PROCEDURE puCurso
(
	IN	_id			INT,
    IN	_nome		VARCHAR(100),
    IN  _nivel      INT,
    IN _valor		DECIMAL(10.2),
    IN _descricao   VARCHAR(2000)
)
BEGIN
	UPDATE curso
    	SET nome = _nome,
            nivel = _nivel,
        	valor = _valor,
            descricao = _descricao
    WHERE idCurso = _id;
END //

DELIMITER //
CREATE PROCEDURE pdCurso
(
	IN 	_id		INT
)
BEGIN
	DELETE FROM curso WHERE idCurso = _id;
END //