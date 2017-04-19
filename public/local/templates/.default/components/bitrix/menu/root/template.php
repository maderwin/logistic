<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="hidden-xs hidden-sm">
    <ul>
<?php
            $level = 0;
            $tab = function($level, $d=0) { return implode('', array_fill(0, $level * 2 + $d, "\t")); };
            for($i = 0; $i < sizeof($arResult); $i++){
                $arItem = $arResult[$i];
                $arNextItem = $arResult[$i+1];
                if($arItem["DEPTH_LEVEL"] > $arParams["MAX_LEVEL"]){
                    continue;
                }

                echo $tab($arItem["DEPTH_LEVEL"], 0) . '<li' . ($arItem["SELECTED"] ? ' class="selected"':'') . '>' ."\n";

                echo $tab($arItem["DEPTH_LEVEL"], 1) . '<a href="' . $arItem["LINK"] . '" >' . $arItem["TEXT"] .'</a>' . "\n";

                if($arNextItem["DEPTH_LEVEL"] > $arItem["DEPTH_LEVEL"]) {
                    echo $tab($arItem["DEPTH_LEVEL"], 1) . '<ul class="next_menu">' . "\n";
                } elseif (!is_null($arNextItem) && $arNextItem["DEPTH_LEVEL"] < $arItem["DEPTH_LEVEL"]) {
                    echo $tab($arItem["DEPTH_LEVEL"], 0) . '</li>' . "\n";
                    echo $tab($arItem["DEPTH_LEVEL"], -1) . '</ul>' . "\n";
                    echo $tab($arItem["DEPTH_LEVEL"], -2) . '</li>' . "\n";
                } else {
                    echo $tab($arItem["DEPTH_LEVEL"]) . '</li>' . "\n";
                }

                $level = $arItem["DEPTH_LEVEL"];
            }
        ?>
        <?for($i = $level; $i > 1; $i--):?></ul></li><?endfor;?>
    </ul>
</nav>
<div class="nav_mobile hidden-lg hidden-md">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="85" height="55" viewBox="0 0 85 55">
        <image width="85" height="55" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFUAAAA3CAMAAABKF/Y5AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAP1BMVEUAAAD///////////////////////////////////////////////////////////////////////////8AAABDBdx4AAAAE3RSTlMAHpbf+/yXRfFEIfCY4fnzR0aVYWau9QAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAB9SURBVFjD7ZVZDoAgDAVfBVxYRO3976qGK7QfJG8OMCEN7QCQJUS1IoVV8LHtZsrBfgC5GEtVS0Y1l6pWNAdrw+lgPZ3e6jPX3M2lPQOX+X+9/zWQpSUzZWpjtwghUyGPYWNjeNhYNpaNZWMJIQOXO+Bys3zuKxvLxk7U2BfmsMjPLBWLqgAAAABJRU5ErkJggg=="/>
    </svg>
</div>
<?endif?>