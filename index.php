  <?php
$connectstr_dbhost = 'mysql4.gear.host';
$connectstr_dbname = 'kimai';
$connectstr_dbusername = 'kimai';
$connectstr_dbpassword = 'Gp9RlwKDb~C!';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);

}

$db = new mysqli($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname);


if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql = "create table if not exists pessoa (
    id int not null auto_increment,
    nome varchar(200) not null, 
    primary key(id)
);";

$db->query($sql);

$sql = "create table if not exists secao (
    id int not null auto_increment,
    nome varchar(200) not null, 
    apelido varchar(20) not null,
    primary key(id)
);";

$db->query($sql);


$db->query("insert into pessoa (nome) 
select * from (select 'Eduardo Maciel Dutra') as tmp
where not exists(
    select nome from pessoa where nome = 'Eduardo Maciel Dutra'
);
");

$db->query("insert into secao (nome, apelido) 
select * from (select 'Formação Acadêmica', 'Formação') as tmp
where not exists(
    select nome from secao where nome = 'Formação Acadêmica'
);");
$db->query("insert into secao (nome, apelido) 
select * from (select 'Resumo das Qualificações', 'Resumo') as tmp
where not exists(
    select nome from secao where nome = 'Resumo das Qualificações'
);");
$db->query("insert into secao (nome, apelido) 
select * from (select 'Experiência Profissional', 'Experiência') as tmp
where not exists(
    select nome from secao where nome = 'Experiência Profissional'
);");
$db->query("insert into secao (nome, apelido) 
select * from (select 'Conhecimentos', 'Conhecimentos' as ap) as tmp
where not exists(
    select nome from secao where nome = 'Conhecimentos'
);");


$sql = "SELECT id, nome FROM pessoa WHERE id = 1";
$query = $db->query($sql);

$pessoa = mysqli_fetch_array($query);

$sql = "SELECT id, nome, apelido FROM secao";
$query_secoes = $db->query($sql);

$i = 0;
while($secao = mysqli_fetch_array($query_secoes)) {
  $secoes[$i] = $secao;
  $i++;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Curriculum</title>

  <!-- Bootstrap -->
  <link href="bootstrap.min.css" rel="stylesheet">

  <link href="bootstrap.theme.min.css" rel="stylesheet">

  <link href="theme.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="#">Curriculum</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>>
<?php
  #while($secao = mysqli_fetch_array($query_secoes)) {
  foreach($secoes as $secao) {
    echo '<li><a href="#' . $secao["apelido"] . '">' . $secao["apelido"] . '</a></li>';
  }
?>
          <li><a href="#contact">Contato</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container theme-showcase" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div >

      <h1><?=$pessoa["nome"]?></h1>
      <p class="lead">Analista de Sistemas</p>
    </div>

<?php
  #while($secao = mysqli_fetch_array($query_secoes)) {
  foreach($secoes as $secao) {
    echo '<div class="page-header" id="' . $secao["apelido"] . '">';
    echo '<h1>' .  $secao["nome"] . '</h1>';
    echo '</div>';
  }
?>


  </div>
  <!-- /.container -->


<?php
mysqli_close($db);
?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap.min.js"></script>
  </body>

</html>