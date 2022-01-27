<?php
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/config.inc.php';

use Pixi\API\Soap\Client;
use Pixi\API\Soap\Options;

class App{
	private Options $soapOptions;
	private Client $soapClient;

	public function __construct()
	{
		// Pixi SOAP Connection
		$this->soapOptions = new Pixi\API\Soap\Options(PIXI_API_USER, PIXI_API_PASS, PIXI_API_ENDPOINT);
		$this->soapOptions->allowSelfSigned();

		// SOAP Client
		$this->soapClient = new Client(null, $this->soapOptions->getOptions());
	}
	/**
	 * Call: pixiReport_LogisticQuality
	 * @return array
	 */
	public function getLogisticsQuality() : array
	{
		return $this->soapClient->pixiReport_LogisticQuality(
			array(
				'DaysBack' => 5,
				'OnlyItemsOnStock' => 1
			)
		)->getResultset();
	}

	/**
	 * Call: pixiGetProductSalesReport
	 * @param string $itemNrInt
	 * @return array
	 */
	public function getProductSalesReport(string $itemNrInt) : array
	{
		return $this->soapClient->pixiGetProductSalesReport(
			array(
				'ItemNrInt' => $itemNrInt
			)
		)->getResultset();
	}
}

$app = new App();
//print_r($app->getLogisticsQuality());
print_r($app->getProductSalesReport('WOM131'));
