<?php
namespace Webmatch\WmPagepath\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "wm_pagepath" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Sascha Löffler <sloeffler@webmatch.de>, Webmatch GmbH
 *
 ***/

/**
 * PagepathController
 */
class PagepathController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * generate frontend link with arguments
     *
     * @return string
     */
    public function linkAction()
    {
        $arguments = GeneralUtility::_GET('parameters') ?? '';
        $argumentsArray = [];
        if ($arguments !== '') {
            $argumentsArray = json_decode(base64_decode($arguments), true);
        }
        $pageUid = GeneralUtility::_GET('pageUid') ?? null;
        $pageType = GeneralUtility::_GET('pageType') ?? 0;

//        if (GeneralUtility::getIndpEnv('REMOTE_ADDR') != $_SERVER['SERVER_ADDR']) {
//            header('HTTP/1.0 403 Access denied');
//            // Empty output!!!
//            return '';
//        }
        return $this->controllerContext->getUriBuilder()->reset()
            ->setArguments($argumentsArray)
            ->setTargetPageUid($pageUid)
            ->setTargetPageType($pageType)
            ->setCreateAbsoluteUri(true)
            ->buildFrontendUri();
    }
}
