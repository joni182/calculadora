<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        function muestraError($mensaje)
        {
          echo "<h3>Error: $mensaje </h3>\n";
          exit(1);
        }

        $primerOperando = trim(isset($_GET['primerOp']) ? $_GET['primerOp'] : '0');
        $segundoOperando = trim(isset($_GET['segundoOp']) ? $_GET['segundoOp'] : '0');
        $operacion = trim(isset($_GET['oper']) ? $_GET['oper'] : '+');

        ?>

        <form action="" method="get">
            <label for="primerOp">Primer operando</label>
            <input id="primerOp" type="text" name="primerOp" value="<?= $primerOperando  ?>"><br>
            <label for="segundoOp">Segundo operando</label>
            <input id="segundoOp" type="text" name="segundoOp" value="<?= $segundoOperando  ?>"><br>
            <label for="oper">Operación</label>
            <!--<input id="oper" type="text" name="oper" value=""><br> -->

            <select id='oper' name="oper">
              <?php foreach (['+', '-', '*'. '/'] as $op): ?>
                <? "<option value="$op">$op</option>"  ?>
              <?php endforeach; ?>
            </select>
            <input type="submit" value="Calcular">
        </form>

        <?php
        if (!empty($primerOperando) || !empty($segundoOperando) || !empty($operacion)) {
            if ($operacion == '+' || $operacion == '-' || $operacion == '*' || $operacion == '/') {
                if (!ctype_digit($primerOperando) || !ctype_digit($segundoOperando)){
                    muestraError('Primer y segundo operando deben de ser números');
                } else {
                    switch ($operacion) {
                        case '+':
                        $res = $primerOperando + $segundoOperando;
                        break;
                        case '-':
                        $res = $primerOperando - $segundoOperando;
                        break;
                        case '*':
                        $res = $primerOperando * $segundoOperando;
                        break;
                        case '/':
                        if ($segundoOperando === '0') {
                          muestraError('No es posible dividir por cero');
                        }
                        $res = $primerOperando / $segundoOperando;
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
