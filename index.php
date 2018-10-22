<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        const OP = ['+', '-', '*', '/'];
        function muestraError($mensaje)
        {
          echo "<h3>Error: $mensaje </h3>\n";
          exit(1);
        }

        function selected($op1, $op2)
        {
            return $op1 == $op2 ? 'selected' : '';
        }

        $primerOp = trim(isset($_GET['primerOp']) ? $_GET['primerOp'] : '0');
        $segundoOp = trim(isset($_GET['segundoOp']) ? $_GET['segundoOp'] : '0');
        $operacion = trim(isset($_GET['oper']) ? $_GET['oper'] : '+');

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

        <?php
        if (!empty($primerOp) || !empty($segundoOp) || !empty($operacion)) {
            if ($operacion == '+' || $operacion == '-' || $operacion == '*' || $operacion == '/') {
                if (!ctype_digit($primerOp) || !ctype_digit($segundoOp)){
                    muestraError('Primer y segundo operando deben de ser números');
                } else {
                    switch ($operacion) {
                        case '+':
                        $res = $primerOp + $segundoOp;
                        break;
                        case '-':
                        $res = $primerOp - $segundoOp;
                        break;
                        case '*':
                        $res = $primerOp * $segundoOp;
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
                    }
                }
            } else {
                muestraError('Error: No se ha introducido una operación correcta: + - * /');
            }

        }
        ?>

        <h3><?= $res  ?></h3>
    </body>
</html>
