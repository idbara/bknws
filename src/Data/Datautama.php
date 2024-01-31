<?php

namespace Bknws\Data;

class Datautama
{
    public string $nipBaru;
    public string $nama;
    public string $nipLama;
    public string $gelarDepan;
    public string $gelarBelakang;
    public string $tempatLahir;
    public string $tglLahir;
    public string $jenisKelamin;
    public string $agama;



    public function __construct(string $nipBaru, string $nipLama, string $nama, string $gelarDepan, string $gelarBelakang, string $tempatLahir, string $tglLahir, string $jenisKelamin, string $agama)
    {
        $this->nipBaru = $nipBaru;
        $this->nipLama = $nipLama;
        $this->nama = $nama;
        $this->gelarDepan = $gelarDepan;
        $this->gelarBelakang = $gelarBelakang;
        $this->tempatLahir = $tempatLahir;
        $this->tglLahir = $this->formatDate($tglLahir);
        if($jenisKelamin == 'L') {
            $jenisKelamin = 'M';
        } elseif($jenisKelamin == 'P'){
            $jenisKelamin = 'F';
        }
        $this->jenisKelamin = $jenisKelamin;
        $this->agama = $agama;
    }

    /**
     * format date to d-m-Y
     * @param string $date
     * @return string
     */
    public function formatDate(string $date): string
    {
        $date = date_create($date);
        return date_format($date, 'd-m-Y');
    }

}
