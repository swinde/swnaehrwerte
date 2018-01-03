    [{$smarty.block.parent}]
    [{block name="details_tabs_naehrwerte"}]
        [{if $oDetailsProduct->oxarticles__swcaloric1->value}]
            [{capture append="tabs"}]<a href="#testdata" data-toggle="tab">[{oxmultilang ident="NAEHRWERTE_TAB_TITLE"}]</a>[{/capture}]
            [{capture append="tabsContent"}]
            <div id="testdata" class="tab-pane[{if $blFirstTab}] active[{/if}]">[{include file=$oViewConf->getModulePath('sw_naehrwerte',"application/views/flow/tpl/sw_naehrwerte_fe.tpl")}]</div>
            [{assign var="blFirstTab" value=false}]
            [{/capture}]
        [{/if}]
    [{/block}]

