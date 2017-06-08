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
          <li><a href="#contact">Contato</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <div class="container theme-showcase" role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->

    <div class="starter-template" id="contact">

      <h1>Eduardo Maciel Dutra</h1>
      <p class="lead">Analista de Sistemas</p>
    </div>

    <div class="page-header">
      <h1>Formação Acadêmica</h1>
    </div>

    <div class="page-header">
      <h1>Formação Acadêmica</h1>
    </div>

    <div class="page-header">
      <h1>Experiência</h1>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Habib's</h3>
      </div>
      <div class="panel-body">
        Panel content
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Banco Itaú</h3>
      </div>
      <div class="panel-body">
        Panel content
      </div>
    </div>

    <div class="page-header">
      <h1>Formação Acadêmica</h1>
    </div>

  </div>
  <!-- /.container -->


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

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($db) . PHP_EOL;



$sql = "create table if not exists pessoa (
    id int not null auto_increment,
    nome varchar(200) not null, 
    primary key(id)
);";

$db->query($sql);

//echo 'Registros encontrados: ' . $x->num_rows;

//$db->query("insert into pessoa (nome) values ('Daniela Monteiro');");

/*?>
    <table>
      <th>
        <td>Id</td>
        <td>Nome</td>
        <th>
          <?

// Executa uma consulta que pega cinco notícias
$sql = "SELECT id, nome FROM pessoa";
$query = $db->query($sql);

while ($dados = mysqli_fetch_array($query)) {
  echo '<tr><td>' . $dados['id'] . '</td>';
  echo '<td>' . $dados['nome'] . '</td></tr>';
}

?>
            <table>
              <?
echo '<p>Registros encontrados: ' . $query->num_rows . '</p>';*/


mysqli_close($db);

 ?>


                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="jquery.min.js"></script>
                <!-- Include all compiled plugins (below), or include individual files as needed -->
                <script src="bootstrap.min.js"></script>
</body>

</html>