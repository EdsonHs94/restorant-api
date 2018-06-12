<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
          CREATE TABLE IF NOT EXISTS `Referencia` (
          `idReferencia` INT NOT NULL AUTO_INCREMENT,
          `Nombre_Referencia` VARCHAR(45) NOT NULL,
          PRIMARY KEY (`idReferencia`))
        ");

        DB::unprepared("
          CREATE TABLE IF NOT EXISTS `Horario` (
          `idHorario` INT NOT NULL AUTO_INCREMENT,
          `Horario_Entrada` TIME NOT NULL,
          `Horario_Salida` TIME NOT NULL,
          PRIMARY KEY (`idHorario`))
        ");

        DB::unprepared("
          CREATE TABLE IF NOT EXISTS `Rol` (
          `idRol` INT NOT NULL AUTO_INCREMENT,
          `Nombre_Rol` VARCHAR(45) NOT NULL,
          `idHorario` INT NOT NULL,
          PRIMARY KEY (`idRol`),
          INDEX `fk_Rol_Horario1_idx` (`idHorario` ASC),
          CONSTRAINT `fk_Rol_Horario1`
          FOREIGN KEY (`idHorario`)
          REFERENCES `Horario` (`idHorario`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION)
        ");

        DB::unprepared("
          CREATE TABLE IF NOT EXISTS `Usuario` (
          `idUsuario` INT NOT NULL AUTO_INCREMENT,
          `Nombres` VARCHAR(45) NOT NULL,
          `Apellidos` VARCHAR(45) NOT NULL,
          `DNI` VARCHAR(9) NOT NULL,
          `idRol` INT NOT NULL,
          PRIMARY KEY (`idUsuario`, `idRol`),
          INDEX `fk_Usuario_Rol1_idx` (`idRol` ASC),
          CONSTRAINT `fk_Usuario_Rol1`
          FOREIGN KEY (`idRol`)
          REFERENCES `Rol` (`idRol`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION)
        ");

        DB::unprepared("
          CREATE TABLE IF NOT EXISTS `Local` (
          `idLocal` INT NOT NULL AUTO_INCREMENT,
          `Nombre` VARCHAR(45) NOT NULL,
          `Direccion` VARCHAR(45) NOT NULL,
          PRIMARY KEY (`idLocal`))
        ");

        DB::unprepared("
          CREATE TABLE IF NOT EXISTS `Registro_Asistencia` (
          `idAsistencia` INT NOT NULL AUTO_INCREMENT,
          `FechaMarcada` DATETIME NOT NULL,
          `Detalle` VARCHAR(45) NULL,
          `idReferencia` INT NOT NULL,
          `idUsuario` INT NOT NULL,
          `idLocal` INT NOT NULL,
          PRIMARY KEY (`idAsistencia`, `idReferencia`, `idUsuario`, `idLocal`),
          INDEX `fk_Registro_Asistencia_Referencia_idx` (`idReferencia` ASC),
          INDEX `fk_Registro_Asistencia_Usuario1_idx` (`idUsuario` ASC),
          INDEX `fk_Registro_Asistencia_Local1_idx` (`idLocal` ASC),
          CONSTRAINT `fk_Registro_Asistencia_Referencia`
            FOREIGN KEY (`idReferencia`)
            REFERENCES `Referencia` (`idReferencia`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_Registro_Asistencia_Usuario1`
          FOREIGN KEY (`idUsuario`)
            REFERENCES `Usuario` (`idUsuario`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION,
          CONSTRAINT `fk_Registro_Asistencia_Local1`
            FOREIGN KEY (`idLocal`)
            REFERENCES `Local` (`idLocal`)
            ON DELETE NO ACTION
            ON UPDATE NO ACTION)
        ");



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
