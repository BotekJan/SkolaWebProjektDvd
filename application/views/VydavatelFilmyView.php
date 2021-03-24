<div class="col-md-8 offset-md-2">
    <h1 class="text-center">Filmy od vydavatele: <?php echo $nazevVydavatel ?></h1>

    <?php

    $this->table->set_heading('Název', 'Kategorie', 'Režisér', 'Rok');

    foreach ($dvd as $key => $row) {
        $this->table->add_row(
            $row->nazev,
            anchor('kategorie/'.$row->kategorieID.'/seznam', $row->nazevKategorie),
            anchor('reziser/'.$row->reziserID, $row->reziserJmeno.'/karty'),
            anchor('rok/'.$row->rok_vydani.'/karty', $row->rok_vydani)
        );
    }

    $template = array(
        'table_open'            => '<table class="table table-striped table-bordered">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
    );

    $this->table->set_template($template);

    echo $this->table->generate();

    ?>
</div>
