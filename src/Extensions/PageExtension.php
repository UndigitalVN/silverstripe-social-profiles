<?php

namespace Innoweb\SocialProfiles\Extensions;

use SilverStripe\Core\Config\Config;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Core\Extension;

class PageExtension extends Extension
{
    public function getSocialProfilesConfig() {
        if (class_exists(\Symbiote\Multisites\Multisites::class)
            && !Config::inst()->get(ConfigExtension::class, 'multisites_enable_global_settings')
        ) {
            return \Symbiote\Multisites\Multisites::inst()->getCurrentSite();
        } elseif (class_exists(\Fromholdio\ConfiguredMultisites\Multisites::class)
            && !Config::inst()->get(ConfigExtension::class, 'multisites_enable_global_settings')
        ) {
            return \Fromholdio\ConfiguredMultisites\Multisites::inst()->getCurrentSite();
        } else {
            return SiteConfig::current_site_config();
        }
    }
}

