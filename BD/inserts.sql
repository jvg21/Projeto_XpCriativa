-- Inserindo usuarios
INSERT INTO usuario (nome, cpf, email, telefone, data_nasc, sexo, senha, login) VALUES 
('Giovanni', '111.111.111-11', 'gio@gmail.com', '41999999999', '2004-03-25', 'Masculino', 'Athletico123', 'gio.uchoa'), 
('Joao', '222.222.222-22', 'joao@gmail.com', '41988888888', '2004-06-28', 'Masculino', 'Santos123', 'joao.grego'),
('Bruno', '333.333.333-33', 'bruno@gmail.com', '41977777777', '2004-01-05', 'Masculino', 'Flamengo123', 'bruno.gutt'),
('Guilherme', '444.444.444-..', 'gui@gmail.com', '41966666666', '2004-02-11', 'Masculino', 'Corinthians123', 'gui.tereza'),
('Gabriel', '555.555.555-55', 'gabriel@gmail.com', '41955555555', '2000-08-21', 'Masculino', 'Botafogo123', 'gab.stef')

-- Inserindo administradores
INSERT INTO adm (fk_idusuario) VALUES 
(1), 
(2)

-- Inserindo tipos de quarto
INSERT INTO tipo_quarto (nome, preco, descricao) VALUES 
('single', '150', 'quarto simples para uma pessoa, com um banheiro e uma cama de solteiro'),
('dual', '280', 'quarto maior para um conforto de até duas pessoas, com um banheiro e uma cama de casal'),
('medium', '400', 'quarto mais refinado que conforta uma familia de tres pessoas, com dois banheiros, uma cama de casal e uma de solteiro'),
('premium', '650', 'quarto grande com capacidade para 6 pessoas, com dois banheiros e três camas de casal')

-- Inserindo quartos
INSERT INTO quarto (num_quarto, fk_tipo_quarto) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 4),
(13, 4)

-- Inserindo reservas
INSERT INTO reserva (fk_idquarto, fk_idusuario, data_checkin, data_checkout, hora_checkin, hora_checkout) VALUES 
(1, 3, '2023-05-20', '2023-05-26', '07:30:00', '18:00:00'),
(12, 5, '2023-06-01', '2023-06-09', '07:30:00', '18:00:00'),
(7, 4, '2023-12-23', '2024-01-02', '07:30:00', '18:00:00'),
(1, 10, '2023-10-08', '2023-10-13', '07:30:00', '18:00:00')
