<?php
/**
 * @author           Pierre-Henry Soria <ph7software@gmail.com>
 * @copyright        (c) 2014, Pierre-Henry Soria. All Rights Reserved.
 * @license          See H2O.LICENSE.txt and H2O.COPYRIGHT.txt in the root directory.
 * @link             http://hizup.com
 */

namespace H2O;
defined('H2O') or exit('Access denied');

class AdminModel extends KernelModel
{

    private $_sQueryPath;

    public function __construct()
    {
        parent::__construct(self::ADMIN_TABLE);
        
        $this->_sQueryPath = __DIR__ . H2O_DS . 'queries/';
    }

    public function exe(array $aParams, $sSqlName)
    {
        return $this->exec($sSqlName, $this->_sQueryPath, $aParams);
    }

    public function getId($sEmail)
    {
        $rStmt = $this->oDb->prepare( $this->getQuery('get_id', $this->_sQueryPath) );
        $rStmt->bindValue(':email', $sEmail);
        $rStmt->execute();
        $oRow = $rStmt->fetch(\PDO::FETCH_OBJ);
        return (int) @$oRow->profileId;
    }

}