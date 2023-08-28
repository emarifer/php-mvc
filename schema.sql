/* Creación de la base de datos */
CREATE DATABASE `mvcdb`;

/* Creación de la tabla contacts */
CREATE TABLE `mvcdb`.`contacts` (
    `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(255) NOT NULL ,
    `phone` VARCHAR(255) NOT NULL ,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;


/* Inserción de algunos registros en la tabla contacts */
INSERT INTO `contacts` (`id`, `name`, `email`, `phone`)
VALUES
(NULL, 'Enrique Marín', 'enrique@gmail.com', '621123456'),
(NULL, 'Julieta Hernández', 'julieta@gmail.com', '621123457'),
(NULL, 'Senderista Intrépido', 'senderista@gmail.com', '621123458');

/* 
ENTRAR EN MARIADB POR LÍNEA DE COMANDOS CON DOCKER:
docker exec -it apps-db mariadb --user root -p

INGRESANDO EL PASSWORD my-secret-pw
 */