<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace Swinde\SwNaehrwerte\Controller\Admin;


/**
 * Admin article main manager.
 * Collects and updates (on user submit) article base parameters data ( such as
 * title, article No., short Description and etc.).
 * Admin Menu: Manage Products -> Articles -> Main.
 */
class SwNaehrwerte extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController
{
    protected $_sThisTemplate = 'swnaehrwerte.tpl';

    public function render(){

        $myConfig = $this->getConfig();

        parent::render();

        $this->_aViewData["edit"] = $oArticle = oxNew( "oxarticle");

        $soxId = $this->getEditObjectId();
        if ( $soxId != "-1" && isset( $soxId)) {

            //load what I need
            $oDB = oxDb::getDB();

            $sArticleTable = getViewName( 'oxarticles', $this->_iEditLang );
            $sSelect  = " select $sArticleTable.swcaloric1, $sArticleTable.swcaloric2, $sArticleTable.swfat1, $sArticleTable.swfat2, $sArticleTable.swfat3, $sArticleTable.swcarb, $sArticleTable.swsugar, $sArticleTable.swprotein, $sArticleTable.swsalt, $sArticleTable.swingredients  from $sArticleTable";
            $sSelect .= " where $sArticleTable.oxid = '".$soxId."'";


            $rs = $oDB->Execute( $sSelect);
            if ($rs != false && $rs->RecordCount() > 0) {
                while (!$rs->EOF) {
                    $swcaloric1 = new oxField($rs->fields[0]);
                    $swcaloric2 = new oxField($rs->fields[1]);
                    $swfat1 = new oxField($rs->fields[2]);
                    $swfat2 = new oxField($rs->fields[3]);
                    $swfat3 = new oxField($rs->fields[4]);
                    $swcarb = new oxField($rs->fields[5]);
                    $swsugar = new oxField($rs->fields[6]);
                    $swprotein = new oxField($rs->fields[7]);
                    $swsalt = new oxField($rs->fields[8]);
                    $swabtropfgewicht = new oxField($rs->fields[9]);
                    $swingredients = new oxField($rs->fields[10]);
                    $rs->MoveNext();
                }
            }
            $this->_aViewData['swcaloric1'] = $swcaloric1;
            $this->_aViewData['swcaloric2'] = $swcaloric2;
            $this->_aViewData['swfat1'] = $swfat1;
            $this->_aViewData['swfat2'] = $swfat2;
            $this->_aViewData['swfat3'] = $swfat3;
            $this->_aViewData['swcarb'] = $swcarb;
            $this->_aViewData['swsugar'] = $swsugar;
            $this->_aViewData['swprotein'] = $swprotein;
            $this->_aViewData['swsalt'] = $swsalt;
            $this->_aViewData['swabtropfgewicht'] = $swabtropfgewicht;
            $this->_aViewData['swingredients'] = $swingredients;
        }

        return $this->_sThisTemplate;
    }

    public function save()
    {
        $myConfig = $this->getConfig();

        $soxId = $this->getEditObjectId();
        $aParams = oxRegistry::getConfig()->getRequestParameter( "editval" );

        //save what I want
    }
}