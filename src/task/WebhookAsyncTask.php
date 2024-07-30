<?php

/*
 *  ____   __   __  _   _    ___    ____    ____    ___   _____
 * / ___|  \ \ / / | \ | |  / _ \  |  _ \  / ___|  |_ _| | ____|
 * \___ \   \ V /  |  \| | | | | | | |_) | \___ \   | |  |  _|
 *  ___) |   | |   | |\  | | |_| | |  __/   ___) |  | |  | |___
 * |____/    |_|   |_| \_|  \___/  |_|     |____/  |___| |_____|
 *
 * Cet API permet de gérer de manière facile les webhooks/message envoyés sur discord.
 *
 * @author Synopsie
 * @link https://neta.arkaniastudios.com/
 * @version 2.0.1
 *
 */

declare(strict_types=1);

namespace neta\task;

use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;
use function curl_close;
use function curl_exec;
use function curl_init;
use function curl_setopt_array;
use const CURLOPT_HTTPHEADER;
use const CURLOPT_POST;
use const CURLOPT_POSTFIELDS;
use const CURLOPT_RETURNTRANSFER;
use const CURLOPT_SSL_VERIFYHOST;
use const CURLOPT_SSL_VERIFYPEER;

class WebhookAsyncTask extends AsyncTask {
	private string $url;
	private string $encoded;

	public function __construct(
		string $url,
		string $encoded
	) {
		$this->url     = $url;
		$this->encoded = $encoded;
	}

	public function onRun() : void {
		$ch = curl_init($this->url);
		if ($ch === false) {
			return;
		}
		curl_setopt_array($ch, [
			CURLOPT_POST       => true,
			CURLOPT_POSTFIELDS => $this->encoded,
			CURLOPT_HTTPHEADER => [
				"Content-Type: application/json"
			],
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false
		]);
		$response = curl_exec($ch);
		curl_close($ch);
		$this->setResult($response);
	}

	public function onCompletion() : void {
		$response = $this->getResult();
		if($response !== '') {
			Server::getInstance()->getLogger()->error("WebhookError: " . $response);
		}
	}

}
