<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php

        function formulario($op1, $op2, $operacion)
        {
        ?>
          <form action="" method="get">
              <label for="primerOp">Primer operando</label>
              <input id="primerOp" type="text" name="primerOp" value="<?= $op1  ?>"><br>
              <label for="segundoOp">Segundo operando</label>
              <input id="segundoOp" type="text" name="segundoOp" value="<?= $op2  ?>"><br>
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
        }

        function sw($op1, $op2, $op)
        {
          switch ($op) {
              case '+':
              $res = $op1 + $op2;
              break;
              case '-':
              $res = $op1 - $op2;
              break;
              case '*':
              $res = $op1 * $op2;
              break;
              case '**':
              $res = $op1 ** $op2;
              break;
              case '%':
              $res = $op1 % $op2;
              break;
              case '/':
              $res = $op1 / $op2;
              break;
              default:
                  // code...
              break;
          }
          return $res;
        }

        function selected($op1, $op2)
        {
            return $op1 == $op2 ? 'selected' : '';
        }

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
