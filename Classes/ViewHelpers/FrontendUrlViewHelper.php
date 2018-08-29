<?php
namespace Webmatch\WmPagepath\ViewHelpers\Uri;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

/**
 * A view helper for creating URIs to resources.
 *
 * = Examples =
 *
 * <code title="Defaults">
 * <link href="{f:uri.resource(path:'css/stylesheet.css')}" rel="stylesheet" />
 * </code>
 * <output>
 * <link href="Resources/Packages/MyPackage/stylesheet.css" rel="stylesheet" />
 * (depending on current package)
 * </output>
 */
class FrontendUrlViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;


    /**
     * Obtains site URL.
     *
     * @static
     * @param int $pageId
     * @return string
     */
    static protected function getSiteUrl($pageId)
    {
        $domain = BackendUtility::firstDomainRecord(BackendUtility::BEgetRootLine($pageId));
        $scheme = GeneralUtility::getIndpEnv('TYPO3_SSL') ? 'https' : 'http';
        return $domain ? $scheme . '://' . $domain . '/' : GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
    }

    /**
     * Initialize arguments
     *
     * @api
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('arguments', 'array', 'The arguments for the url', false, []);
        $this->registerArgument('pageUid', 'int', 'The target PageUid for the url', false, 0);
        $this->registerArgument('pageType', 'int', 'The target PageType for the url', false, 0);
    }

    /**
     * Render the URI to the resource. The filename is used from child content.
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string The URI to the resource
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $linkArguments = $arguments['arguments'];
        $pageUid = $arguments['pageUid'];
        $pageType = $arguments['pageType'];

        if (TYPO3_MODE === 'BE') {
            $siteUrl = self::getSiteUrl($pageUid);
        }

        return $uri;
    }
}
