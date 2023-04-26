INSERT INTO tipo_quarto (nome, preco) VALUES ("Simples", 200); 
INSERT INTO tipo_quarto (nome, preco) VALUES ("Couple", 350); 
INSERT INTO tipo_quarto (nome, preco) VALUES ("Premium", 600);

INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (1, 1);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (2, 1);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (3, 1);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (4, 1);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (5, 1);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (6, 2);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (7, 2);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (8, 3);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (9, 3);
INSERT INTO quarto (num_quarto, tipo_quarto) VALUES (10, 3);

INSERT INTO funcionario (matricula, cpf, nome, email, telefone, data_nasc, sexo, senha)
VALUES (0001, "111.111.111-11", "Giovanni Uchoa", "giovanni@gmail.com", "41999999999", "2004-03-25", "Masculino", "Athletico123") ;
INSERT INTO funcionario (matricula, cpf, nome, email, telefone, data_nasc, sexo, senha)
VALUES (0002, "222.222.222-22", "João Gregorini", "joao@gmail.com", "41888888888", "2004-06-28", "Masculino", "Santos123") ;

INSERT INTO cliente (cpf, nome, email, telefone, data_nasc, sexo, senha)
VALUES ("333.333.333-33", "Bruno Guttervill", "bruno@gmail.com", "41777777777", "2004-01-05", "Masculino", "Flamengo123") ;

INSERT INTO adm (login, idfunc) VALUES ("giuchoa", 1);

INSERT INTO reserva (fk_idcliente, fk_idfuncionario, fk_idquarto, data_checkin, data_checkout, hora_checkin, hora_checkout)
VALUES (1, 1, 1, "2023-06-02", "2023-06-10", "07:30:00", "18:30:00");