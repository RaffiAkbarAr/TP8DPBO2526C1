<?php

/**
 * Kelas Template Engine Sederhana
 * Membaca berkas template HTML statis dan mengganti placeholder dengan konten dinamis
 */
class Template {
    /**
     * Jalur berkas template HTML
     * @var string
     */
    protected $filename;

    /**
     * Isi konten template HTML
     * @var string
     */
    protected $content;

    /**
     * Konstruktor: Membaca berkas template HTML
     * 
     * @param string $filename Jalur file template
     */
    public function __construct($filename) {
        $this->filename = $filename;
        $this->content = file_get_contents($filename);
    }

    /**
     * Mengganti placeholder teks di dalam template dengan konten HTML baru
     * 
     * @param string $old Teks placeholder yang akan diganti (contoh: 'DATA_FILM')
     * @param string $new Konten pengganti baru
     * @return void
     */
    public function replace($old, $new) {
        $this->content = str_replace($old, $new, $this->content);
    }

    /**
     * Mencetak konten HTML yang telah selesai diproses ke output buffer (layar pengguna)
     * 
     * @return void
     */
    public function write() {
        echo $this->content;
    }
}
?>
