<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasicRegisters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
          INSERT INTO Horario(Horario_Entrada, Horario_Salida)
VALUES ('08:00:00', '18:00:00');
INSERT INTO Horario(Horario_Entrada, Horario_Salida)
VALUES ('08:00:00', '16:00:00');


INSERT INTO Rol(Nombre_Rol, idHorario)
VALUES ('Cocinero', 2);
INSERT INTO Rol(Nombre_Rol, idHorario)
VALUES ('Mesero', 2);
INSERT INTO Rol(Nombre_Rol, idHorario)
VALUES ('Administrador', 1);


INSERT INTO Usuario(Nombres, Apellidos,DNI, idRol)
VALUES ('Carlos', 'Sanchez', 47880282, 3);
INSERT INTO Usuario(Nombres, Apellidos,DNI, idRol)
VALUES ('Luis', 'Gonzales', 27823564, 2);
INSERT INTO Usuario(Nombres, Apellidos,DNI, idRol)
VALUES ('Jose', 'Jimenez', 23456778, 2);
INSERT INTO Usuario(Nombres, Apellidos,DNI, idRol)
VALUES ('Jose', 'Jimenez', 76786884, 1);


INSERT INTO Referencia(Nombre_Referencia)
VALUES ('Entrada');
INSERT INTO Referencia(Nombre_Referencia)
VALUES ('Salida');
INSERT INTO Referencia(Nombre_Referencia)
VALUES ('Falta');
INSERT INTO Referencia(Nombre_Referencia)
VALUES ('Tardanza');


INSERT INTO Local(Nombre, Direccion)
VALUES ('La Bistecca - San Miguel', 'Av. de la Marina 2000, San Miguel');
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
