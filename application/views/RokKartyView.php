

<div class="col-md-8 offset-md-2">
    <h1 class="text-center">Filmy z roku <?php echo $rok ?></h1>
    <div class="row" style="justify-content: center">
    <?php
    foreach ($dvd as $key => $row) {
        echo '<div class="card col-xl-4" style="height: 15rem">
                <div class="card-body">
                    <h5 class="card-title">'.$row->nazev.'</h5>'.
                    '<div>Kategorie: '.anchor('kategorie/'.$row->kategorieID.'/karty', $row->nazevKategorie, 'class="card-link"').'</div>'.
                    '<div>Vydavatel: '.anchor('vydavatel/'.$row->vydavatelID.'/karty', $row->nazevVydavatel, 'class="card-link"').'</div>'.
                    '<div>Režisér: '.anchor('reziser/'.$row->reziserID.'/karty', $row->reziserJmeno, 'class="card-link"').'</div>'.
                '</div>
            </div>';
    }



    ?>
    </div>
</div>
