<?php

require_once 'Template.php';

/**
 * Kelas FilmView
 * Bertanggung jawab menyusun tampilan daftar film beserta dropdown relasi sutradara dan genre
 */
class FilmView {

    /**
     * Merender tabel data film, opsi dropdown relasi, dan form ke dalam template HTML
     * 
     * @param mysqli_result $dataFilm Daftar seluruh record film (JOIN sutradara & genre)
     * @param mysqli_result $dataSutradara Daftar seluruh data sutradara untuk dropdown
     * @param mysqli_result $dataGenre Daftar seluruh data genre untuk dropdown
     * @param mysqli_result|null $dataEdit Data record film yang dipilih untuk diedit (opsional)
     * @return void
     */
    public function render($dataFilm, $dataSutradara, $dataGenre, $dataEdit) {
        $tpl = new Template('templates/index.html');
        
        $htmlFilm = '';
        while ($row = $dataFilm->fetch_assoc()) {
            $htmlFilm .= "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['judul_film'] . "</td>
                <td>" . $row['tahun_rilis'] . "</td>
                <td>" . $row['nama_sutradara'] . "</td>
                <td>" . $row['nama_genre'] . "</td>
                <td>
                    <div class='action-buttons'>
                        <a href='index.php?edit=" . $row['id'] . "' class='btn-edit'>Edit</a>
                        <a href='index.php?hapus=" . $row['id'] . "' class='btn-delete'>Delete</a>
                    </div>
                </td>
            </tr>";
        }
        
        $editRow = $dataEdit ? $dataEdit->fetch_assoc() : null;
        
        $htmlSutradara = '';
        while ($row = $dataSutradara->fetch_assoc()) {
            $selected = ($editRow && $editRow['id_sutradara'] == $row['id']) ? 'selected' : '';
            $htmlSutradara .= "<option value='" . $row['id'] . "' $selected>" . $row['nama_sutradara'] . "</option>";
        }
        
        $htmlGenre = '';
        while ($row = $dataGenre->fetch_assoc()) {
            $selected = ($editRow && $editRow['id_genre'] == $row['id']) ? 'selected' : '';
            $htmlGenre .= "<option value='" . $row['id'] . "' $selected>" . $row['nama_genre'] . "</option>";
        }

        if ($editRow) {
            $tpl->replace('TITLE_FORM', 'Edit Film');
            $tpl->replace('VALUE_ID', $editRow['id']);
            $tpl->replace('VALUE_JUDUL', $editRow['judul_film']);
            $tpl->replace('VALUE_TAHUN', $editRow['tahun_rilis']);
            $tpl->replace('BTN_ACTION', 'update');
            $tpl->replace('BTN_TEXT', 'Update');
            $tpl->replace('BTN_CANCEL', "<a href='index.php' class='btn-cancel'>Cancel</a>");
        } else {
            $tpl->replace('TITLE_FORM', 'Create Film');
            $tpl->replace('VALUE_ID', '');
            $tpl->replace('VALUE_JUDUL', '');
            $tpl->replace('VALUE_TAHUN', '');
            $tpl->replace('BTN_ACTION', 'add');
            $tpl->replace('BTN_TEXT', 'Submit');
            $tpl->replace('BTN_CANCEL', '');
        }

        $tpl->replace('DATA_FILM', $htmlFilm);
        $tpl->replace('OP_SUTRADARA', $htmlSutradara);
        $tpl->replace('OP_GENRE', $htmlGenre);
        $tpl->write();
    }
}
?>
