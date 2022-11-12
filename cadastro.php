<?php
include 'header.php';
?>

<form>
  <div>
    <label for="nome">Digite seu nome</label>
    <input type="text" name="nome" id="nome" />
  </div>
  <div>
    <label for="email">Digite seu e-mail</label>
    <input type="email" name="email" id="email" />
  </div>
  <div>
    <label for="senha">Digite sua senha</label>
    <input type="password" name="senha" id="senha" />
  </div>
  <div>
    <input type="submit" value="Cadastrar" />
  </div>
</form>

<?php
include 'footer.php';
?>