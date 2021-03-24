<div class="col-md-8 offset-md-2">
    <h1 class="text-center">DVD z kategorie <?php echo $nazevKategorie ?></h1>
    <div class="row" style="justify-content: center">
    <?php
    foreach ($dvd as $key => $row) {
        echo '<div class="card col-xl-4" style="height: 15rem">
                <div class="card-body">
                    <h5 class="card-title">'.$row->nazev.'</h5>'.
                    '<div>Vydavatel: '.anchor('vydavatel/'.$row->vydavatelID.'/karty', $row->nazevVydavatele, 'class="card-link"').'</div>'.
                    '<div>Režisér: '.anchor('reziser/'.$row->reziserID.'/karty', $row->reziserJmeno, 'class="card-link"').'</div>'.
                    '<div>Rok vydání: '.anchor('rok/'.$row->rok_vydani.'/karty', $row->rok_vydani, 'class="card-link"').'</div>'.
                '</div>
            </div>';
    }


    ?>
    </div>
</div>
