use crud;

CREATE TABLE usuarios(
	id int AUTO_INCREMENT PRIMARY KEY,
    login varchar(255) not null,
    senha varchar(255) DEFAULT null
);

CREATE TABLE tarefas(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    descricao varchar(255) not null,
    CONSTRAINT `fk_user_id` foreign key (user_id) references usuarios(id)
);