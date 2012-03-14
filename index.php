<?php
//LLAMADA: http://antonio.sejas.es/proyectos/google/traductor/?texto=hobbies&from=en&to=es&json
//LLAMADA: http://antonio.sejas.es/proyectos/google/traductor/?texto=hobbies&from=en&to=es
//LLAMADA: http://antonio.sejas.es/proyectos/google/traductor/?texto=hobbies
//VIA:http://code.google.com/intl/es-ES/apis/language/translate/v2/using_rest.html 

/*EJemplo respuesta de google JSON
{
 "data": {
  "translations": [
   {
    "translatedText": "Hallo Welt"
   }
  ]
 }
}
*/
$debug=0;

$textoATraducir=$_GET['texto'];
$googleApiKey='';//mynetsky
$from=isset($_GET['from'])? ('&source='.$_GET['from']):'';//si nonos pasan el from , deducimos que es ingles
$to=isset($_GET['to'])?$_GET['to']:'es';//si nonos pasan el from , deducimos que es español

$urlRequest='https://www.googleapis.com/language/translate/v2?key='.$googleApiKey.$from.'&target='.$to.'&q='.$textoATraducir;
 $traduccionJson=file_get_contents($urlRequest);

$respuesta=json_decode($traduccionJson,true);//True lo convierte en array.

if ($debug){
	echo 'urlRequest'.$urlRequest;
	echo 'traduccionJson'.$traduccionJson;
	echo 'respuesta'.var_dump($respuesta);
echo $respuesta->data->translations->translatedText;
}

//echo $respuesta->{'data'}->{'translations'}->{'0'}->{'translatedText'};




if(isset($_GET['json'])){
	echo $traduccionJson;
}else{
	echo $respuesta['data']['translations'][0]['translatedText'];
}


?>
