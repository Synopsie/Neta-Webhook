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

namespace neta;

use neta\class\Message;
use neta\events\WebhookSendEvent;
use neta\task\WebhookAsyncTask;
use pocketmine\Server;
use function json_encode;

class Webhook {
	private string $url;
	protected Message $message;

	public function __construct(
		string $url,
		Message $message
	) {
		$this->url     = $url;
		$this->message = $message;
	}

	public function submit() : void {
		$ev = new WebhookSendEvent(
			$this->url,
			$this->message
		);
		$ev->call();
		if($ev->isCancelled()) {
			return;
		}
		Server::getInstance()->getAsyncPool()->submitTask(
			new WebhookAsyncTask(
				$this->url,
				json_encode($this->message)
			)
		);
	}
}
