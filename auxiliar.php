<?php

function formulario($op1, $op2, $operacion)
{
?>
  <form action="" method="get">
      <label for="primerOp">Primer operando</label>
      <input id="primerOp" type="text" name="primerOp" value="<?= $op1  ?>"><br>
      <label for="segundoOp">Segundo operando</label>
      <input id="segundoOp" type="text" name="segundoOp" value="<?= $op2  ?>"><br>
      <label for="operacion">Operación</label>
      <select id='operacion' name="operacion">
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

function calcula($op1, $op2, $op)
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

function compruebaParametros($par, &$error)
{
    if (empty($_GET)){
    } elseif (empty(array_diff_key($_GET, PAR)) &&
              empty(array_diff_key(PAR, $_GET))) {

        return array_map('trim', $_GET);
    } else {
        $error[] = 'Los parametros recibidos no son los correctos';
    }
    return $par;
}

function comprobarValores($primerOp, $segundoOp, $operacion, $oper, &$error){
    if (empty($error)) {
        if (!is_numeric($primerOp)) {
            $error[] = 'El primer operador no es un número';
        }
        if (!is_numeric($segundoOp)) {
            $error[] = 'El primer operador no es un número';
        }
        if (!in_array($operacion, $oper)) {
            $error[] = ' El operador no es válido';
        }
    }
}

function mostrarResultado($primerOp, $segundoOp, $operacion){
     ?>
    <h3><?= calcula($primerOp, $segundoOp, $operacion)  ?></h3>
    <?php
}

function motrarErrores($error){
    foreach ($error as $value){
        ?><h3><?= $value ?></h3><?php
    }
}

function pie()
{
    ?>
    </body>
    </html>
    <?php
}

function cabecera()
{
    ?>
    <!DOCTYPE html>
    <html lang="es" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title></title>
        </head>
        <body>
    <?php
}
