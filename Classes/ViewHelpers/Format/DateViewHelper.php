<?php
namespace Vendor\Yourext\ViewHelpers\Format;

/**
 * Formats a \DateTime object.
 *
 * = Examples =
 *
 * {namespace s=Vendor\Yourext\ViewHelpers}
 *
 * Default Date
 * {dateObject -> s:format.date()}
 *
 * With Type Config
 * {dateObject -> s:format.date(type:'medium')}
 *
 * <s:format.date type="long">{dateObject}</ma:format.date>
 *
 *
 * = Required TypoScript-Configuration =
 *
 * config {
 *    format {
 *        date.short  = %d.%m.%Y
 *        date.medium = %d. %b %Y
 *        date.long   = %A, %d. %b %Y
 *        time        = %H:%M
 *    }
 * }
 */

use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class DateViewHelper
 *
 * @package Vendor\Yourext\ViewHelpers\Format
 */
class DateViewHelper extends AbstractViewHelper
{

    /**
     * @var bool
     */
    protected $escapingInterceptorEnabled = false;

    /**
     * @var \TYPO3\CMS\Extbase\Configuration\FrontendConfigurationManager
     */
    protected $frontendConfigurationManager;

    /**
     * Render the supplied DateTime object as a formatted date.
     *
     * @param mixed $date either a DateTime object or a string that is accepted by DateTime constructor
     * @param string $type One of short, medium, long
     * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception
     * @return string Formatted date
     */
    public function render($date = null, $type = null)
    {
        $type = (empty($type)) ? 'short' : $type;
        $this->frontendConfigurationManager = new \TYPO3\CMS\Extbase\Configuration\FrontendConfigurationManager;
        $config = $this->frontendConfigurationManager->getTypoScriptSetup();
        $format = $config['config.']['format.']['date.'][$type];

        if (empty($format)) {
            return;
        }

        if ($date === null) {
            $date = $this->renderChildren();

            if ($date === null) {
                return '';
            }
        }

        if (!$date instanceof \DateTime) {
            try {
                $date = is_integer($date) ? new \DateTime('@' . $date) : new \DateTime($date);
                $date->setTimezone(new \DateTimeZone(date_default_timezone_get()));
            } catch (\Exception $exception) {
                throw new \Exception(
                    '"' . $date . '" could not be parsed by \DateTime constructor.', 1241722579
                );
            }
        }

        return strpos($format, '%') !== false ? strftime($format, $date->format('U')) : $date->format($format);
    }
}
