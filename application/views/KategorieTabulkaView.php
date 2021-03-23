<ul class="list-group" style="text-align:center">
    <?php
        foreach ($kategorie as $key => $row) {
            echo '<li class="list-group-item">'.anchor('kategorie/'.$row->id.'/seznam', $row->nazev.' ('.$amount[$row->id].')').'</li>';
        }
    ?>
</ul>

