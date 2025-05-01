<?php
function sifre_olustur($dosyaAdi, $uzunluk){
    try{
        if($uzunluk < 16 || $uzunluk > 4096){
            throw new Exception("Password length must be between 16 and 4096.");/*you can adjust the limit from if block if you want to*/
        }

        $yarimUzunluk = max(16,intval($uzunluk /2));
        $parca1 = base64_encode(random_bytes($yarimUzunluk)).strrev(hash('sha256',time().random_bytes(10)));
        $parca2 = base64_encode(random_bytes($yarimUzunluk)).time().bin2hex(random_bytes($yarimUzunluk));
        $sifre = str_shuffle(strrev($parca1).$parca2);
        $sifre = substr($sifre, 0, $uzunluk);

        $dosya =$dosyaAdi.time().".txt";
        if(file_exists($dosya)){
            throw new Exception("File already exists: $dosya");
        }
        if(file_put_contents($dosya, $sifre)===false){
            throw new Exception("File couldn't be written: $dosya");
        }

        chmod($dosya,0600);

        echo "Password saved to file: $dosya\n";
        echo "Generated password: ".substr($sifre, 0, 16) . "...\n";

        unset($sifre);
    }catch(Exception $hata){
        echo "Error: " . $hata->getMessage() . "\n";
        exit(1);
}}

if($argc < 3){
    echo "Usage: php sifre.php <file_name> <password length>\n";
    exit(1);
}

sifre_olustur($argv[1], intval($argv[2]));
?>