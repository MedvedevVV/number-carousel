#
#реализация карусели номеров для клиента. При звонке в АОН родставляется рандомный из списка.
#

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$fd = fopen("http_route.log", 'w') or die("не удалось создать файл"); //лог-файл
$mytime = strval(time()); //текущее время
fwrite($fd, ('Request '. $mytime . PHP_EOL));
fwrite($fd, ($postData . PHP_EOL));

$anis=array("number1","number2","number3","number4","number5");

$ani=$anis[array_rand($anis,1)];
$answer=json_encode(Array("cgpn"=>$ani,"tag"=>"100"));
header('Content-type: application/json');
echo $answer;

fwrite($fd, $answer.PHP_EOL);
fclose($fd);
?>
