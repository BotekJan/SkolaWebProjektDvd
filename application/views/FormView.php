<h2>Formulář</h2>

<?php
$this->load->helper('form');

echo form_open('form/send');
?>
<div class="form-group">
<?php
echo form_label('Název dvd', 'name');
echo form_input('name', '', 'class="form-control"');

echo form_label('Kategorie', 'kategorie');
echo form_dropdown('kategorie', $kategorie, '' , 'class="form-control"');
?>
</div>
<?php
echo form_submit('submit', 'odeslat', 'class="btn btn-primary"');
?>
