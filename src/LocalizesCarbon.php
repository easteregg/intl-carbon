<?php

namespace Easteregg\IntlCarbon;

use Carbon\Carbon;

class LocalizesCarbon extends Carbon
{
    protected $_intlFormatter;

    public function __construct($time = null, $tz = null)
    {
        parent::__construct($time, $tz);
    }

    /**
     * @return mixed
     */
    public function getIntlFormatter()
    {
        return $this->_intlFormatter;
    }

    /**
     * @return string
     */
    public function long()
    {
        $timezone = "Asia/Tehran";
        $locale = $this->getLocaleFromConfig();
        $calendar = \IntlDateFormatter::TRADITIONAL;
        $formatter = new \IntlDateFormatter(
            $locale,
            \IntlDateFormatter::LONG,
            \IntlDateFormatter::LONG,
            $timezone,
            $calendar
        );
        $formatter->setPattern($this->getIntlFormatterFromConfig());
        return $formatter->format($this);
    }

    /**
     * @param mixed $intlFormatter
     */
    public function setIntlFormatter($intlFormatter)
    {
        $this->_intlFormatter = $intlFormatter;
    }

    private function getIntlFormatterFromConfig()
    {
        $appLocale = config("app.locale");
        return config("intl.{$appLocale}.format");
    }

    /**
     * @return string
     */
    private function getLocaleFromConfig(): string
    {
        $appLocale = config("app.locale");
        return config("intl.{$appLocale}.calendar");
    }
}
