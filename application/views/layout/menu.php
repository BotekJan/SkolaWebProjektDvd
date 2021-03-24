<li class="nav-item">
    <?php
    echo anchor('kategorie', 'Seznam Kategorií', 'class="nav-link"');
    ?>
</li>


  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Kategorie</a>
    <div class="dropdown-menu">
      <?php
      $pole = array(
          "class" => "dropdown-item"
      );
        foreach ($dropdown as $key => $row) {
          echo anchor('kategorie/'.$row->id.'/karty', $row->nazev, $pole).PHP_EOL;
          
        }
      ?>
    </div>
  </li>
