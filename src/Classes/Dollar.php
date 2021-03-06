<?php

namespace App\Classes;


class Dollar {

    private $dollar;

    public function __construct()
    {
        $url = "https://economia.awesomeapi.com.br/all/USD-BRL";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        try {
            $response = curl_exec($ch);
            $response = json_decode($response, true);
        } catch (Exception $e) {
            echo "Problemas ao efetuar GET";
            echo "\n";
            echo $e->getMessage();
            exit;
        }

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //print_r($httpcode);
        //$erro = curl_error($c);
        curl_close($ch);

        if($httpcode == 200 && empty($erro)){            
            echo 'R$ ';
            $this->setDollar(number_format($response['USD']['high'], 2, ',', '.'));
            //exit;
        }else{
            echo "Problemas ao efetuar GET";
            echo "\n";
            echo $erro;
        }

        
    }

    /**
     * Get the value of dollar
     */
    public function getDollar()
    {
        return $this->dollar;
    }

    /**
     * Set the value of dollar
     *
     * @return  self
     */
    public function setDollar($dollar)
    {
        $this->dollar = $dollar;

        return $this;
    }
}

?>