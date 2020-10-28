<?php
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

namespace PrestaShop\Module\Ps_facebook\Client;

use GuzzleHttp\Client;
use PrestaShop\AccountsAuth\Service\PsAccountsService;

class PsApiClient extends Client
{
    /**
     * Create the Guzzle Client with defined data
     *
     * @param string $baseUrl
     *
     * @return self
     */
    public static function create($baseUrl)
    {
        return new self([
            'base_url' => $baseUrl,
            'defaults' => [
                'timeout' => 10,
                'exceptions' => false,
                'verify' => false,
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . (new PsAccountsService())->getOrRefreshToken(),
                ],
            ],
        ]);
    }
}