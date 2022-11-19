<?php
include 'header.php';

if(isset($_POST['email']) && isset($_POST['senha'])) {
  
  $sql = "select * from usuarios where email = :email and senha = :senha";
  $stmt = $pdo->prepare($sql);

  $senha = $_POST['senha'];

  $senha = md5(KEY . $senha);

  $stmt->bindParam(':email', $_POST['email']);
  $stmt->bindParam(':senha', $senha);
  $stmt->execute();

  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
  
  if($usuario) {
    echo '<div class="alert alert-success">Login realizado com sucesso!</div>';
  }
  else {
    echo '<div class="alert alert-danger">Os dados inseridos não conferem!</div>';
  }

}
?>

<div class="container">
  <form method="post">
    <div class="mb-3">
      <label for="input_email" class="form-label">Digite seu e-mail</label>
      <input type="email" name="email" class="form-control" id="input_email" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Digite seu e-mail para o login, não compartilhamos dados pessoais.</div>
    </div>
    <div class="mb-3">
      <label for="input_senha" class="form-label">Digite sua Senha</label>
      <input type="password" name="senha" class="form-control" id="input_senha">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
  </form>
</div>
<?php
include 'footer.php';
?>