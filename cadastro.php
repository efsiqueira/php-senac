<?php
include 'header.php';

if(isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['checkbox'])) {
  echo '<div class="alert alert-success">Seu cadastro foi realizado com sucesso!</div>';
  $sql = "insert into usuarios (email, senha) values (:email, :senha)";
  $stmt = $pdo->prepare($sql);

  $senha = $_POST['senha'];

  $senha = md5(KEY . $senha);

  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();
}
?>

<div class="container">
  <form method="post">
    <div class="mb-3">
      <label for="input_email" class="form-label">Digite seu e-mail</label>
      <input type="email" name="email" class="form-control" id="input_email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Digite seu e-mail para o cadastro, não compartilhamos dados pessoais.</div>
    </div>
    <div class="mb-3">
      <label for="input_senha" class="form-label">Digite sua Senha</label>
      <input type="password" name="senha" class="form-control" id="input_senha">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" name="checkbox" class="form-check-input" id="input_termos">
      <label class="form-check-label" for="input_termos">Estou de acordo com a <a href="politica-de-privacidade.php">política de privacidade</a></label>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>
<?php
include 'footer.php';
?>