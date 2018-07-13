<?php include 'CalcIP.php';?>

<html>
<head>
<style>
body {
    font-style: normal;
        font-weight: 500;
        font-family: Andele mono monospace;
        font-size: 25px;
        line-height: 1.2;
        background: radial-gradient(#EED5D2,#CDB7B5, #8B7D7B);
    }
    .resultado{
    border-style: double;
        border-top: 5px double #CD6090;
        border-left: 5px double #CD6090;
        border-right: 5px double #CD6090;
        border-bottom: 5px double #CD6090;
        background-color: #EED5D2;
        color: #CD6090;
    }


</style>
</head>
</html>
<?php
    if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
        $ip = new CalcIP( $_POST['ip'] );

        if( $ip->valida_endereco() ) {
            echo '<h2>Configurações de rede para <span style="color: #CD6090;">' . $_POST['ip'] . '</span> </h2>';
            echo "<pre class='resultado'>";

            echo "<b> -> Quantidade de sub-redes = </b>" . $ip->qtd_sub()  . '<br>';
            echo "<b> -> Quantidade de endereços por sub-rede = </b>" . $ip->end_sub() . '<br>';
            echo "<b> -> Quantidade de Endereços de hosts em cada sub-rede = </b>" . $ip->host_rede() . '<br>';
            echo "<b> -> Primeiro Endereço de Host = </b>" . $ip->primeiro_ip() . '<br>';
            echo "<b> -> Último Endereço de Host = </b>" . $ip->ultimo_ip() . '<br>';
            echo "<b> -> Broadcast da Rede = </b>" . $ip->broadcast_rede() . '<br>';
            echo "<b> -> Máscara de sub-rede em formato decimal = </b>" . $ip->mascara_dec() . '<br>';
            echo "<b> -> Classe que o IP pertence = </b>" . $ip->classe_ip() . '<br>';
            echo "<b> -> IP Público ou Privado = </b>" . $ip->endereco_completo() . '<br>';

            echo "</pre>";

        } else {
            echo 'Endereço IP inválido!' ;
        }
    }
