
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- socio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `socio`;

CREATE TABLE `socio`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(255) NOT NULL,
    `correo` VARCHAR(50),
    `cantidad` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- ahorro
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `ahorro`;

CREATE TABLE `ahorro`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `socio_id` INTEGER NOT NULL,
    `semana` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `ahorro_fi_243464` (`socio_id`),
    CONSTRAINT `ahorro_fk_243464`
        FOREIGN KEY (`socio_id`)
        REFERENCES `socio` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- prestamo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `prestamo`;

CREATE TABLE `prestamo`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `socio_id` INTEGER NOT NULL,
    `cantidad` INTEGER NOT NULL,
    `interes` INTEGER NOT NULL,
    `comentario` VARCHAR(250),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `prestamo_fi_243464` (`socio_id`),
    CONSTRAINT `prestamo_fk_243464`
        FOREIGN KEY (`socio_id`)
        REFERENCES `socio` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- multa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `multa`;

CREATE TABLE `multa`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `socio_id` INTEGER NOT NULL,
    `cantidad` INTEGER NOT NULL,
    `comentario` VARCHAR(250),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `multa_fi_243464` (`socio_id`),
    CONSTRAINT `multa_fk_243464`
        FOREIGN KEY (`socio_id`)
        REFERENCES `socio` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- abono
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `abono`;

CREATE TABLE `abono`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `socio_id` INTEGER NOT NULL,
    `prestamo_id` INTEGER NOT NULL,
    `capital` INTEGER,
    `interes` INTEGER,
    `comentario` VARCHAR(250),
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `abono_fi_243464` (`socio_id`),
    INDEX `abono_fi_31bd8c` (`prestamo_id`),
    CONSTRAINT `abono_fk_243464`
        FOREIGN KEY (`socio_id`)
        REFERENCES `socio` (`id`),
    CONSTRAINT `abono_fk_31bd8c`
        FOREIGN KEY (`prestamo_id`)
        REFERENCES `prestamo` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
