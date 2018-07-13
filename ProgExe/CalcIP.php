<?php
/**
 * Created by PhpStorm.
 * User: Gi Cordeiro
 * Date: 12/07/2018
 * Time: 21:20
 */

class CalcIP
{
    public $endereco;

    public $cidr;

    public $endereco_completo;

    public function __construct($endereco_completo)
    {
        $this->endereco_completo = $endereco_completo;
        $this->valida_endereco();
    }

    public function valida_endereco()
    {

        // EXPRESSÃO
        $exp = '/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\/[0-9]{1,2}$/';

        // IP/CIDR
        if (!preg_match($exp, $this->endereco_completo)) {
            return false;
        }
        $endereco = explode('/', $this->endereco_completo);
        $this->cidr = (int)$endereco[1];
        $this->endereco = $endereco[0];

        if ($this->cidr > 32) {
            return false;
        }

        // VERIFICA CADA NÚMERO IP
        foreach (explode('.', $this->endereco) as $numero) {
            $numero = (int)$numero;
            if ($numero > 255 and $numero < 0) {
                return false;
            }
        }
        return true;
    }

        //IPV4/CIDR
        public function endereco_completo()
        {
            return ($this->endereco_completo);
    }

        //ENDEREÇO IP
        public function endereco()
        {
            return ($this->endereco);
    }

        //CIDR
        public function cidr()
        {
            return ($this->cidr);
    }

        //MÁSCARA DE SUB-REDE
        public function mascara_dec()
        {
        if ($this->cidr() == 0) {
            return '0.0.0.0';
        }
        return (
        long2ip(
            ip2long("255.255.255.255") << (32 - $this->cidr)
        )
        );
    }

        //IP DA REDE
        public function rede()
        {
        if ($this->cidr() == 0) {
            return '0.0.0.0';
        }
        return (
        long2ip(
            (ip2long($this->endereco)) & (ip2long($this->mascara_dec()))
        )
        );
    }

        //IP DO BROADCAST
        public function broadcast_rede()
        {
        if ($this->cidr() == 0) {
            return '255.255.255.255';
        }
        return (
        long2ip(ip2long($this->rede()) | (~(ip2long($this->mascara_dec()))))
        );
    }

        //TOTAL DE IPs
        public function end_sub()
        {
            return (pow(2, (32 - $this->cidr())));
    }

        //QUANTIDADE DE HOSTS
        public function host_rede()
        {
        if ($this->cidr() == 32) {
            return 0;
        } elseif ($this->cidr() == 31) {
            return 0;
        }
        return (abs($this->end_sub() - 2));
    }

        //QUANTIDADE DE SUB-REDES
        public function qtd_sub(){
            $qtd_sub = 256 / $this->end_sub();
            return $qtd_sub;
    }

        //1º IP
        public function primeiro_ip(){
        if ($this->cidr() == 32) {
            return null;
        } elseif ($this->cidr() == 31) {
            return null;
        } elseif ($this->cidr() == 0) {
            return '0.0.0.1';
        }
        return (
        long2ip(ip2long($this->rede()) | 1)
        );
    }

        //ÚLTIMO IP
        public function ultimo_ip(){
        if ($this->cidr() == 32) {
            return null;
        } elseif ($this->cidr() == 31) {
            return null;
        }
        return (
        long2ip(ip2long($this->rede()) | ((~(ip2long($this->mascara_dec()))) - 1))
        );
    }

        //CLASSE PERTENCENTE AO IP
        public function classe_ip(){
        if ($this->endereco() < 128 ){
           $classe = "Classe A";
            return $classe;
        }elseif ($this->endereco() >= 128 AND $this->endereco() < 192 ){
            $classe = "Classe B";
            return $classe;
        }elseif ($this->endereco() >= 192 AND $this->endereco() < 224 ) {
            $classe = "Classe C";
            return $classe;
        }elseif ($this->endereco() >= 224 AND $this->endereco() < 240 ) {
            $classe = "Classe D";
            return $classe;
        }else{
            $this->endereco() >= 240 AND $this->endereco() <= 255;
            $classe = "Classe E";
            return $classe;
        }
        }

        //IP PÚBLICO OU PRIVADO
}