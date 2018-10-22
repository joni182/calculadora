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
