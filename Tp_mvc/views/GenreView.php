<?php
require_once 'Template.php';
class GenreView {
    public function render($data, $dataEdit) {
        $tpl = new Template('templates/genre.html');
        $dataHtml = '';
        while($row = $data->fetch_assoc()){
            $dataHtml .= "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nama_genre']."</td>
                <td>
                    <div class='action-buttons'>
                        <a href='genre.php?edit=".$row['id']."' class='btn-edit'>Edit</a>
                        <a href='genre.php?hapus=".$row['id']."' class='btn-delete'>Delete</a>
                    </div>
                </td>
            </tr>";
        }
        
        $editRow = $dataEdit ? $dataEdit->fetch_assoc() : null;
        if ($editRow) {
            $tpl->replace('TITLE_FORM', 'Edit Genre');
            $tpl->replace('VALUE_ID', $editRow['id']);
            $tpl->replace('VALUE_NAMA', $editRow['nama_genre']);
            $tpl->replace('BTN_ACTION', 'update');
            $tpl->replace('BTN_TEXT', 'Update');
            $tpl->replace('BTN_CANCEL', "<a href='genre.php' class='btn-cancel'>Cancel</a>");
        } else {
            $tpl->replace('TITLE_FORM', 'Create Genre');
            $tpl->replace('VALUE_ID', '');
            $tpl->replace('VALUE_NAMA', '');
            $tpl->replace('BTN_ACTION', 'add');
            $tpl->replace('BTN_TEXT', 'Submit');
            $tpl->replace('BTN_CANCEL', '');
        }

        $tpl->replace('DATA_GENRE', $dataHtml);
        $tpl->write();
    }
}
?>