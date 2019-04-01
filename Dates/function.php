<?php

//________________________________FONCTIONS MENU_______________________________
function nav_item($chemin, $intitul, $classnav)
{
    $classe = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $chemin) {
        $classe = $classe.' active';
    }
    return <<<html
    <li class="$classe">
        <a class="$classnav" href="$chemin">$intitul</a>
    </li>
html;
}


function nav_menu($classnav) {
    return nav_item('/index.php', 'accueil', $classnav).
           nav_item('/contact.php', 'contact', $classnav).
           nav_item('/menu.php', 'menu', $classnav).
           nav_item('/dashboard.php', 'Gestion back-office', $classnav);

}

//________________________________FONCTIONS FORMULAIRE_______________________________

function checkbox($name, $value, array $data)
{
    $attribute = '';
    if(isset($data[$name]) && in_array($value, $data[$name])) {
        $attribute .= 'checked';
    }
    return <<<html
        <input type="checkbox"  name="{$name}[]" value="$value" $attribute>
html;
}

function radio($name, $value, array $data)
{
    $attribute = '';
    if(isset($data[$name]) && ($value === $data[$name])) {
        $attribute .= 'checked';
    }
    return <<<html
        <input type="radio"  name="$name" value="$value" $attribute>
html;
}

//________________________________FONCTIONS DATE_______________________________

function creneaux_html(array $creneaux)
{
    if(empty($creneaux)) {
        return "fermé";
    }

    $phrase = [];
    foreach ($creneaux as $creneau) {
    $phrase[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    }
    return "Ouvert ".implode(' et ', $phrase);
}

function in_creneaux(int $heure, array $creneaux)
{
    foreach($creneaux as $creneau) {
        $h_debut = $creneau[0];
        $h_fin = $creneau[1];

        if($heure > $h_debut && $heure < $h_fin) {
            return true;
            }
        }
    return false;
}

function select($name, $value, $options)
{
    $html_options = [];
    foreach($options as $k => $option) {
        $attributes = $k == $value ? ' selected' : '';
        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select class='control-form' name='$name'>".implode($html_options)."</select>";
}
