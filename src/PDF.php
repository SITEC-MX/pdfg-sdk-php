<?php
/**
 * Sistemas Especializados e Innovación Tecnológica, SA de CV
 * Mpsoft.PDFg - Generador de documentos PDF
 *
 * v.1.0.0.0 - 2018-11-24
 */
namespace Mpsoft\PDFg;

class PDF
{
    private $servidor = "pdfg.svc-sitec.com";

    public function Generar(array $estructura)
    {
        $url = "https://{$this->servidor}/";

        $content = json_encode($estructura);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
}