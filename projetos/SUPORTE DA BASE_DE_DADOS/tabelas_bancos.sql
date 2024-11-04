-- Tabela de utilizadores
CREATE TABLE utilizadores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Inserção de dados na tabela de utilizadores
INSERT INTO utilizadores (nome, senha) VALUES 
('adm', '4554'),
('teste', '9090'),
('iuri', '12345');

-- Tabela de vídeos
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

-- Inserção de dados na tabela de vídeos
INSERT INTO videos (video, imag, tema, title, imag1, imag2, imag3, minut, minut2, minut3, descr, descr2, descr3)
VALUES 
('../videos/teste.mkv', '../imags/logo/java_scrip.avif', 'JavaScript Avançado', 'JavaScript Avançado', '../imags/JavaScript_1.png', '../imags/JavaScript_2.png', '../imags/JavaScript_3.png', '10mins', '20mins', '32mins', 'Avançado Imagem de exemplo: 1', 'Avançado Imagem de exemplo: 2', 'Avançado Imagem de exemplo: 3'),
('../videos/css_site.mkv', '../imags/logo/Logo_Css.png', 'Css completo', 'Css completo', '../imags/Css_1.png', '../imags/Css_2.png', '../imags/Css_final.png', '15mins', '20mins', '45mins', 'Css completo Imagem de exemplo : 1', 'Css completo Imagem de exemplo : 2', 'Css completo Imagem de exemplo : 3'),
('../videos/bootstrap.mkv', '../imags/logo/bootstrap.png1', 'Bootstrap', 'Bootstrap', '../imags/boots_code.png', '../imags/boots_2.png', '../imags/boots_3.png', '5mins', '15mins', '44mins', 'Bootstrap Imagem de exemplo : 1', 'Bootstrap Imagem de exemplo : 2', 'Bootstrap Imagem de exemplo : 3'),
('../videos/nextjs.mkv', '../imags/logo/nextjs.png', 'Next js', 'Next js', '../imags/nextjs_1.png', '../imags/nextjs_2.png', '../imags/nextjs_3.png', '5mins', '38mins', '10mins', 'Next js Imagem de exemplo : 1', 'Next js Imagem de exemplo : 2', 'Next js Imagem de exemplo : 3'),
('../videos/react.mkv', '../imags/logo/react.png', 'React js', 'React js', '../imags/react_1.png', '../imags/react_2.png', '../imags/react_3.png', '20mins', '30mins', '40mins', 'React js Imagem de exemplo : 1', 'React js Imagem de exemplo : 2', 'React js Imagem de exemplo : 3'),
('../videos/nodejs.mkv', '../imags/logo/nodejs.png', 'Node js', 'Node js', '../imags/nodejs_1.png', '../imags/nodejs_2.png', '../imags/nodejs_3.png', '25mins', '44mins', '56mins', 'Node js Imagem de exemplo : 1', 'Node js Imagem de exemplo : 2', 'Node js Imagem de exemplo : 3');