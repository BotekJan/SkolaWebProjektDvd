<h2>Edit:</h2>

<?php
$this->load->helper('form');

echo form_open('edit/send/'.$dvd->id_dvd.'/'.$pocetNaStranku.'/'.$cisloStranky);
?>
<div class="form-group">
<?php


echo form_label('Název dvd', 'name');
echo form_input('name', $dvd->nazev, 'class="form-control"');

echo form_label('Kategorie', 'kategorie');

echo form_dropdown('kategorie', $listKategorii, $dvd->druh , 'class="form-control"');
?>
</div>
<?php
echo form_submit('submit', '➡️ odeslat', 'class="btn btn-lg btn-primary"');

?>

<button class="btn btn-lg btn-danger" onclick="goBack()">❌ zrušit</button>

<script>
function goBack() {
  window.history.back();
}
</script>
