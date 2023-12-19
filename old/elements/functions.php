<?php

function link_item (string $lien, string $title, string $classe = '', string $svg = '') : string {
  if ($_SERVER['SCRIPT_NAME'] === $lien) {
    $classe .= " active";
  }
  return <<<HTML
    <a class="$classe" href="$lien"><svg><use href="$svg"></use></svg> $title<div class="container-barre">
        <div class="barre"></div>
    </div></a>
HTML;
}

function create_Checkbox (string $name, string $value, array $data) : string {
  $attributes = '';
  if (isset($data[$name]) && in_array($value, $data[$name])) {
    $attributes .= 'checked';
  };
  return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}

function create_Radio (string $name, string $value, array $data) : string {
  $attributes = '';
  if (isset($data[$name]) && $value === $data[$name]) {
    $attributes .= 'checked';
  };
  return <<<HTML
    <input type="radio" name="$name" value="$value" $attributes>
HTML;
}

function creneaux_html (array $creneaux) : string {
  $phrases = [];
  if (count($creneaux) === 0) {
    return 'Fermé';
  }
  foreach ($creneaux as $creneau) {
    $phrases[] = "de <strong>{$creneau[0]} h</strong> à <strong>{$creneau[1]} h</strong>";
  }
  return implode(' et ', $phrases);
}

function in_creneaux (int $heure, array $creneaux) : bool {
  foreach ($creneaux as $creneau) {
    $debut = $creneau[0];
    $fin = $creneau[1];
    if ($heure >= $debut && $heure < $fin) {
      return true;
    }
  }
  return false;
}

function select (string $name, $value, array $options) : string {
  $html_options = [];
  foreach ($options as $key => $option) {
    $attributes = $key == $value ? 'selected' : '';
    $html_options[] = "<option value='$key' $attributes>$option</option>";
  }
  return "<select name='$name'>" . implode($html_options) . '</select>';
}