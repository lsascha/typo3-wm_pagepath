<?php
namespace Webmatch\WmPagepath\Utility;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PagePathUtility
{

    /**
     * Obtains site URL.
     *
     * @static
     * @param int $pageId
     * @return string
     */
    protected static function getSiteUrl($pageId)
    {
        $domain = BackendUtility::firstDomainRecord(BackendUtility::BEgetRootLine($pageId));
        $scheme = GeneralUtility::getIndpEnv('TYPO3_SSL') ? 'https' : 'http';
        return $domain ? $scheme . '://' . $domain . '/' : GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
    }

    /**
     * Creates URL to page using page id and parameters
     *
     * @param int    $pageUid
     * @param string|array $parameters
     * @param int    $pageType
     *
     * @return    string    Path to page or empty string
     */
    public static function getPagePath($pageUid, $parameters = '', $pageType = 0)
    {
        if (!is_array($parameters)) {
            $parameters = GeneralUtility::explodeUrl2Array($parameters, true);
        }
        $parameters = base64_encode(json_encode($parameters));
        $siteUrl = self::getSiteUrl($pageUid);

        $apiUrl = $siteUrl . 'index.php?type=1535550436&parameters=' . $parameters . '&pageUid=' . $pageUid . '&pageType=' . $pageType;

        $result = GeneralUtility::getUrl($apiUrl, false);
        $urlParts = parse_url($result);
        if (!is_array($urlParts)) {
            return '';
        }
        return $result;
    }
}