<?PHP

$host = 'localhost';
$banco = 'mepoupe';
$user = 'root';
$pass = '';
$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
mysql_select_db($banco) or die (mysql_error());

?>