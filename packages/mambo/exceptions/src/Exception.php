<?php
namespace Mambo\Exceptions;

use stdClass;

abstract class Exception extends \Exception
{

    private $httpCode = null;
    private $vendorCode = null;
    private $detail = [];

    /**
     * Exception constructor.
     * @param string $message
     * @param int $httpCode
     * @param int $vendorCode
     * @param array $detail
     * @param \Exception|null $previous
     */
    public function __construct($message, $httpCode, $vendorCode, $detail = [], \Exception $previous = null)
    {
        $this->httpCode = $httpCode;
        $this->vendorCode = $vendorCode;
        $this->detail = $detail;

        parent::__construct($message, $httpCode, $previous);
    }


    /**
     * @return string
     */
    public function buildError()
    {
        $debug = config('exception.debug');

        $error = new stdClass();
        $error->error = new stdClass();

        $error->error->code = $this->getHttpCode();
        $error->error->vendor_code = $this->getVendorCode();
        $error->error->message = $this->getMessage();
        $error->error->detail = $this->detail;

        if ($debug) {
            $error->error->debug = $this->getDebugData();
        }

        return $error;
    }


    /**
     * @return int
     */
    public function getHttpCode()
    {
        return $this->httpCode;
    }


    /**
     * @return int
     */
    public function getVendorCode()
    {
        return $this->vendorCode;
    }


    /**
     * @return stdClass
     */
    private function getDebugData()
    {
        $debug = new stdClass();
        $debug->file = $this->getFile();
        $debug->line = $this->getLine();
        $debug->trace = $this->getTrace();
        $debug->exception = get_class($this);
        return $debug;
    }

}