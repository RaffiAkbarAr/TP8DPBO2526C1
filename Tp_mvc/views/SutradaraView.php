<?php

require_once 'Template.php';

/**
 * Kelas SutradaraView
 * Bertanggung jawab menyusun tampilan data sutradara dan menyuntikkannya ke berkas template
 */
class SutradaraView {

    /**
     * Merender tabel data sutradara dan form (tambah/edit) ke dalam template HTML
     * 
     * @param mysqli_result $data Daftar seluruh record sutradara
     * @param mysqli_result|null $dataEdit Data record sutradara yang dipilih untuk diedit (opsional)
     * @return void
     */
    public function render($data, $dataEdit) {
        $tpl = new Template('templates/sutradara.html');
        $dataHtml = '';

        while ($row = $data->fetch_assoc()) {
            $dataHtml .= "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nama_sutradara'] . "</td>
                <td>" . $row['negara'] . "</td>
                <td>
                    <div class='action-buttons'>
                        <a href='sutradara.php?edit=" . $row['id'] . "' class='btn-edit'>Edit</a>
                        <a href='sutradara.php?hapus=" . $row['id'] . "' class='btn-delete'>Delete</a>
                    </div>
                </td>
            </tr>";
        }

        $editRow = $dataEdit ? $dataEdit->fetch_assoc() : null;

        if ($editRow) {
            $tpl->replace('TITLE_FORM', 'Edit Sutradara');
            $tpl->replace('VALUE_ID', $editRow['id']);
            $tpl->replace('VALUE_NAMA', $editRow['nama_sutradara']);
            $tpl->replace('VALUE_NEGARA', $editRow['negara']);
            $tpl->replace('BTN_ACTION', 'update');
            $tpl->replace('BTN_TEXT', 'Update');
            $tpl->replace('BTN_CANCEL', "<a href='sutradara.php' class='btn-cancel'>Cancel</a>");
        } else {
            $tpl->replace('TITLE_FORM', 'Create Sutradara');
            $tpl->replace('VALUE_ID', '');
            $tpl->replace('VALUE_NAMA', '');
            $tpl->replace('VALUE_NEGARA', '');
            $tpl->replace('BTN_ACTION', 'add');
            $tpl->replace('BTN_TEXT', 'Submit');
            $tpl->replace('BTN_CANCEL', '');
        }

        $tpl->replace('DATA_SUTRADARA', $dataHtml);
        $tpl->write();
    }
}
?>
