<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        const OP = ['+', '-', '*', '**', '/', '%'];
        const PAR = ['op', 'op1', 'op2'];
        function muestraError($mensaje)
        {
          echo "<h3>Error: $mensaje </h3>\n";
          exit(1);
        }

        function selected($op1, $op2)
        {
            return $op1 == $op2 ? 'selected' : '';
        }
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
            if (!in_array($operacion, PAR)) {
                $error[] = ' El operador no es válido';
            }
        }
        ?>

        <form action="" method="get">
            <label for="primerOp">Primer operando</label>
            <input id="primerOp" type="text" name="primerOp" value="<?= $primerOp  ?>"><br>
            <label for="segundoOp">Segundo operando</label>
            <input id="segundoOp" type="text" name="segundoOp" value="<?= $segundoOp  ?>"><br>
            <label for="oper">Operación</label>
            <select id='oper' name="oper">
                <?php foreach (OP as $op): ?>
                    <option value='<?= $op ?>' <?= selected($op, $operacion) ?>>
                        <?= $op ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Calcular">
        </form>


        <?php if (empty($error)): ?>
            <?php switch ($operacion) {
                case '+':
                $res = $primerOp + $segundoOp;
                break;
                case '-':
                $res = $primerOp - $segundoOp;
                break;
                case '*':
                $res = $primerOp * $segundoOp;
                break;
                case '**':
                $res = $primerOp ** $segundoOp;
                break;
                case '%':
                $res = $primerOp % $segundoOp;
                break;
                case '/':
                if ($segundoOp === '0') {
                  muestraError("Indeterminado, no existe ningún número que pueda expresarse como $primerOp/0");
                }
                $res = $primerOp / $segundoOp;
                break;
                default:
                    // code...
                break;
            } ?>

            <h3><?= $res  ?></h3>

            <?php else: ?>
                <?php foreach ($error as $value): ?>
                    <h3><?= $value ?></h3>
                <?php endforeach; ?>
            <?php endif; ?>
    </body>
</html>
