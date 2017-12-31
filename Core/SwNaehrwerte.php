<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace Swinde\SwNaehrwerte\Core;


/**
 * Admin article main manager.
 * Collects and updates (on user submit) article base parameters data ( such as
 * title, article No., short Description and etc.).
 * Admin Menu: Manage Products -> Articles -> Main.
 */
class ArticleMain extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController
{
    /**
     * @var string
     */
    public $sTemplate = 'swnaehrwerte.tpl';



    public function render()
    {
        parent::render();
        $this->_aViewData['edit'] = $oArticle = oxNew( 'oxarticle' );
        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();

        if (  $soxId && $soxId != "-1")
        {
            // load object
            $oArticle->loadInLang( $this->_iEditLang, $soxId );

            // why? load object in other languages
            /*$oOtherLang = $oArticle->getAvailableInLangs();
            if (!isset($oOtherLang[$this->_iEditLang])) {
                // echo "language entry doesn't exist! using: ".key($oOtherLang);
                $oArticle->loadInLang( key($oOtherLang), $soxId );
            } */
        }
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

        return 'naehrwerte_main.tpl';
    }

    /**
     * Saves content contents.
     *
     * @return mixed
     */
    public function save()
    {
        parent::save();

        $oConfig = $this->getConfig();
        $soxId = $this->getEditObjectId();
        $aParams = $this->getConfig()->getRequestParameter("editval");

        // default values
        // $aParams = $this->addDefaultValues( $aParams );
        // null values
        if (isset($aParams['oxarticles__oxvat']) && $aParams['oxarticles__oxvat'] === '')
        {
            $aParams['oxarticles__oxvat'] = null;
        }
        // varianthandling variants have no steckbrief;-)
        $soxparentId = $oConfig->getRequestParameter( "oxparentid");
        if ( isset( $soxparentId) && $soxparentId && $soxparentId != "-1")
        {
            unset( $aParams['oxarticles__oxparentid']);
        }

        $oArticle = oxNew( "oxarticle");
        $oArticle->setLanguage($this->_iEditLang);

        if ( $soxId != "-1") {
            $oArticle->loadInLang( $this->_iEditLang, $soxId);
        }

        /*else {
            $aParams['oxarticles__oxid']        = null;
            $aParams['oxarticles__oxissearch']  = 1;
            $aParams['oxarticles__oxstockflag'] = 1;
            // shopid
            $aParams['oxarticles__oxshopid'] = oxRegistry::getSession()->getVariable( "actshop");
        }*/
        // resetting counts
        //$this->_resetCounts( $aResetIds );

        $oArticle->setLanguage(0);

        //triming spaces from article title (M:876)
        /*if (isset($aParams['oxarticles__oxtitle'])) {
            $aParams['oxarticles__oxtitle'] = trim( $aParams['oxarticles__oxtitle'] );
        }*/

        $oArticle->assign( $aParams );
        //$oArticle->setArticleLongDesc( $this->_processLongDesc( $aParams['oxarticles__oxlongdesc'] ) );
        $oArticle->setLanguage($this->_iEditLang);
        //$oArticle = oxRegistry::get("oxUtilsFile")->processFiles( $oArticle );
        $oArticle->save();

        $this->setEditObjectId( $oArticle->getId() );
    }
}
