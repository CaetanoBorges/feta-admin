<?php
class Funcoes
{
    public static $conexao = null;

    static function seisDigitos()
    {
        return mt_rand(100000, 999999);
    }

    static function HTTPpost($url, $opt)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($opt));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

     static function enviaSMS($numero, $mensagem)
    {
        // get token
        $enviar = self::HTTPpost("https://app.smshub.ao/api/authentication", ["authId" => "498911022754003650", "secretKey" => '2VMFvQND8kZuovZgOiQBGES0SpoQmzvBZGO6csfE6HtZGXMx3KYWFWaVbuSZBAyPLepv4DTbMldzkq0XaYPHfwxMFLHuVP9WGjXW']);
        $res = (array) json_decode($enviar);
        $data = (array) $res['data'];

        // set post fields
        $post['name'] = "VALUIST";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://app.smshub.ao/api/sender");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'accessToken:' . $data['authToken']
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $res = curl_exec($ch);
        curl_close($ch);

        // set post fields
        $post['contactNo'] = [$numero];
        $post['message'] = $mensagem;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://app.smshub.ao/api/sendsms");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $res = curl_exec($ch);
        curl_close($ch);


        return $res;
    }
    
    static function enviaNotificacao($numero, $mensagem): void{
        //$numero = $Admin->pegaTelefone($quem);
        self::enviaSMS($numero, $mensagem);
    }

    static function enviaEmail($mail, $email, $titulo, $corpo, $confPath = "email.conf.json")
    {
        $conf = file_get_contents($confPath);

        $configuracao = (array) json_decode($conf);

        // Passing `true` enables exceptions
        //Server settings
        $mail->SMTPDebug = 0;           // Enable verbose debug output
        $mail->isSMTP();  // Set mailer to use SMTP
        $mail->Host = $configuracao['servidor'];  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;   // Enable SMTP authentication
        $mail->Username = $configuracao['usuario'];         // SMTP username
        $mail->Password = $configuracao['palavra_passe'];           // SMTP password
        $mail->SMTPSecure = $configuracao['seguranca']; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $configuracao['porta']; // TCP port to connect to

        //Recipients
        $mail->setFrom($configuracao['usuario'], $configuracao['nome']);
        //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress($email);   // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);          // Set email format to HTML
        $mail->Subject = mb_convert_encoding($titulo, 'ISO-8859-1');
        $mail->Body    = $corpo;
        $mail->AltBody = $corpo;


        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    static function chaveDB()
    {
        return uniqid();
    }

    static function data()
    {
        $data['dia'] = date('d');
        $data['mes'] = date('m');
        $data['ano'] = date('y');
        return $data;
    }

    static function conexao()
    {

        if (isset(self::$conexao)) {
            return self::$conexao;
        }

        self::$conexao = new \PDO("mysql:host=localhost;dbname=fetafacil", "root", "");
        return self::$conexao;
    }

    static function substituiEspacoPorMais($variavel)
    {
        return str_replace(" ", "+", $variavel);
    }
    static function fazHash($valor)
    {
        return hash("sha512", $valor);
    }
    static function quando($quando)
    {
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y H:i:s A", $quando);
    }
    static function quandoo($quando)
    {
        date_default_timezone_set("Africa/Luanda");
        return date("d-m-Y", $quando);
    }
    static function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

   static function extenso( $valor = 0, $bolExibirMoeda = true, $bolPalavraFeminina = false )
    {
 
        $valor = ( $valor );
 
        $singular = null;
        $plural = null;
 
        if ( $bolExibirMoeda )
        {
            $singular = array("centavo", "kwanza", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("centavos", "kwanzas", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
        else
        {
            $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
            $plural = array("", "", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
        }
 
        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezessete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
 
 
        if ( $bolPalavraFeminina )
        {
        
            if ($valor == 1) 
            {
                $u = array("", "uma", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            else 
            {
                $u = array("", "um", "duas", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
            }
            
            
            $c = array("", "cem", "duzentas", "trezentas", "quatrocentas","quinhentas", "seiscentas", "setecentas", "oitocentas", "novecentas");
            
            
        }
 
 
        $z = 0;
 
        $valor = number_format( $valor, 2, ".", "." );
        $inteiro = explode( ".", $valor );
 
        for ( $i = 0; $i < count( $inteiro ); $i++ ) 
        {
            for ( $ii = mb_strlen( $inteiro[$i] ); $ii < 3; $ii++ ) 
            {
                $inteiro[$i] = "0" . $inteiro[$i];
            }
        }
 
        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $rt = null;
        $fim = count( $inteiro ) - ($inteiro[count( $inteiro ) - 1] > 0 ? 1 : 2);
        for ( $i = 0; $i < count( $inteiro ); $i++ )
        {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
 
            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $inteiro ) - 1 - $i;
            $r .= $r ? " " . ($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ( $valor == "000"){
                $z++;
            }elseif ( $z > 0 ){
                $z--;
            }
                
                
            if ( ($t == 1) && ($z > 0) && ($inteiro[0] > 0) ){
                $r .= ( ($z > 1) ? " de " : "") . $plural[$t];
            }
                
                
            if ( $r ){
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
            }
        }
 
        $rt = mb_substr( $rt, 1 );
 
        return($rt ? trim( $rt ) : "zero");
 
    }

   
}
