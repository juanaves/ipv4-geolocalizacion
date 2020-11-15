<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>

<?php
    require_once __DIR__ . '/vendor/autoload.php';
    use Foolz\Inet\Inet;
    use ipinfo\ipinfo\IPinfo;


if (isset($_REQUEST['btnEnviar']) && !empty($_REQUEST['ip'])){
        try{
            $ip_decimal=htmlspecialchars($_REQUEST['ip']);

            $ip = \Foolz\Inet\Inet::dtop($ip_decimal); //3585203480

            echo '<div id="resul" ><h3> IP decimal: '.$ip_decimal.'<span class="material-icons">
            arrow_right_alt
            </span>IP: <span style="color: red">'.$ip.'</span></h3>';

            $details = (new IPinfo())->getDetails($ip);

            echo '<span class="material-icons md-24">
            done_outline
            </span><b>ip: </b>'.$details->ip. '<br>';
            echo '<span class="material-icons md-24">
            done_outline
            </span><b>city: </b>'.$details->city. '<br>';
            echo '<span class="material-icons md-24">
            done_outline
            </span><b>region: </b>'.$details->region. '<br>';
            echo '<span class="material-icons md-24">
            done_outline
            </span><b>country: </b>'.$details->country. '<br>';
            echo '<span class="material-icons md-24">
            done_outline
            </span><b>loc: </b>'.$details->loc. '<br>';
            echo '<span class="material-icons md-24">
            done_outline
            </span><b>postal: </b>'.$details->postal. '<br>';
            echo '<span class="material-icons md-24">
            done_outline
            </span><b>timezone: </b>'.$details->timezone. '<br>
            <input type="reset" id="btnAtras" value="Atras" onClick="history.go(-1);" ></div>'; // onclick="javascript:location.href="demo.php"" 
            

        }catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
}else{

    echo '<html>
    <body onload= "vaciar();" >
        <form method="post" action="">
        <div id="cuadro">
            <h1>IP:</h1>
            <input type="text" id="ip" name="ip" placeholder="Introduce una IP" value="" required><br>
            <p id="valida"></p><br>
            <input type="submit" id="btnIp" value="Enviar" name="btnEnviar">
        <div id="logIn">

        
        <p class="creditos">Paquetes usados: Inet e IPInfo de Packagist</p>
        <p class="creditos">Despliegue de Aplicaciones Web - DAW 2</p>
        <p class="creditos">Ies Ribera de Castilla - 9 de Noviembre de 2020 </p>
        <script type="text/javascript">
            function vaciar(){
                document.getElementById("ip").value="";
            }
        </script>
    </body>
    </html>';

}
?>
