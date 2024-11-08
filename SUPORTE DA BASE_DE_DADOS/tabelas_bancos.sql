-- Criação da tabela utilizadores
CREATE TABLE utilizadores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) UNIQUE KEY NOT NULL,
    senha VARCHAR(50) NOT NULL,
    data_ingresso DATE DEFAULT CURRENT_DATE,
    foto_perfil VARCHAR(255) DEFAULT '../imags/logo/user.svg'
);

-- Inserção de dados na tabela utilizadores
INSERT INTO utilizadores (nome, senha) VALUES ('adm', '4554');
INSERT INTO utilizadores (nome, senha) VALUES ('teste', '9090');
INSERT INTO utilizadores (nome, senha) VALUES ('iuri', '12345');

-- Atualização da data de ingresso para registros já existentes, se necessário
UPDATE utilizadores SET data_ingresso = '2024-11-07' WHERE data_ingresso IS NULL;
ALTER TABLE utilizadores ADD COLUMN tipo ENUM('admin', 'comum') DEFAULT 'comum';
UPDATE utilizadores SET tipo = 'admin' WHERE nome = 'adm';


-- Criação da tabela videos_concluidos com chaves estrangeiras
CREATE TABLE videos_concluidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    video_id INT,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES utilizadores(id),
    CONSTRAINT fk_video FOREIGN KEY (video_id) REFERENCES videos(id),
    CONSTRAINT unique_user_video UNIQUE (user_id, video_id)
);

-- Criação da tabela videos
CREATE TABLE videos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    video VARCHAR(100) NOT NULL,
    imag VARCHAR(100) NOT NULL,
    tema VARCHAR(50) NOT NULL,
    title VARCHAR(50) NOT NULL,
    imag1 VARCHAR(100) NOT NULL,
    imag2 VARCHAR(100) NOT NULL,
    imag3 VARCHAR(100) NOT NULL,
    minut VARCHAR(20) NOT NULL,
    minut2 VARCHAR(20) NOT NULL,
    minut3 VARCHAR(20) NOT NULL,
    descr VARCHAR(100) NOT NULL,
    descr2 VARCHAR(100) NOT NULL,
    descr3 VARCHAR(100) NOT NULL
);
INSERT INTO videos (video, imag, tema, title, imag1, imag2, imag3, minut, minut2, minut3, descr, descr2, descr3)
VALUES 
('../videos/teste.mkv', '../imags/logo/java_scrip.avif', 'JavaScript Avançado', 'JavaScript Avançado', '../imags/JavaScript_1.png', '../imags/JavaScript_2.png', '../imags/JavaScript_3.png', '10mins', '20mins', '32mins', 'Avançado Imagem de exemplo: 1', 'Avançado Imagem de exemplo: 2', 'Avançado Imagem de exemplo: 3'),
('../videos/css_site.mkv', '../imags/logo/Logo_Css.png', 'Css completo', 'Css completo', '../imags/Css_1.png', '../imags/Css_2.png', '../imags/Css_final.png', '15mins', '20mins', '45mins', 'Css completo Imagem de exemplo : 1', 'Css completo Imagem de exemplo : 2', 'Css completo Imagem de exemplo : 3'),
('../videos/bootstrap.mkv', '../imags/logo/bootstrap.png', 'bootstrap', 'bootstrap', '../imags/boots_code.png', '../imags/boots_2.png', '../imags/boots_3.png', '5mins', '15mins', '44mins', 'Bootstrap Imagem de exemplo : 1', 'Bootstrap Imagem de exemplo : 2', 'Bootstrap Imagem de exemplo : 3'),
('../videos/nextjs.mkv', '../imags/logo/nextjs.png', 'Next js', 'Next js', '../imags/nextjs_1.png', '../imags/nextjs_2.png', '../imags/nextjs_3.png', '5mins', '38mins', '10mins', 'Next js Imagem de exemplo : 1', 'Next js Imagem de exemplo : 2', 'Next js Imagem de exemplo : 3'),
('../videos/react.mkv', '../imags/logo/react.png', 'React js', 'React js', '../imags/react_1.png', '../imags/react_2.png', '../imags/react_3.png', '20mins', '30mins', '40mins', 'react js Imagem de exemplo : 1', 'react js Imagem de exemplo : 2', 'react js Imagem de exemplo : 3'),
('../videos/nodejs.mkv', '../imags/logo/nodejs.png', 'Node js', 'Node js', '../imags/nodejs_1.png', '../imags/nodejs_2.png', '../imags/nodejs_3.png', '25mins', '44mins', '56mins', 'node js Imagem de exemplo : 1', 'node js Imagem de exemplo : 2', 'node js Imagem de exemplo : 3');
