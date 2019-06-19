<?php


namespace Ippey\FreeeUtil\Accounting;


use Ippey\FreeeUtil\FreeeApiInterface;
use Ippey\FreeeUtil\FreeeApiTrait;
use Ippey\FreeeUtil\FreeeUtilException;

class Users implements FreeeApiInterface
{
    use FreeeApiTrait;
    use AccountingApiTrait;

    const KEY = 'accounting/users';

    /**
     * @param bool $companies
     * @return mixed
     * @throws FreeeUtilException
     */
    public function me($companies = true)
    {
        $endpoint = $this->baseUri . '/users/me';
        $data = [
            'companies' => $companies,
        ];
        return $this->get($endpoint, $data);
    }

    /**
     * @param $companyId
     * @return mixed
     * @throws FreeeUtilException
     */
    public function capabilities($companyId)
    {
        $endpoint = $this->baseUri . '/users/capabilities';
        $data = [
            'company_id' => $companyId,
        ];
        return $this->get($endpoint, $data);
    }

    public static function supports($key)
    {
        if ($key === self::KEY) {
            return true;
        }
        return false;
    }
}