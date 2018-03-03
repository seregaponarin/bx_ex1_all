<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <nav class="nav">
        <div class="inner-wrap">
            <div class="menu-block popup-wrap">
                <a href="" class="btn-menu btn-toggle"></a>
                <div class="menu popup-block">
                    <ul class="">

                        <?php $previousLevel = 0;?>
                        <?php foreach($arResult as $arItem):?>

                            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
                            <?endif?>

                            <?if ($arItem["PERMISSION"] > "D"):?>
                                <?if ($arItem["IS_PARENT"]):?>
                                    <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><ul>
                                    <?if($arItem["PARAMS"]["MENU_TEXT"]):?>
                                        <div class="menu-text"><?=$arItem["PARAMS"]["MENU_TEXT"]?></div>
                                    <?endif;?>
                                <?else:?>
                                    <li class="<?=($arItem["PARAMS"]["CLASS"] ? $arItem["PARAMS"]["CLASS"] : "")?>">
                                        <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                                    </li>
                                <?endif;?>
                            <?endif;?>


                            <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
                        <?endforeach;?>

                        <?if ($previousLevel > 1)://close last item tags?>
                            <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
                        <?endif?>

                    </ul>
                    <a href="" class="btn-close"></a>
                </div>
                <div class="menu-overlay"></div>
            </div>
        </div>
    </nav>
<?endif;?>