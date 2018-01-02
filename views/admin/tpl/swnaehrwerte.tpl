[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]


<script type="text/javascript">
    <!--
    function loadLang(obj)
    {
        var langvar = document.getElementById("agblang");
        if (langvar != null )
            langvar.value = obj.value;
        document.myedit.submit();
    }
    function editThis( sID )
    {
        var oTransfer = top.basefrm.edit.document.getElementById( "transfer" );
        oTransfer.oxid.value = sID;
        oTransfer.cl.value = top.basefrm.list.sDefClass;

        //forcing edit frame to reload after submit
        top.forceReloadingEditFrame();

        var oSearch = top.basefrm.list.document.getElementById( "search" );
        oSearch.oxid.value = sID;
        oSearch.actedit.value = 0;
        oSearch.submit();
    }
    //-->
</script>

[{if $readonly }]
[{assign var="readonly" value="readonly disabled"}]
[{else}]
[{assign var="readonly" value=""}]
[{/if}]


<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="swnaehrwerte">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>


<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="swnaehrwerte">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="voxid" value="[{ $oxid }]">
    <input type="hidden" name="oxparentid" value="[{ $oxparentid }]">
    <input type="hidden" name="editval[article__oxid]" value="[{ $oxid }]">
    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">
        <tr>
            <td valign="top" class="edittext" style="padding-left:10px;width:50%">
                <table cellspacing="0" cellpadding="0" border="0">
                    [{block name="naehrwerte_main_form"}]
                    [{ if $oxparentid }]
                    <tr>
                        <td class="edittext" width="160">
                            <b>[{ oxmultilang ident="GENERAL_VARIANTE" }]</b>
                        </td>
                        <td class="edittext">
                            <a href="Javascript:editThis('[{ $parentarticle->oxarticles__oxid->value}]');" class="edittext"><b>[{ $parentarticle->oxarticles__oxartnum->value }] [{ $parentarticle->oxarticles__oxtitle->value }]</b></a>
                        </td>
                    </tr>
                    [{ /if}]
                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="ABTROPFGEWICHT"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swabtropfgewicht->fldmax_length}]" name="editval[oxarticles__swabtropfgewicht]" value="[{$edit->oxarticles__swabtropfgewicht->value}]" >
                            [{oxmultilang ident="UNIT_G"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="BRENNWERT"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swcaloric1->fldmax_length}]" name="editval[oxarticles__swcaloric1]" value="[{$edit->oxarticles__swcaloric1->value}]" >
                            [{oxmultilang ident="UNIT_BRENNWERT_1"}]
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swcaloric2->fldmax_length}]" name="editval[oxarticles__swcaloric2]" value="[{$edit->oxarticles__swcaloric2->value}]" >
                            [{oxmultilang ident="UNIT_BRENNWERT_2"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="FETT"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swfat1->fldmax_length}]" name="editval[oxarticles__swfat1]" value="[{$edit->oxarticles__swfat1->value}]" >
                            [{oxmultilang ident="UNIT_G"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{ oxmultilang ident="GESAETTIGTE_FETTSAEUREN" }]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swfat2->fldmax_length}]" name="editval[oxarticles__swfat2]" value="[{$edit->oxarticles__swfat2->value}]">
                            [{oxmultilang ident="UNIT_G"}]
                            [{oxinputhelp ident="HELP_SATURATED_FALLY_ACIDS"}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="UNGESAETTIGTE_FETTSAEUREN"}]
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swfat3->fldmax_length}]" name="editval[oxarticles__swfat3]" value="[{$edit->oxarticles__swfat3->value}]">
                            [{oxmultilang ident="UNIT_G"}]

                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="KOHLENHYDRATE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swcarb->fldmax_length}]" name="editval[oxarticles__swcarb]" value="[{$edit->oxarticles__swcarb->value}]" [{ $readonly }]>
                            [{oxmultilang ident="UNIT_G"}]
                            [{oxinputhelp ident="HELP_KOHLEHYDRATE"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="ZUCKER"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swsugar->fldmax_length}]" name="editval[oxarticles__swsugar]" value="[{$edit->oxarticles__swsugar->value}]" >
                            [{oxmultilang ident="UNIT_G"}]

                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{ oxmultilang ident="EIWEISS" }]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swprotein->fldmax_length}]" name="editval[oxarticles__swprotein]" value="[{$edit->oxarticles__swprotein->value}]" >
                            [{oxmultilang ident="UNIT_G"}]
                            [{oxinputhelp ident="HELP_EIWEISS"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" width="200">
                            [{oxmultilang ident="SALZ"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="16" maxlength="[{$edit->oxarticles__swsalt->fldmax_length}]" name="editval[oxarticles__swsalt]" value="[{$edit->oxarticles__swsalt->value}]" >
                            [{oxmultilang ident="UNIT_G"}]
                            [{oxinputhelp ident="HELP_SALZ"}]
                        </td>
                    </tr>

                    [{/block}]
                    <tr>
                        <td class="edittext" colspan="2"><br><br>
                            <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="NAEHRWERTE_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'"" [{ $readonly }]><br>
                        </td>
                    </tr>
                </table>
            </td>
            <!-- Start right column -->
            <!-- Anfang rechte Seite -->

            <td valign="top" class="edittext" align="left" style="width:100%;height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">
                [{block name="naehrwerte_main_editor"}]
                <fieldset>
                    <legend>[{oxmultilang ident="INGREDIENTS"}]</legend><br>
                    <input type="text" class="editinput" size="100%" 300 name="editval[oxarticles__swingredients]" value="[{$edit->oxarticles__swingredients->value}]" [{ $readonly }]>

                </fieldset>
                [{/block}]
            </td>
        </tr>

    </table>
</form>
[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
