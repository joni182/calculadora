<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'auxiliar.php';

        const OP = ['+', '-', '*', '**', '/', '%'];
        const PAR = ['primerOp' => 0, 'segundoOp' => 0, 'operacion' => '+'];

        // Comprobación de parámetros
        $error = [];

        $primerOp = $segundoOp = $operacion = null;

        if (empty($_GET)){
            extract(PAR);
        } elseif (empty(array_diff_key($_GET, PAR)) &&
                  empty(array_diff_key(PAR, $_GET))) {
            extract($_GET, EXTR_IF_EXISTS);
        } else {
            $error[] = 'Los parametros recibidos no son los correctos';
        }

        $res = "";

        if (empty($error)) {
            if (!is_numeric($primerOp)) {
                $error[] = 'El primer operador no es un número';
            }
            if (!is_numeric($segundoOp)) {
                $error[] = 'El primer operador no es un número';
            }
            if (!in_array($operacion, OP)) {
                $error[] = ' El operador no es válido';
            }
        }
        ?>
        <?php formulario($primerOp, $segundoOp, $operacion) ?>
        <?php if (empty($error)): ?>

            <h3><?= calcula($primerOp, $segundoOp, $operacion)  ?></h3>

            <?php else: ?>
                <?php foreach ($error as $value): ?>
                    <h3><?= $value ?></h3>
                <?php endforeach; ?>
            <?php endif; ?>
    </body>
</html>
