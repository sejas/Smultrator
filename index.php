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

if(isset($_GET['info'])){
echo '<table border="1">
  <thead>
    <tr>
      <th>Language</th>
      <th>Language code</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Afrikaans</td>
      <td><code>af</code></td>
    </tr>
     <tr>
      <td>Albanian</td>
      <td><code>sq</code></td>
    </tr>
    <tr>
      <td>Arabic</td>
      <td><code>ar</code></td>
    </tr>
     <tr>
      <td>Belarusian</td>
      <td><code>be</code></td>
    </tr>
     <tr>
      <td>Bulgarian</td>
      <td><code>bg</code></td>
    </tr>
     <tr>
      <td>Catalan</td>
      <td><code>ca</code></td>
    </tr>
     <tr>
      <td>Chinese Simplified</td>
      <td><code>zh-CN</code></td>
    </tr>
     <tr>
      <td>Chinese Traditional</td>
      <td><code>zh-TW</code></td>
    </tr>
     <tr>
      <td>Croatian</td>
      <td><code>hr</code></td>
    </tr>
     <tr>
      <td>Czech</td>
      <td><code>cs</code></td>
    </tr>
    <tr>
      <td>Danish</td>
      <td><code>da</code></td>
    </tr>
    <tr>
      <td>Dutch</td>
      <td><code>nl</code></td>
    </tr>
    <tr>
      <td>English</td>
      <td><code>en</code></td>
    </tr>
    <tr>
      <td>Estonian</td>
      <td><code>et</code></td>
    </tr>
    <tr>
      <td>Filipino</td>
      <td><code>tl</code></td>
    </tr>
    <tr>
      <td>Finnish</td>
      <td><code>fi</code></td>
    </tr>
    <tr>
      <td>French</td>
      <td><code>fr</code></td>
    </tr>
    <tr>
      <td>Galician</td>
      <td><code>gl</code></td>
    </tr>
    <tr>
      <td>German</td>
      <td><code>de</code></td>
    </tr>
    <tr>
      <td>Greek</td>
      <td><code>el</code></td>
    </tr>
    <tr>
      <td>Hebrew</td>
      <td><code>iw</code></td>
    </tr>
    <tr>
      <td>Hindi</td>
      <td><code>hi</code></td>
    </tr>
    <tr>
      <td>Hungarian</td>
      <td><code>hu</code></td>
    </tr>
    <tr>
      <td>Icelandic</td>
      <td><code>is</code></td>
    </tr>
    <tr>
      <td>Indonesian</td>
      <td><code>id</code></td>
    </tr>
    <tr>
      <td>Irish</td>
      <td><code>ga</code></td>
    </tr>
    <tr>
      <td>Italian</td>
      <td><code>it</code></td>
    </tr>
    <tr>
      <td>Japanese</td>
      <td><code>ja</code></td>
    </tr>
    <tr>
      <td>Korean</td>
      <td><code>ko</code></td>
    </tr>
    <tr>
      <td>Latvian</td>
      <td><code>lv</code></td>
    </tr>
    <tr>
      <td>Lithuanian</td>
      <td><code>lt</code></td>
    </tr>
    <tr>
      <td>Macedonian</td>
      <td><code>mk</code></td>
    </tr>
    <tr>
      <td>Malay</td>
      <td><code>ms</code></td>
    </tr>
    <tr>
      <td>Maltese</td>
      <td><code>mt</code></td>
    </tr>
    <tr>
      <td>Norwegian</td>
      <td><code>no</code></td>
    </tr>
    <tr>
      <td>Persian</td>
      <td><code>fa</code></td>
    </tr>
    <tr>
      <td>Polish</td>
      <td><code>pl</code></td>
    </tr>
    <tr>
      <td>Portuguese</td>
      <td><code>pt</code></td>
    </tr>
    <tr>
      <td>Romanian</td>
      <td><code>ro</code></td>
    </tr>
    <tr>
      <td>Russian</td>
      <td><code>ru</code></td>
    </tr>
    <tr>
      <td>Serbian</td>
      <td><code>sr</code></td>
    </tr>
    <tr>
      <td>Slovak</td>
      <td><code>sk</code></td>
    </tr>
    <tr>
      <td>Slovenian</td>
      <td><code>sl</code></td>
    </tr>
    <tr>
      <td>Spanish</td>
      <td><code>es</code></td>
    </tr>
    <tr>
      <td>Swahili</td>
      <td><code>sw</code></td>
    </tr>
    <tr>
      <td>Swedish</td>
      <td><code>sv</code></td>
    </tr>
    <tr>
      <td>Thai</td>
      <td><code>th</code></td>
    </tr>
    <tr>
      <td>Turkish</td>
      <td><code>tr</code></td>
    </tr>
    <tr>
      <td>Ukrainian</td>
      <td><code>uk</code></td>
    </tr>
    <tr>
      <td>Vietnamese</td>
      <td><code>vi</code></td>
    </tr>
     <tr>
      <td>Welsh</td>
      <td><code>cy</code></td>
    </tr>
     <tr>
      <td>Yiddish</td>
      <td><code>yi</code></td>
    </tr>
  </tbody>
</table>';
}

?>
