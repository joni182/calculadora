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
        const PAR = ['oper', 'primerOp', 'segundoOp'];

        // Comprobación de parámetros
        $error = [];
        $par = array_keys($_GET);
        sort($par);

        $primerOp = $segundoOp = $operacion = null;

        if (empty($_GET)){
            $primerOp = '0';
            $segundoOp = '0';
            $operacion = '+';
        } elseif ($par == PAR) {
            $primerOp = trim($_GET['primerOp']);
            $segundoOp = trim($_GET['segundoOp']);
            $operacion = trim($_GET['oper']);
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

            <h3><?= $res = sw($primerOp, $segundoOp, $operacion)  ?></h3>

            <?php else: ?>
                <?php foreach ($error as $value): ?>
                    <h3><?= $value ?></h3>
                <?php endforeach; ?>
            <?php endif; ?>
    </body>
</html>
