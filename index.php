
        <?php
        include 'auxiliar.php';

        cabecera();

        const OP = ['+', '-', '*', '**', '/', '%'];
        const PAR = ['primerOp' => 0, 'segundoOp' => 0, 'operacion' => '+'];

        $error = [];

        extract(array_map('trim', compruebaParametros(PAR, $error)));
        comprobarValores($primerOp, $segundoOp, $operacion, OP, $error);
        formulario($primerOp, $segundoOp, $operacion);

        if (empty($error)){
            mostrarResultado($primerOp, $segundoOp, $operacion);
        } else {
            motrarErrores($error);
        }

        pie();
        ?>
